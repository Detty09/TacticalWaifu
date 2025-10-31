<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'School uniform'],
            ['name' => 'Flip phone'],
            ['name' => 'High-powdered flashlight'],
            ['name' => 'Hand mirror'],
            ['name' => 'Lipstick'],
            ['name' => 'Booklet'],
        ];
        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
