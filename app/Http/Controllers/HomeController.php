<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Payment;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Booking $booking,
        Payment $payment
    )
    {
        $this->middleware('auth');
        $this->booking = $booking;
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
        $data['bookings'] = $this->booking->orderBy('created_at','desc')->paginate(10);
        $data['payments'] = $this->payment->orderBy('created_at','desc')->paginate(10);
        return view('home',$data);
    }
}
