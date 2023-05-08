<?php

namespace Database\Seeders;

use App\Models\Book;
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
        $status = ['Ongoing', 'Completed', 'Hiatus'];

        for ($i = 1; $i < 100; $i++) {
            $randomNumber = rand(0,100);
            if($randomNumber > 90) {
                Book::factory()->create([
                    'status' => 'hiatus'
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

        //Book::factory()->count(100)->create();
    }
}
