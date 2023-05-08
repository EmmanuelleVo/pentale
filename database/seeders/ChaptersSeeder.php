<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Database\Seeder;

class ChaptersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chapter::factory()->count(2000)->create();
    }
}
