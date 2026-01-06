<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\CharacterGoal;
use App\Models\DereType;
use App\Models\EyeColor;
use App\Models\HairColor;
use App\Models\Item;
use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class CharacterController extends Controller
{
    public function create()
    {
        return view('character.newcharacter', [
            'deretypes' => DereType::all(),
            'hairColors' => HairColor::all(),
            'eyeColors' => EyeColor::all(),
            'characterGoals' => CharacterGoal::all(),
            'items' => Item::all(),
            'weapons' => Weapon::all(),
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'weapon_id' => 'nullable|exists:weapons,id',
            'new_weapon_name' => 'nullable|string|max:255',

            'character_goal_id' => 'nullable|exists:character_goals,id',
            'new_goal_name' => 'nullable|string|max:255',
            'new_goal_description' => 'nullable|string',

            'dere_type_id' => 'required|exists:dere_types,id',
            'hair_color_hex' => ['nullable', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'eye_color_hex'  => ['nullable', 'regex:/^#[0-9A-Fa-f]{6}$/'],

            'number' => 'required|integer|between:2,5',
            'height' => 'required|integer|between:120,210',
            'player_goal' => 'required|string|max:255',

            'password' => 'nullable|string|min:3|max:255',
        ]);


        if (
            ($request->weapon_id && $request->new_weapon_name) ||
            (!$request->weapon_id && !$request->new_weapon_name)
        ) {
            return back()
                ->withErrors(['weapon' => 'Select a weapon OR add a new one.'])
                ->withInput();
        }

        if (
            ($request->character_goal_id && $request->new_goal_name) ||
            (!$request->character_goal_id && !$request->new_goal_name)
        ) {
            return back()
                ->withErrors(['character_goal' => 'Select a goal OR add a new one.'])
                ->withInput();
        }

        if ($request->new_weapon_name) {
            $weapon = Weapon::create([
                'name' => $request->new_weapon_name,
            ]);
        } else {
            $weapon = Weapon::findOrFail($request->weapon_id);
        }

        if ($request->new_goal_name) {
            $goal = CharacterGoal::create([
                'name' => $request->new_goal_name,
                'description' => $request->new_goal_description,
            ]);
        } else {
            $goal = CharacterGoal::findOrFail($request->character_goal_id);
        }

        $character = Character::create([
            'uuid' => Str::uuid(),

            'name' => $validated['name'],
            'dere_type_id' => $validated['dere_type_id'],
            'hair_color_hex' => $request->hair_color_hex,
            'eye_color_hex' => $request->eye_color_hex,

            'character_goal_id' => $goal->id,

            'number' => $validated['number'],
            'height_cm' => $validated['height'],
            'player_goal' => $validated['player_goal'],

            'access_password' => filled($validated['password'] ?? null)
                ? Hash::make($validated['password'])
                : null,


        ]);

        $character->weapons()->attach($weapon->id);

        $defaultItems = Item::whereIn('name', ['School uniform','Flip phone', 'High-powdered flashlight', 'Hand mirror', 'Lipstick', 'Booklet'])->pluck('id');
        $character->items()->attach($defaultItems);

        $manualItems = $request->manual_items ? explode("\n", $request->manual_items) : [];

        foreach ($manualItems as $itemName) {
            $itemName = trim($itemName);
            if ($itemName) {
                $item = Item::firstOrCreate(['name' => $itemName]);
                $character->items()->attach($item->id);
            }
        }

            return redirect()
                ->route('character.show', $character->uuid)
                ->with('success', 'Character created successfully!');
        }


        public
        function find(Request $request)
        {
            $request->validate([
                'uuid' => 'required|uuid',
                'password' => 'nullable|string',
            ]);

            $character = Character::where('uuid', $request->uuid)->first();

            if (!$character) {
                return back()->withInput()->with('error', 'Character not found.');
            }

            if ($request->ajax()) {
                if (!$character) {
                    return response()->json(['error' => 'Character not found.']);
                }

                if ($character->access_password && !Hash::check($request->password ?? '', $character->access_password)) {
                    return response()->json(['error' => 'Password required or incorrect.']);
                }

                return response()->json(['redirect' => route('character.show', $character->uuid)]);
            }


            if ($character->access_password && !$request->password) {
                return back()->withInput()->with('error', 'This character requires a password.');
            }

            if ($character->access_password && !Hash::check($request->password, $character->access_password)) {
                return back()->withInput()->with('error', 'Incorrect password.');
            }

            return redirect()->route('character.show', $character->uuid);
        }

        public
        function show(string $uuid)
        {
            $character = Character::where('uuid', $uuid)->firstOrFail();

            return view('character.charactersheet', compact('character'));
        }

        public
        function pdf(string $uuid)
        {
            $character = Character::where('uuid', $uuid)->firstOrFail();

            return Pdf::loadView('character.pdf', compact('character'))
                ->stream("character-{$character->uuid}.pdf");
        }

        public
        function pdfDownload(string $uuid)
        {
            $character = Character::where('uuid', $uuid)->firstOrFail();

            return Pdf::loadView('character.pdf', compact('character'))
                ->download("character-{$character->uuid}.pdf");
        }

}
