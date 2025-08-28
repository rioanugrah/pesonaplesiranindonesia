<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    use HasFactory;
    use SoftDeletes;

    // public $timestamps = false;

    public $table = 'destinations';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    // Relasi: Destinasi dimiliki oleh banyak trip (Many-to-Many)
    public function trips(): BelongsToMany
    {
        return $this->belongsToMany(Trips::class, 'trip_destinations');
    }

}
