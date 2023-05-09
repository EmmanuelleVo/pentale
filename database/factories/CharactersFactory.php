<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Characters>
 */
class CharactersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();

        return [
            'name' => $name,
            'nicknames' => fake()->userName(),
            'role' => fake()->word(),
            'physical_characteristics' => '<p>' . implode('</p><p>', fake()->paragraphs(3)) . '</p>',
            'personality' => '<p>' . implode('</p><p>', fake()->paragraphs(3)) . '</p>',
            'biography' => '<p>' . implode('</p><p>', fake()->paragraphs(5)) . '</p>',
            'notes' => fake()->paragraphs(10, true),
            'book_id' => random_int(1, Book::max('id')),
        ];
    }
}
