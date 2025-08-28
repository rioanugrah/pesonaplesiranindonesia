<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Booking;
use Validator;

class BookingController extends Controller
{
    function __construct(
        Booking $booking
    ){
        $this->booking = $booking;
    }

    public function index()
    {
        $data['bookings'] = $this->booking->orderBy('created_at','desc')->paginate(10);
        return view('backend.bookings.index',$data);
    }

    // Membuat booking baru untuk sebuah trip
    public function store(Request $request, Trip $trip)
    {
        // Asumsikan user sudah login (menggunakan Sanctum/Passport)
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'num_of_people' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $num_of_people = $request->input('num_of_people');

        // Cek ketersediaan kuota
        if (($trip->current_participants + $num_of_people) > $trip->max_participants) {
            return response()->json(['message' => 'Sorry, the trip is full or not enough slots available.'], 409);
        }

        // Hitung total harga
        $total_price = $trip->price * $num_of_people;

        // Buat booking
        $booking = Booking::create([
            'user_id' => $user->id,
            'trip_id' => $trip->id,
            'num_of_people' => $num_of_people,
            'total_price' => $total_price,
            'status' => 'Pending', // Status awal, menunggu pembayaran
        ]);

        // Update jumlah peserta di trip
        $trip->increment('current_participants', $num_of_people);

        return response()->json([
            'message' => 'Booking successful! Please proceed to payment.',
            'data' => $booking,
        ], 201);
    }

    // Menampilkan histori booking milik user yang sedang login
    public function history()
    {
        $user = Auth::user();
        $bookings = Booking::with('trip:id,name,start_date', 'payments')
                            ->where('user_id', $user->id)
                            ->get();

        return response()->json($bookings);
    }
}
