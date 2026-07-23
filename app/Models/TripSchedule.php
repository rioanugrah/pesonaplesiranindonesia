<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TripSchedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'trip_schedules';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected $guarded = [];

}
