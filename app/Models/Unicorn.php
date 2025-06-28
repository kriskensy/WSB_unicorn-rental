<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unicorn extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'mane_color',
        'special_skills',
        'is_active',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reviews()
    {
        return $this->hasManyThrough(Review::class, Reservation::class, 'unicorn_id', 'reservation_id');
    }
}

