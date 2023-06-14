<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['ongoing', 'completed', 'hiatus'];
        $body = ['When I opened my eyes, I was inside a novel.
                [The Birth of a Hero].
                [The Birth of a Hero] was a novel focused on the adventures of the main character, Choi Han, a high school boy who was transported to a different dimension from Earth, along with the birth of the numerous heroes of the continent.
                I became a part of that novel as the tr*sh of the Count’s family, the family that oversaw the territory where the first village that Choi Han visits is located.

                The problem is that Choi Han becomes twisted after that village, and everyone in it, is destroyed by assassins.

                The bigger problem is the fact that this s*upid tr*sh who I’ve become doesn’t know about what happened in the village and messes with Choi Han, only to get beaten to a pulp.

                “…This is going to be a headache.”

                I feel like something serious has happened to me.

                But it was worth trying to make this my new life.'];

        Book::factory()->create([
            'title' => 'Trash of the Count\'s Family',
            'slug' => 'trash-of-the-counts-family',
            'status' => 'ongoing',
            'synopsis' => '<p>' . implode('</p><p>', $body) . '</p>',
            'user_id' => '1',
        ]);

        $chapters = random_int(1, 30);
        for ($i = 1; $i < 100; $i++) {
            $randomNumber = rand(0,100);

            if($randomNumber > 90) {
                Book::factory()->create([
                    'status' => 'hiatus',
                    'language' => 'fr',
                ]);
            } elseif ($randomNumber < 30) {
                Book::factory()->create([
                    'status' => 'completed'
                ]);
            } else {
                Book::factory()->create([
                    'status' => 'ongoing'
                ]);
            }
        }


        Book::factory()->count(100)->create()->each(static function(Book $book) {
            $chapterCount = random_int(1, 30);
            for ($i = 1; $i <= $chapterCount; $i++) {
                $book->chapters()->save(Chapter::factory()->make(['chapter_number' => $i]));
            }
        });





        /*$chapters = random_int(1, 30);

        for ($i = 1; $i <= $chapters; $i++) {
            Chapter::factory()->create([
                'chapter_number' => $i,
            ]);

            //$chapters->chapters()->save(factory(ChapterFactory::class)->make(['chapter_number' => $i]));
        }*/

        //Book::factory()->count(100)->create();
    }
}
