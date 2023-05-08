<?php

namespace Database\Factories;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapter>
 */
class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(5);
        $created_at = Carbon::create(fake()->dateTimeBetween('-3 years', 'now')->format('Y-m-d H:i:s'));
        return [
            'title' => $title,
            'chapter_number' => fake()->numberBetween(1, 500),
            'slug' => Str::slug($title),
            'body' => fake()->paragraph(10),
            'author_note' => fake()->paragraph(2),
            'created_at' => $created_at,
            'published_at' => $created_at->addDays(rand(0, 1) * rand(2, 20)),
            'updated_at' => rand(0, 10) ? $created_at : $created_at->addWeeks(rand(2, 8)),
            'deleted_at' => rand(0, 10) ? null : Carbon::now(),
            'book_id' => random_int(1, Book::max('id')),
        ];
    }
}
