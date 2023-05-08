<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->word();
        $created_at = Carbon::create(fake()->dateTimeBetween('-3 years', 'now')->format('Y-m-d H:i:s'));
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'created_at' => $created_at,
        ];
    }
}
