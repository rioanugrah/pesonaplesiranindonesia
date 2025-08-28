<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'reviews';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    // Relasi: Review dimiliki oleh satu User
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    // Relasi: Review dimiliki oleh satu Trip
    public function trip()
    {
        return $this->belongsTo(\App\Models\Trip::class);
    }
}
