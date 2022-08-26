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
        return $this->belongsTo(Booking::class);
    }
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function drink()
    {
        return $this->belongsTo(Drink::class);
    }
}
