<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Character extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'dere_type_id',
        'hair_color_hex',
        'eye_color_hex',
        'character_goal_id',
        'player_goal',
        'number',
        'height_cm',
        'access_password',
    ];

    protected $hidden = [
        'access_password',
    ];


    public function dereType()
    {
        return $this->belongsTo(DereType::class);
    }

    public function hairColor()
    {
        return $this->belongsTo(HairColor::class);
    }

    public function eyeColor()
    {
        return $this->belongsTo(EyeColor::class);
    }

    public function characterGoal()
    {
        return $this->belongsTo(CharacterGoal::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withTimestamps();

    }

    public function weapons()
    {
        return $this->belongsToMany(Weapon::class)->withTimestamps();
    }

}
