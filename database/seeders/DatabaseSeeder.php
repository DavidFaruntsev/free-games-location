<?php

namespace Database\Seeders;

use App\Models\FreeGame;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'testuser',
            'email' => 'test@example.com',
            'role' => 'user',
        ]);

        $this->call(FreeGameSeeder::class);

        User::all()->each(function ($user) {
            $user->freeGames()->attach(
                FreeGame::inRandomOrder()->take(3)->pluck('id')
            );
        });

        $this->call([
            ThreadSeeder::class,
            PostSeeder::class,
        ]);
    }
}
