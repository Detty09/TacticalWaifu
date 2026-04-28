<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Character;
use App\Models\Weapon;
use App\Models\CharacterGoal;
use App\Models\DereType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CharacterTest extends TestCase
{
    use RefreshDatabase;

    public function test_character_belongs_to_dere_type(): void
    {
        $character = Character::factory()->create();

        $this->assertInstanceOf(DereType::class, $character->dereType);
    }

    public function test_character_has_a_character_goal(): void
    {
        $character = Character::factory()->create();

        $this->assertInstanceOf(CharacterGoal::class, $character->characterGoal);
    }

    public function test_character_factory_creates_valid_character()
    {
        $character = Character::factory()->create();

        $this->assertNotEmpty($character->uuid);
        $this->assertIsString($character->name);
        $this->assertInstanceOf(DereType::class, $character->dereType);
        $this->assertInstanceOf(CharacterGoal::class, $character->characterGoal);
        $this->assertNull($character->access_password);
    }

    public function test_character_can_have_password()
    {
        $character = Character::factory()->withPassword('secret')->create();

        $this->assertTrue(Hash::check('secret', $character->access_password));
    }

    public function test_character_relationships()
    {
        $weapon = Weapon::factory()->create();
        $character = Character::factory()->create();
        $character->weapons()->attach($weapon);

        $this->assertTrue($character->weapons->contains($weapon));
    }

    public function test_character_optional_colors()
    {
        $character = Character::factory()->create([
            'hair_color_hex' => null,
            'eye_color_hex' => null
        ]);

        $this->assertNull($character->hair_color_hex);
        $this->assertNull($character->eye_color_hex);
    }


}
