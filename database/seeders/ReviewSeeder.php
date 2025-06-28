<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Reservation;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $reservations = Reservation::all();

        foreach ($reservations as $reservation) {
            if (rand(0, 1)) {
                Review::factory()->create([
                    'reservation_id' => $reservation->id,
                    'user_id' => $reservation->user_id,
                ]);
            }
        }
    }
}
