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
use App\Services\CharacterAccessService;
use App\Http\Requests\FindCharacterRequest;


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

    public function find(FindCharacterRequest $request)
    {
        $data = $request->validated();

        $character = Character::where('uuid', $data['uuid'])->first();

        if (! $character) {
            return $this->error($request, 'Character not found.');
        }

        if ($character->access_password) {

            if (! isset($data['password']) || ! Hash::check($data['password'], $character->access_password)) {
                return $this->error($request, 'Password required or incorrect.');
            }

            session()->put("character_access.{$character->uuid}", true);
        }

        $redirect = route('character.show', $character->uuid);

        return $request->ajax()
            ? response()->json(['redirect' => $redirect])
            : redirect($redirect);
    }

    public function show(string $uuid, CharacterAccessService $accessService)
    {

        $character = Character::where('uuid', $uuid)->firstOrFail();
        $accessService->authorize($character);

        return view('character.charactersheet', compact('character'));
    }

    public function pdf(string $uuid, CharacterAccessService $accessService)
    {
        $character = Character::where('uuid', $uuid)->firstOrFail();
        $accessService->authorize($character);

        return Pdf::loadView('character.pdf', compact('character'))
            ->stream("character-{$character->uuid}.pdf");
    }

    public function pdfDownload(string $uuid, CharacterAccessService $accessService)
    {
        $character = Character::where('uuid', $uuid)->firstOrFail();
        $accessService->authorize($character);

        return Pdf::loadView('character.pdf', compact('character'))
            ->download("character-{$character->uuid}.pdf");
    }

    private function error($request, string $message)
    {
        return $request->ajax()
            ? response()->json(['error' => $message])
            : back()->withInput()->with('error', $message);
    }
}
