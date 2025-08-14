<?php

namespace Database\Seeders;

use App\Models\Thread;
use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{
    /**
     * Seed the database with demo threads.
     */
    public function run(): void
    {
        Thread::factory(3)->create();
    }
}
