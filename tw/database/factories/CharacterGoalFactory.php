<?php

namespace Database\Factories;

use App\Models\CharacterGoal;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterGoalFactory extends Factory
{
    protected $model = CharacterGoal::class;

    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence(),
        ];
    }
}
