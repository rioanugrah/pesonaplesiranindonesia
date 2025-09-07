<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingDeparture;
use App\Models\BookingExtra;
use App\Models\Payment;

use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;
use DNS2D;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Booking $booking,
        BookingDeparture $bookingDeparture,
        BookingExtra $bookingExtra,
        Payment $payment
    )
    {
        $this->middleware('auth');
        $this->booking = $booking;
        $this->bookingDeparture = $bookingDeparture;
        $this->bookingExtra = $bookingExtra;
        $this->payment = $payment;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['bookings'] = $this->booking->orderBy('created_at','desc')->paginate(10);
        $data['payments'] = $this->payment->orderBy('created_at','desc')->paginate(10);
        return view('home',$data);
    }

    public function index_user()
    {
        $data['bookings'] = $this->booking->where('user_id', auth()->user()->generate)->orderBy('created_at','desc')->paginate(10);
        // dd($data);
        // $data['payments'] = $this->payment->orderBy('created_at','desc')->paginate(10);
        return view('backend.dashboard_user.home.index',$data);
    }

    public function booking_detail_user($id, $booking_code)
    {
        $data['booking'] = $this->booking->with('bookingExtra')->where('id',$id)->where('booking_code',$booking_code)->first();
        // dd($data);
        if (empty($data['booking'])) {
            return redirect()->back();
        }

        $data['barcode'] = DNS2D::getBarcodeHTML($data['booking']['id'], 'QRCODE', 5,5);

        // dd($id);
        return view('backend.dashboard_user.home.detail',$data);
    }

    public function booking_pdf_user($id, $booking_code)
    {
        $data['booking'] = $this->booking->with('bookingExtra')->where('id',$id)->where('booking_code',$booking_code)->first();
        // dd($data);
        if (empty($data['booking'])) {
            return redirect()->back();
        }

        $data['barcode'] = DNS2D::getBarcodeHTML($data['booking']['id'], 'QRCODE', 5,5);

        // return view('backend.dashboard_user.home.cetakpdf',$data);

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('defaultPaperSize', 'A4');
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml('backend.dashboard_user.home.cetakpdf',$data);
        $dompdf->render();
        return $dompdf->stream();
    }
}
