<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        //admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@unicorn.pl',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        //users
        User::factory()->count(5)->create();
    }
}
