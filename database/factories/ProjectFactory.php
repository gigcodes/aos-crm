<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'start_date' => Carbon::now(),
            'deadline' => Carbon::now(),
            'status' => $this->faker->word(),
            'description' => $this->faker->text(),
        ];
    }
}
