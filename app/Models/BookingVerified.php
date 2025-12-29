<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingVerified extends Model
{
    use HasFactory;
    // use SoftDeletes;

    public $table = 'verified_booking';
    protected $primaryKey = 'id';
    public $incrementing = false;
    // protected $dates = ['deleted_at'];

    protected $guarded = [];

}
