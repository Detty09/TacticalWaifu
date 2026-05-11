<?php

namespace App\Services;

use App\Models\Character;

class CharacterAccessService
{
    public function authorize(Character $character): void
    {
        if (! $character->access_password) {
            return;
        }

        $allowed = session()->get(
            "character_access.{$character->uuid}",
            false
        );

        if (! $allowed) {
            abort(403, 'Unauthorized');
        }
    }
}