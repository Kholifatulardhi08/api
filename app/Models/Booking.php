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
        'person',
        'start',
        'end',
        'user_id',
        'room_id',
        'unit_id',
        'invite',
        'status_active'
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
        return $this->hasOne(Pantry::class);
    }
}
