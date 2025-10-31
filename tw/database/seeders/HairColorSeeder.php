<?php

namespace Database\Seeders;

use App\Models\HairColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HairColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $haircolors = [
           ['name' => 'Blonde', 'color' => '#FFD700'],
           ['name' => 'Brown', 'color' => '#8B4513'],
           ['name' => 'Black', 'color' => '#000000'],
           ['name' => 'Red', 'color' => '#FF1500'],
           ['name' => 'White', 'color' => '#FFFFFF'],
           ['name' => 'Blue', 'color' => '#2BAECF'],
           ['name' => 'Green', 'color' => '#28AB24'],
           ['name' => 'Ginger', 'color' => '#FF4500'],
           ['name' => 'Pink', 'color' => '#E324A0'],
           ['name' => 'Purple', 'color' => '#BA24E3'],
       ];
       foreach ($haircolors as $haircolor) {
           HairColor::create($haircolor);
       }
    }
}
