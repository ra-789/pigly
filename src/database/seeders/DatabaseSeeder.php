<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $user = User::factory()->create();

        WeightTarget::factory()->create([
            'user_id' => $user->id,
        ]);

        WeightLog::factory()->count(35)->create([
            'user_id' => $user->id,
        ]);
    }
}
