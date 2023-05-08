<?php

namespace Database\Seeders;

use App\Models\Discussion;
use Illuminate\Database\Seeder;

class DiscussionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discussion::factory()->count(500)->create();
    }
}
