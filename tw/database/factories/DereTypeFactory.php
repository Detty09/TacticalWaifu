<?php

namespace Database\Factories;

use App\Models\DereType;
use Illuminate\Database\Eloquent\Factories\Factory;

class DereTypeFactory extends Factory
{
    protected $model = DereType::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->sentence(),
        ];
    }
}
