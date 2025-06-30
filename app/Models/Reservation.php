<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'unicorn_id',
        'rent_date',
        'duration_hours',
    ];

    //dzięki casts eloquent zwraca obiekt Carbon
    protected $casts = [
        'rent_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function unicorn()
    {
        return $this->belongsTo(Unicorn::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
