<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code', 'status_active'
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
