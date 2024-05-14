<?php

namespace Database\Factories;

use App\Models\Attachments;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AttachmentsFactory extends Factory
{
    protected $model = Attachments::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'task_id' => Task::factory(),
            'clickup_id' => $this->faker->word(),
            'file_path' => $this->faker->word(),
        ];
    }
}
