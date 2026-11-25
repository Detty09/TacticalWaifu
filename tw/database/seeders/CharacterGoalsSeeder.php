<?php

namespace Database\Seeders;

use App\Models\CharacterGoal;
use Illuminate\Database\Seeder;

class CharacterGoalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $goals = [
            ['name' => "Win Sempai's Heart", 'description' => 'If he loves you, you win.'],
            ['name' => 'See the World', 'description' => 'Go travel, skip school, who cares about Sempai?'],
            ['name' => 'Meet Interesting People', 'description' => 'Meet people you don\'t know, but you\'ll love them.'],
            ['name' => 'Get Top Marks', 'description' => 'School is for learning, Sempai will notice only the best!'],
            ['name' => 'Get Romantic with Classmates', 'description' => 'There are other fish in the pond not only Sempai.'],
            ['name' => 'Keep Being Kawaii', 'description' => 'Sempai will love you forever!'],
        ];
        foreach ($goals as $goal) {
            CharacterGoal::updateOrCreate(
                ['name' => $goal['name']],                
                ['description' => $goal['description']],  
            );
        }
    }
}
