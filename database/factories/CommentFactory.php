<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'content' => $this->faker->word(),
            'author_name' => $this->faker->name(),
            'author_email' => $this->faker->unique()->safeEmail(),
            'comment_id' => $this->faker->word(),
            'task_id' => Task::factory()
        ];
    }
}
