<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Spatie\Activitylog\Traits\LogsActivity;
// use Spatie\Activitylog\LogOptions;

class Trip extends Model
{
    use HasFactory;
    use SoftDeletes;
    // use LogsActivity;

    public $table = 'trips';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    // public function getActivitylogOptions(): LogOptions
    // {
    //     return LogOptions::defaults()
    //     // ->logOnly(['trip_code', 'trip_name'])
    //     ->logUnguarded();
    //     // ->logOnlyDirty();
    //     // Chain fluent methods for configuration options
    // }

    public function trip_extra()
    {
        return $this->hasMany(\App\Models\TripExtra::class, 'trip_id','id');
    }

}
