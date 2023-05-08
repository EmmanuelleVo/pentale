<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookGenreRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre_ids = DB::table('genres')->pluck('id');

        for ($i = 0; $i < Book::max('id'); $i++) {
            $book_id = $i+1;
            for ($j = rand(0, intdiv(7, 2)); $j < 7; $j += rand(1, 7)) {
                $genre_id = $genre_ids[$j];
                DB::table('book_genre')->insert(compact('book_id', 'genre_id'));
            }
        }
    }
}
