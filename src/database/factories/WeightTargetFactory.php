<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightTargetFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::first()->id ?? User::factory(),
            'target_weight' => $this->faker->randomFloat(1, 45, 999),
        ];
    }
}
