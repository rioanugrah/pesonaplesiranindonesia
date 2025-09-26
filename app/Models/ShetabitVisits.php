<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShetabitVisits extends Model
{
    use HasFactory;
    // use SoftDeletes;

    public $table = 'shetabit_visits';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'visitor_id', 'id');
    }

}
