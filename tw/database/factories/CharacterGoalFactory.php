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
            'name'        => $this->faker->words(3, true),
            'description' => $this->faker->sentence(),
        ];
    }
}
