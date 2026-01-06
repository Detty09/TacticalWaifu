<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\CharacterGoal;
use App\Models\DereType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CharacterFactory extends Factory
{
    protected $model = Character::class;

    public function definition(): array
    {
        return [
            'uuid' => (string) Str::uuid(),

            'name' => $this->faker->name(),

            'dere_type_id' => DereType::factory(),
            'character_goal_id' => CharacterGoal::factory(),

            'hair_color_hex' => $this->faker->boolean(70)
                ? $this->faker->hexColor()
                : null,

            'eye_color_hex' => $this->faker->boolean(70)
                ? $this->faker->hexColor()
                : null,

            'number' => $this->faker->numberBetween(2, 5),
            'height_cm' => $this->faker->numberBetween(120, 210),

            'player_goal' => $this->faker->sentence(),

            'access_password' => null,
        ];
    }

    /**
     * Optional state for password-protected characters
     */
    public function withPassword(string $password = 'secret'): static
    {
        return $this->state(fn () => [
            'access_password' => bcrypt($password),
        ]);
    }
}
