<?php

namespace Database\Factories;

use App\Models\Folder;
use App\Models\Space;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FolderFactory extends Factory
{
    protected $model = Folder::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'clickup_id' => $this->faker->word(),
            'space_id' => Space::factory()
        ];
    }
}
