<?php

namespace Database\Factories;

use App\Models\Folder;
use App\Models\Lists;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ListsFactory extends Factory
{
    protected $model = Lists::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'clickup_id' => $this->faker->word(),
            'folder_id' => Folder::factory()
        ];
    }
}
