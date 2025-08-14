<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Seed the database with posts.
     */
    public function run(): void
    {
        Post::factory(5)->create();
    }
}
