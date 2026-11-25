<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class CharacterGoal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn(?string $value) => $value === null ? null : Str::ucfirst(Str::squish($value)),
        );
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            set: fn(?string $value) => $value === null ? null : Str::ucfirst(Str::squish($value)),
        );
    }
}
