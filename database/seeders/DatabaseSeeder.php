<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ThreadsSeeder::class);
        $this->call(DiscussionsSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(GenresSeeder::class);
        $this->call(BooksSeeder::class);
        $this->call(ChaptersSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(ThreadCategoryRelationshipSeeder::class);
        $this->call(BookTagRelationshipSeeder::class);
        $this->call(BookGenreRelationshipSeeder::class);
    }
}
