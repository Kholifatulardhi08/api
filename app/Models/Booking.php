<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Room;
use App\Models\Unit;
use App\Models\Pantry;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'agenda',
        'snack',
        'date',
        'person',
        'start_time',
        'end_time',
        'user_id',
        'room_id',
        'unit_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function pantry()
    {
        return $this->hasMany(Pantry::class);
    }
}
