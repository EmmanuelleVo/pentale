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
        $published_at = $created_at->addDays(rand(0, 1) * rand(2, 20));
        return [
            'title' => $title,
            'chapter_number' => fake()->numberBetween(1, 500),
            'slug' => Str::slug($title),
            'body' => '<p>' . implode('</p><p>', fake()->paragraphs(30)) . '</p>',
            'author_note' => '<p>' . implode('</p><p>', fake()->paragraphs(2)) . '</p>',
            'views' => fake()->numberBetween(0, 5000),
            'saved_at' => $published_at,
            'published_at' => $published_at,
            'created_at' => $created_at,
            'updated_at' => rand(0, 10) ? $created_at : $created_at->addWeeks(rand(2, 8)),
            'deleted_at' => rand(0, 10) ? null : Carbon::now(),
            'book_id' => random_int(1, Book::max('id')),
        ];
    }
}
