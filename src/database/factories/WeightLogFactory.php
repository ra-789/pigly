<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::first()->id ?? User::factory(),
            'date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'weight' => $this->faker->randomFloat(1, 40, 100),
            'calories' => $this->faker->numberBetween(1500, 3500),
            'exercise_time' => $this->faker->time('H:i'),
            'exercise_content' => $this->faker->sentence(8),
        ];
    }
}
