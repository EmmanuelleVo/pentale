<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discussion>
 */
class DiscussionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = Carbon::create(fake()->dateTimeBetween('-3 years', 'now')->format('Y-m-d H:i:s'));

        return [
            'body' => fake()->sentence(100),
            'commentable_type' => 'App\Models\Discussion',
            'parent_id' => null,
            'commentable_id' => null,
            'created_at' => $created_at,
            'updated_at' => rand(0, 10) ? $created_at : $created_at->addWeeks(rand(2, 8)),
            'deleted_at' => rand(0, 10) ? null : Carbon::now(),
            'user_id' => random_int(1, User::max('id')),
            'thread_id' => random_int(1, Thread::max('id')),
        ];
    }
}
