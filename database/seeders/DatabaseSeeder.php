<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     */
    public function run(): void {

        \App\Models\User::factory()->create([
            'name' => 'Wade Russell',
            'email' => 'wade@example.com',
            'api_key' => 'APIKEYEXAMPLE'
        ]);

        \App\Models\Game::factory()->create([
            'name' => 'Uncharted: Drake\'s Fortune',
            'user_id' => 1,
        ]);

        \App\Models\Game::factory()->create([
            'name' => 'Uncharted 2: Among Thieves',
            'user_id' => 1,
        ]);

        \App\Models\Game::factory()->create([
            'name' => 'Uncharted 3: Drake\'s Deception',
            'user_id' => 1,
        ]);

        \App\Models\Game::factory()->create([
            'name' => 'Uncharted 4: A Thief\'s End',
            'user_id' => 1,
        ]);

        \App\Models\Game::factory()->create([
            'name' => 'Baldur\'s Gate 3',
            'user_id' => 1,
        ]);
    }
}
