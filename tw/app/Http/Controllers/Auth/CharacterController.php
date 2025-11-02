<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\CharacterGoal;
use App\Models\DereType;
use App\Models\EyeColor;
use App\Models\HairColor;

class CharacterController extends Controller
{
    public function create()
    {
        $deretypes = DereType::all();
        $hairColors = HairColor::all();
        $eyeColors = EyeColor::all();
        $characterGoals = CharacterGoal::all();

        return view('character.new', compact('deretypes','hairColors','eyeColors','characterGoals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dere_type_id' => 'required|exists:deretypes,id',
            'hair_color_id' => 'required|exists:hair_colors,id',
            'number' => 'required|integer|between:2,5',
            'player_goal' => 'required|string|max:255',
            'character_goal_id' => 'required|exists:character_goals,id',
            'eye_color_id' => 'required|exists:eye_colors,id',
            'height' => 'required|integer|between:140,210',
            'password' => 'nullable|string|min:3|max:255',
        ]);

        $character = Character::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'dere_type_id' => $request->dere_type_id,
            'hair_color_id' => $request->hair_color_id,
            'number' => $request->number,
            'player_goal' => $request->player_goal,
            'character_goal_id' => $request->character_goal_id,
            'eye_color_id' => $request->eye_color_id,
            'height' => $request->height,
            'password' => $request->password ? Hash::make($request->password) : null,
        ]);

        return redirect()->route('character.show', $character->uuid)
            ->with('success', 'Character created successfully!');
    }

    public function find(Request $request)
    {
        $id = $request->input('id');
        $password = $request->input('password');

        $character = Character::find($id);

        if (!$character) {
            return back()->with('error', 'Character not found.');
        }

        if ($character->password && $character->password !== $password) {
            return back()->with('error', 'Password required or incorrect.');
        }

        return redirect()->route('character.show', $character->id);
    }

    public function show($id)
    {
        $character = Character::findOrFail($id);
        return view('character.show', compact('character'));
    }
}

