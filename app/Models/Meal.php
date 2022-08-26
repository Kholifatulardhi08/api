<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'total', 'status_active'
    ];

    public function pantry()
    {
        return $this->hasMany(Pantry::class);
    }
}
