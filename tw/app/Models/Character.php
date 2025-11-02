<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'character_goal_id',
        'player_goal',
        'dere_type_id',
        'hair_color_id',
        'height_cm',
        'eye_color_id',
        'access_password',
        'is_guest',
    ];
    protected $hidden = [
        'access_password',
    ];
    public function hairColor()
    {
        return $this->belongsTo(HairColor::class);
    }

    public function dereType()
    {
        return $this->belongsTo(DereType::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withTimestamps();
    }

    public function weapons()
    {
        return $this->belongsToMany(Weapon::class)->withTimestamps();
    }

    public function eyeColor()
    {
        return $this->belongsTo(EyeColor::class);
    }
    public function characterGoal()
    {
        return $this->belongsTo(CharacterGoal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
