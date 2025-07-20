<?php

namespace Database\Factories;

use App\Models\FreeGame;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'description' => fake()->paragraph,
            'slug' => fake()->slug,
            'locked' => false,
            'user_id' => User::factory(),
            'free_game_id' => FreeGame::factory(),
        ];
    }
}
