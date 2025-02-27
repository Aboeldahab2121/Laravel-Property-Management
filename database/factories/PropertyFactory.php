<?php

namespace Database\Factories;

use App\Enums\PropertyStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10000, 500000),
            'location' => $this->faker->city,
            'status' => $this->faker->randomElement(PropertyStatus::values()),
            'created_at' => now(),
        ];
    }
}
