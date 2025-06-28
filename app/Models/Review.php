<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'user_id',
        'rating',
        'comment',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function unicorn()
    {
        return $this->hasOneThrough(Unicorn::class, Reservation::class, 'id', 'id', 'reservation_id', 'unicorn_id');
    }
}
