<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Action',
            'Adventure',
            'Comedy',
            'Drama',
            'Fantasy',
            'Harem',
            'Historical',
            'Horror',
            'Martial Arts',
            'Mature',
            'Mystery',
            'Psychological',
            'Romance',
            'School Life',
            'Sci-fi',
            'Slice of Life',
            'Supernatural',
            'Tragedy',
        ];

        foreach ($genres as $genre) {
            Genre::factory()->create([
                'name' => $genre,
                'slug' => Str::slug($genre),
            ]);
        }
    }
}
