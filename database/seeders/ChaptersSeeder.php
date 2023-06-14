<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Chapter;
use Database\Factories\ChapterFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChaptersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Chapter::factory()->count(2000)->create();


        // Nombre de chapitres aléatoires
        // chapter_number++ pour chaque book_id

        /*$chapters = random_int(1, 30);

        for ($i = 1; $i <= $chapters; $i++) {
            Chapter::factory()->create([
                'chapter_number' => $i,
            ]);

            //$chapters->chapters()->save(factory(ChapterFactory::class)->make(['chapter_number' => $i]));
        }*/
    }
}
