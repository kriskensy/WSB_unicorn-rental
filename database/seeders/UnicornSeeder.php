<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unicorn;

class UnicornSeeder extends Seeder
{
    public function run()
    {
        Unicorn::factory()->count(10)->create();
    }
}
