<?php

namespace Database\Seeders;

use App\Models\FreeGame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FreeGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FreeGame::factory(5)->create();
    }
}
