<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Female lead',
            'Male lead',
            'Weak to Strong',
            'Superpowers',
            'Clever protagonist',
            'Tragic past',
            'Survival',
            'Zombie',
            'Friendship',
            'Family',
            'Apocalypse',
            'Siblings',
            'Strong from the start',
            'Game element',
            'Dragons',
            'Elves',
            'Medieval settings',
            'Modern days',
        ];

        foreach ($tags as $tag) {
            Tag::factory()->create([
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);
        }
    }
}
