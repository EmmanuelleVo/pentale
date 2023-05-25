<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $username = fake()->userName();
        return [
            'username' => $username,
            'slug' => Str::slug($username),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'avatar' => fake()->imageUrl(300, 300, true, 'people', $username),
            'discord' => fake()->url,
            'instagram' => fake()->url,
            'twitter' => fake()->url,
            'biography' => fake()->sentence(10),
            'remember_token' => Str::random(10),
            'role_id' => random_int(2, Role::max('id')),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
