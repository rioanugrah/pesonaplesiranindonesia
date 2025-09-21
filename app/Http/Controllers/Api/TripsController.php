<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Trip;

class TripsController extends Controller
{
    function __construct(
        Trip $trip
    ){
        $this->trip = $trip;
    }

    public function getTrip()
    {
        $data = $this->trip->where('status','Active')->orderBy('created_at','desc')->get();

        $list = [];

        foreach ($data as $key => $value) {
            $list[] = [
                'id' => $value->id,
                'trip_name' => $value->trip_name,
                'trip_price' => $value->trip_price,
                'trip_images' => Storage::disk('s3')->url('/plesiranindonesia/trip/'.$value->trip_code.'/'.$value->trip_images),
                'status' => $value->status,
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $list
        ]);
    }
}
