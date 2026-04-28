<?php

namespace Tests\Feature;

use App\Models\Character;
use App\Models\DereType;
use App\Models\CharacterGoal;
use App\Models\Weapon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CharacterFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_character()
    {
        $dereType = DereType::factory()->create();
        $goal = CharacterGoal::factory()->create();
        $weapon = Weapon::factory()->create();

        $response = $this->post(route('character.store'), [
            'name' => 'Amara',
            'dere_type_id' => $dereType->id,
            'character_goal_id' => $goal->id,
            'hair_color_hex' => '#ffcc00',
            'eye_color_hex' => '#3366ff',
            'number' => 3,
            'height' => 150,
            'player_goal' => 'Protect everyone',
            'weapon_id' => $weapon->id,
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('characters', [
            'name' => 'Amara',
            'hair_color_hex' => '#ffcc00',
            'eye_color_hex' => '#3366ff',
            'height_cm' => 150,
        ]);
    }

    public function user_can_create_a_character_with_new_weapon_and_goal()
    {
        $response = $this->post(route('character.store'), [
            'name' => 'Alice',
            'dere_type_id' => DereType::factory()->create()->id,
            'weapon_id' => null,
            'new_weapon_name' => 'Laser Sword',
            'character_goal_id' => null,
            'new_goal_name' => 'Save the World',
            'new_goal_description' => 'Epic goal description',
            'number' => 3,
            'height' => 170,
            'player_goal' => 'Win the game',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('weapons', ['name' => 'Laser Sword']);
        $this->assertDatabaseHas('character_goals', ['name' => 'Save the World']);
    }


    /** @test */
    public function name_is_required()
    {
        $response = $this->post(route('character.store'), []);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function height_must_be_between_120_and_210()
    {
        $dereType = DereType::factory()->create();
        $goal = CharacterGoal::factory()->create();

        $response = $this->post(route('character.store'), [
            'name' => 'Shorty',
            'dere_type_id' => $dereType->id,
            'character_goal_id' => $goal->id,
            'hair_color_hex' => '#ffffff',
            'eye_color_hex' => '#000000',
            'number' => 3,
            'height' => 50,
            'player_goal' => 'Test',
        ]);

        $response->assertSessionHasErrors('height');
    }

    /** @test */
    public function character_can_be_found_by_uuid()
    {
        $character = Character::factory()->create();

        $response = $this->post(route('character.find'), [
            'uuid' => $character->uuid,
        ]);
        $response->assertRedirect(route('character.show', $character->uuid));

    }



    /** @test */
    public function protected_character_requires_password()
    {
        $character = Character::factory()->create([
            'access_password' => bcrypt('secret'),
        ]);

        $response = $this->post(route('character.find'), [
            'uuid' => $character->uuid,
        ]);

        $response->assertSessionHas('error');
    }

    /** @test */
    public function user_can_create_a_password_protected_character(): void
    {
        $response = $this->post(route('character.store'), [
            'name' => 'Bob',
            'dere_type_id' => DereType::factory()->create()->id,
            'weapon_id' => Weapon::factory()->create()->id,
            'character_goal_id' => CharacterGoal::factory()->create()->id,
            'number' => 2,
            'height' => 160,
            'player_goal' => 'Survive',
            'password' => 'secret123',
        ]);

        $character = Character::latest()->first();
        $this->assertNotNull($character->access_password);
        $this->assertTrue(Hash::check('secret123', $character->access_password));
    }

    /** @test */
    public function cannot_create_character_without_required_fields(): void
    {
        $response = $this->post(route('character.store'), []);
        $response->assertSessionHasErrors(['name', 'dere_type_id', 'number', 'height', 'player_goal']);
    }

    /** @test */
    public function character_pdf_can_be_generated(): void
    {
        $character = Character::factory()->create();
        $response = $this->get(route('character.pdf', $character->uuid));
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }


}
