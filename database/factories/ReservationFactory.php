<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Unicorn;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'unicorn_id' => Unicorn::factory(),
            'rent_date' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
            'duration_hours' => $this->faker->numberBetween(1, 8),
        ];
    }
}
