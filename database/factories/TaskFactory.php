<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'clickup_id' => $this->faker->word(),
            'name' => $this->faker->name(),
            'text_content' => $this->faker->text(),
            'description' => $this->faker->text(),
            'date_closed' => Carbon::now(),
            'date_done' => Carbon::now(),
            'archived' => $this->faker->boolean(),
            'permission_level' => $this->faker->word(),
            'priority' => $this->faker->word(),
        ];
    }
}
