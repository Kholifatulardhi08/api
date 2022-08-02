<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Pantry extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'meal_id',
        'drink_id'
    ];

    public function booking()
    {
        return $this->belongsToMany(Booking::class);
    }
}
