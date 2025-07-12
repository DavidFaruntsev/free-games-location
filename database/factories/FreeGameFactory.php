<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FreeGame>
 */
class FreeGameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'game_id' => fake()->numberBetween(1000, 9999),
            'title' => fake()->sentence(3),
            'thumbnail' => fake()->imageUrl(640, 480, 'games', true),
            'short_description' => fake()->text(150),
            'game_url' => fake()->url(),
            'genre' => fake()->word(),
            'platform' => fake()->randomElement(['PC', 'Browser', 'Mobile']),
            'publisher' => fake()->company(),
            'developer' => fake()->company(),
            'release_date' => fake()->date('Y-m-d'),
            'freetogame_profile_url' => fake()->url(),
        ];
    }
}
