<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use setasign\Fpdi\Fpdi;

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
        $data['status'] = $this->booking->select('status')->groupBy('status')->get();
        // dd($data);
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

    public function cetakTiket($id)
    {
        $booking = $this->booking->with('bookingDeparture')
                                ->where('id',$id)
                                ->where('status','Confirmed')
                                ->first();

        if (empty($booking)) {
            return redirect()->back()->with('error', 'Pembayaran Belum Selesai');
        }

        // dd($booking);
        $title = $booking->booking_code;
        $totalTiket = $booking->bookingDeparture->num_of_adult+$booking->bookingDeparture->num_of_child;

        $pdf = new Fpdi('L','cm',[22.5,8.01]);
        $pdf->SetTitle($title);

        $inv = Carbon::now()->format('Ymd').rand(1000,9999);
        for ($i=1; $i<=$totalTiket; $i++) {
            $pdf->AddPage();
            $pdf->SetMargins(0, 0, 0, 0);

            $x = 0; // Posisi X (mm)
            $y = 0; // Posisi Y (mm)
            $width = 22.5; // Lebar gambar (mm),
            $imagePath = public_path('backend/etiket/etiketplesiran.jpg');
            $pdf->Image($imagePath, $x, $y, $width);

            // lembar 1
            $pdf->SetTextColor(255, 186, 2);
            // // $pdf->SetXY($x + 9.5, $y + 0.5);
            $pdf->SetXY($x+11.5, $y+0.8);
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 0, $booking->booking_code.'-'.$i);

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY($x+11, $y+3);
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->MultiCell(4, 0.5, $booking->booking_name, 0, 'L');

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY($x+11, $y+6);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Write(0, 'Tanggal Pembelian : '.$booking->created_at->format('Y-m-d H:i'));

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY($x + 0.8, $y + 3.6);
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->Write(0, 'E-TIKET');

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY($x + 0.8, $y + 4.4);
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->Write(0, Carbon::now()->format('dm'));

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY($x + 0.8, $y + 5.1);
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->Write(0, Carbon::now()->format('Y'));

            $noBarcode = $booking->booking_code;
            $fileName = $noBarcode.'.png';
            $tempPath = public_path('backend/etiket/'.$fileName);

            // Ensure the directory exists
            if (!\File::exists(public_path('backend/etiket/'))) {
                \File::makeDirectory(public_path('backend/etiket/'));
            }

            QrCode::format('png')
                ->backgroundColor(255, 186, 2)
                // ->color(255, 0, 0)
                ->generate($noBarcode, $tempPath);

            $pdf->Image($tempPath, $x+15.5, $y+3.3, 2);

            // lembar 2
            $pdf->SetTextColor(255, 186, 2);
            $pdf->SetXY($x+19.1, $y+0.8);
            $pdf->SetFont('Arial', '', 8);
            $pdf->Write(0,$booking->booking_code.'-'.$i);

            $pdf->SetTextColor(255, 186, 2);
            $pdf->SetXY($x+19.35, $y+1.25);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(0, 0, $booking->created_at->format('Y-m-d H:i'));

            $pdf->SetTextColor(255, 186, 2);
            $pdf->SetXY($x+19, $y+2.2);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->MultiCell(3, 0.5, $booking->booking_name, 0, 'L');

            $pdf->Image($tempPath, $x+19.6, $y+5, 2);

        }

        // Output the PDF to the browser
        $pdf->Output('I', 'PPI - '.$title.'.pdf'); // 'D' forces download
        unlink($tempPath);
        exit;
    }
}
