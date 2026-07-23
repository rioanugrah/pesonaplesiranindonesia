<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Payment\TripayController;

use App\Models\Trip;


class FrontendController extends Controller
{
    function __construct(
        TripayController $tripayPayment,
        Trip $trip,
    ){
        $this->tripay_payment = $tripayPayment;
        $this->trip = $trip;
    }

    public function index()
    {
        // $data['trips'] = $this->trip->all();
        $data['trips'] = $this->trip->where('status','Active')->orderBy('created_at','desc')->paginate(8);

        return view('frontend.v2.index',$data);
    }

    public function tentang_kami()
    {
        return view('frontend.v2.tentang_kami');
    }

    public function trip()
    {
        $data['trips'] = $this->trip->orderBy('created_at','desc')->paginate(10);
        
        return view('frontend.trips.index',$data);
    }

    public function trip_detail($id,$trip_code)
    {
        $data['trip_detail'] = $this->trip->where('id',$id)->where('trip_code',$trip_code)->first();

        if (empty($data['trip_detail'])) {
            return redirect()->back()->with('error','Trip Tidak Ditemukan');
        }

        $data['listPayments'] = json_decode($this->tripay_payment->getPayment())->data;

        return view('frontend.v2.trips.detail',$data);
    }
}
