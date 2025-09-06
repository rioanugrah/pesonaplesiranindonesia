<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'bookings';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    // Relasi: Booking dimiliki oleh satu Trip
    public function trip()
    {
        return $this->belongsTo(\App\Models\Trip::class);
    }

    // Relasi: Booking memiliki banyak payment
    public function payment()
    {
        return $this->belongsTo(\App\Models\Payment::class);
    }

    public function bookingDeparture()
    {
        return $this->belongsTo(\App\Models\BookingDeparture::class, 'id', 'booking_id');
    }

    public function bookingExtra()
    {
        return $this->hasMany(\App\Models\BookingExtra::class, 'booking_id', 'id');
    }
}
