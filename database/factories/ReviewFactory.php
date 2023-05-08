<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
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
        $created_at = Carbon::create(fake()->dateTimeBetween('-3 years', 'now')->format('Y-m-d H:i:s'));
        $writing_quality = fake()->randomFloat(1, 0, 5);
        $story_development = fake()->randomFloat(1, 0, 5);
        $characters = fake()->randomFloat(1, 0, 5);
        $overall = ($writing_quality + $story_development + $characters)/3;

        return [
            'body' => fake()->sentence(150),
            'writing_quality' => $writing_quality,
            'story_development' => $story_development,
            'characters' => $characters,
            'overall' => $overall,
            'likes' => fake()->numberBetween(0, 300),
            'dislikes' => fake()->numberBetween(0, 150),
            'created_at' => $created_at,
            'updated_at' => rand(0, 10) ? $created_at : $created_at->addWeeks(rand(2, 8)),
            'deleted_at' => rand(0, 10) ? null : Carbon::now(),
            'user_id' => random_int(1, User::max('id')),
            'book_id' => random_int(1, Book::max('id')),
        ];
    }
}
