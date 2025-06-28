<?php

namespace Database\Factories;

use App\Models\Unicorn;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnicornFactory extends Factory
{
    protected $model = Unicorn::class;

    public function definition()
    {
        $skills = ['flying', 'shooting glitter', 'rainbow galloping', 'singing', 'magical healing'];
        return [
            'name' => $this->faker->firstName . 'corn',
            'age' => $this->faker->numberBetween(3, 20),
            'mane_color' => $this->faker->safeColorName,
            'special_skills' => $this->faker->randomElement($skills),
            'is_active' => true,
        ];
    }
}
