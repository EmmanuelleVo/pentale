<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Report Bugs', 'Novel Discussions', 'Questions', 'Novel Recommendations', 'Spoilers', 'Chapter Discussions'];
        foreach ($categories as $category) {
            Category::factory()->create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
