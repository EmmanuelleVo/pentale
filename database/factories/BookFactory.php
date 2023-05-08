<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(7);
        $created_at = Carbon::create(fake()->dateTimeBetween('-3 years', 'now')->format('Y-m-d H:i:s'));

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'synopsis' => fake()->paragraph(8),
            'cover' => fake()->imageUrl(300, 300, true),
            'status' => 'ongoing',
            'published_at' => $created_at->addDays(rand(0, 1) * rand(2, 20)),
            'created_at' => $created_at,
            'updated_at' => rand(0, 10) ? $created_at : $created_at->addWeeks(rand(2, 8)),
            'deleted_at' => rand(0, 10) ? null : Carbon::now(),
            'user_id' => random_int(1, User::max('id')),
        ];
    }
}
