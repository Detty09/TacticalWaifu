<?php

namespace Database\Seeders;

use App\Models\Weapon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weapons = ['Katana', 'Hammer', 'Desert Eagle', 'AK-47'];
        foreach ($weapons as $weapon) {
            Weapon::create(['name' => $weapon]);
        }
    }
}
