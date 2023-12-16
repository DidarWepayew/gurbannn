<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'rating' => rand(1, 5),
            'comment' => fake()->paragraph(),
            'reply' => rand(0, 1) ? fake()->paragraph() : null,
            'status' => rand(0, 2),
            'created_at' => fake()->dateTimeBetween('-1 months', 'now'),
        ];
    }
}
