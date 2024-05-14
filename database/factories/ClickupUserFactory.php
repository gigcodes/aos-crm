<?php

namespace Database\Factories;

use App\Models\ClickupUser;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ClickupUserFactory extends Factory
{
    protected $model = ClickupUser::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'clickup_id' => $this->faker->word(),
            'team_id'=> Team::factory()
        ];
    }
}
