<?php

namespace Database\Seeders;

use App\Models\CharacterGoal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterGoalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $goals =[
            ['description' => 'Win Sempai\'s Heart - if he loves you, you win.'],
            ['description' => 'See the World - go travel, skip school, who cares about Sempai?'],
            ['description' => 'Meet Intresting People - meet people you don\'t know, but you\'ll love them.'],
            ['description' => 'Get Top Marks - School is for learning, Sempai will notice only the best!'],
            ['description' => 'Get Romantic with Classmates - There are other fish in the pond not only Sempai.'],
            ['description' => 'Keep Being Kawaii - Sempai will love you forever!'],
        ];
        foreach ($goals as $goal) {
            CharacterGoal::create($goal);
        }
    }
}
