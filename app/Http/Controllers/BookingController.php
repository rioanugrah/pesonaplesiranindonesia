<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Booking;

use \Carbon\Carbon;
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

    public function konfirmasi($id)
    {
        $data = $this->booking->find($id);

        if (empty($data)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Gagal!',
                'message_content' => 'Booking Tidak Ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $data->id,
                'booking_user' => [
                    'name' => json_decode($data->payment->payment_billing)->first_name.' '.json_decode($data->payment->payment_billing)->last_name,
                    'email' => json_decode($data->payment->payment_billing)->email,
                    'phone' => json_decode($data->payment->payment_billing)->phone
                ],
                'booking_code' => $data->booking_code,
                'booking_name' => $data->booking_name,
                'booking_departure' => [
                    'booking_date' => Carbon::create($data->bookingDeparture->booking_date)->isoFormat('DD MMMM YYYY'),
                    'booking_time' => $data->bookingDeparture->booking_time
                ],
                'booking_people' => [
                    'adult' => $data->bookingDeparture->num_of_adult,
                    'child' => $data->bookingDeparture->num_of_child,
                ],
                'total_price' => 'Rp. '.number_format($data->total_price,2,',','.'),
                'status_payment' => $data->payment->status,
            ]
        ]);
    }

    public function konfirmasi_simpan(Request $request)
    {
        $booking = $this->booking->where('booking_code',$request->confirm_booking_code)->first();
        if (empty($booking)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Gagal!',
                'message_content' => 'Booking Tidak Ditemukan'
            ]);
        }

        if ($request->konfirmasi == 'Confirm') {
            $booking->status = 'Confirmed';
        }elseif($request->konfirmasi == 'Denied') {
            $booking->status = 'Cancelled';
        }

        $booking->update();

        return response()->json([
            'success' => true,
            'message_title' => 'Berhasil!',
            'message_content' => 'Booking '.$booking->booking_code.' Berhasil Dikonfirmasi'
        ]);
    }

    public function detail($id)
    {
        $data['booking'] = $this->booking->find($id);

        if (empty($data['booking'])) {
            return redirect()->back()->with('error','Booking Tidak Ditemukan');
        }

        return view('backend.bookings.detail',$data);
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
