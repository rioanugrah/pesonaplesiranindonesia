<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItineraryItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'itinerary_items';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function trip()
    {
        return $this->belongsTo(\App\Models\Trip::class);
    }
}
