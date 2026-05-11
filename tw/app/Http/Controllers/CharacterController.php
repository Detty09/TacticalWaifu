<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\CharacterGoal;
use App\Models\DereType;
use App\Models\EyeColor;
use App\Models\HairColor;
use App\Models\Item;
use App\Models\Weapon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreCharacterRequest;
use App\Services\CharacterService;


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

    public function store(StoreCharacterRequest $request, CharacterService $characterService)
    {
        $character = $characterService->create(
            $request->validated()
        );
        return redirect()
            ->route('character.show', $character->uuid)
            ->with('success', 'Character created successfully!');
    }

    public function find(Request $request)
    {
        $validated = $request->validate([
            'uuid' => 'required|uuid',
            'password' => 'nullable|string',
        ]);

        $character = Character::where(
            'uuid',
            $validated['uuid']
        )->first();

        if (! $character) {
            $message = 'Character not found.';

            return $request->ajax()
                ? response()->json(['error' => $message])
                : back()->withInput()->with('error', $message);
        }

        $passwordValid = ! $character->access_password
            || Hash::check(
                $validated['password'] ?? '',
                $character->access_password
            );

        if (! $passwordValid) {
            $message = 'Password required or incorrect.';

            return $request->ajax()
                ? response()->json(['error' => $message])
                : back()->withInput()->with('error', $message);
        }

        $redirect = route('character.show', $character->uuid);

        return $request->ajax()
            ? response()->json(['redirect' => $redirect])
            : redirect($redirect);
    }

    public function show(string $uuid)
    {
        $character = Character::where('uuid', $uuid)->firstOrFail();

        return view('character.charactersheet', compact('character'));
    }

    public function pdf(string $uuid)
    {
        $character = Character::where('uuid', $uuid)->firstOrFail();

        return Pdf::loadView('character.pdf', compact('character'))
            ->stream("character-{$character->uuid}.pdf");
    }

    public function pdfDownload(string $uuid)
    {
        $character = Character::where('uuid', $uuid)->firstOrFail();

        return Pdf::loadView('character.pdf', compact('character'))
            ->download("character-{$character->uuid}.pdf");
    }
}
