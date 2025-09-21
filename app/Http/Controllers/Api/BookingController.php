<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Booking;

class BookingController extends Controller
{
    function __construct(
        Booking $booking
    ){
        $this->booking = $booking;
    }

    public function getMyBooking()
    {
        $data = $this->booking->where('user_id',auth()->user()->generate)->orderBy('created_at','desc')->get();

        $list = [];

        foreach ($data as $key => $value) {
            $list[] = [
                'id' => $value->id,
                'booking_code' => $value->booking_code,
                'booking_name' => $value->booking_name,
                'total_price' => $value->total_price,
                'status' => $value->status,
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $list
        ]);
    }
}
