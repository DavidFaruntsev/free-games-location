<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => fake()->paragraph,
            'image' => 'https://picsum.photos/640/480',
            'likes' => fake()->numberBetween(0, 100),
            'dislikes' => fake()->numberBetween(0, 50),
            'thread_id' => Thread::inRandomOrder()->value('id'),
            'user_id'   => User::inRandomOrder()->value('id'),
            'parent_id' => null,
        ];
    }
}
