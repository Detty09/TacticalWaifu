<?php

namespace App\Services;

use App\Models\Character;
use App\Models\CharacterGoal;
use App\Models\Item;
use App\Models\Weapon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CharacterService
{
    public function create(array $data): Character
    {
        /*
        Weapon
        */

        $weapon = ! empty($data['new_weapon_name'])
            ? Weapon::firstOrCreate([
                'name' => $data['new_weapon_name'],
            ])
            : Weapon::findOrFail($data['weapon_id']);

        /*
        Goal
        */

        $goal = ! empty($data['new_goal_name'])
            ? CharacterGoal::create([
                'name' => $data['new_goal_name'],
                'description' => $data['new_goal_description'] ?? null,
            ])
            : CharacterGoal::findOrFail($data['character_goal_id']);

        /*
        Character
        */

        $character = Character::create([
            'uuid' => Str::uuid(),

            'name' => $data['name'],

            'dere_type_id' => $data['dere_type_id'],

            'hair_color_hex' => $data['hair_color_hex'] ?? null,
            'eye_color_hex' => $data['eye_color_hex'] ?? null,

            'character_goal_id' => $goal->id,

            'number' => $data['number'],

            'height_cm' => $data['height'],

            'player_goal' => $data['player_goal'],

            'access_password' => ! empty($data['password'])
                ? Hash::make($data['password'])
                : null,
        ]);

        /*
        Weapon Relation
        */

        $character->weapons()->attach($weapon->id);

        /*
        Basic Items
        */

        $defaultItems = Item::whereIn('name', [
            'School uniform',
            'Flip phone',
            'High-powdered flashlight',
            'Hand mirror',
            'Lipstick',
            'Booklet',
        ])->pluck('id');

        $character->items()->attach($defaultItems);

        /*
         Manual Items
        */

        $manualItems = collect(
            explode("\n", $data['manual_items'] ?? '')
        )
            ->map(fn ($item) => trim($item))
            ->filter();

        foreach ($manualItems as $itemName) {
            $item = Item::firstOrCreate([
                'name' => $itemName,
            ]);

            $character->items()->attach($item->id);
        }

        return $character;
    }
}