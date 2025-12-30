<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Trip;

class TripController extends Controller
{
    function __construct(
        Trip $trip
    ){
        $this->trip = $trip;
    }

    public function index()
    {
        $data['trips'] = $this->trip->orderBy('created_at','desc')->paginate(10);
        return view('backend.member.trip.index',$data);
    }
}
