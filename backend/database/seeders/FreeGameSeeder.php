<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class FreeGameSeeder extends Seeder
{
    /**
     * Seed the database with free games.
     */
    public function run(): void
    {
        Artisan::call('freegame:update-free-free-games');
    }
}
