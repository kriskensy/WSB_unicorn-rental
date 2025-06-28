<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Unicorn;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $unicorns = Unicorn::all();

        foreach ($users as $user) {
            $reservedUnicorns = $unicorns->random(rand(1, 2));//1-2 jednorożce na usera
            foreach ($reservedUnicorns as $unicorn) {
                Reservation::factory()->create([
                    'user_id' => $user->id,
                    'unicorn_id' => $unicorn->id,
                ]);
            }
        }
    }
}
