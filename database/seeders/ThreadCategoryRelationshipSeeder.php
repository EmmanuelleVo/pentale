<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Thread;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThreadCategoryRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories_ids = DB::table('categories')->pluck('id');

        for ($i = 0; $i < Thread::max('id'); $i++) {
            $thread_id = $i+1;
            for ($j = rand(0, intdiv(7, 2)); $j < Category::max('id'); $j += rand(1, Category::max('id'))) {
                $category_id = $categories_ids[$j];
                DB::table('thread_category')->insert(compact('thread_id', 'category_id'));
            }
        }
    }
}
