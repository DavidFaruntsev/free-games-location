<?php

namespace Database\Seeders;

use App\Models\FreeGame;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with initial test data.
     */
    public function run(): void
    {
         User::factory(5)->create();

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
