<?php

namespace Database\Seeders;

use App\Models\Characters;
use Illuminate\Database\Seeder;

class CharactersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Characters::factory()->create([
            'name' => 'Cale Henituse',
            'nicknames' => 'Kim Rok Soo',
            'role' => 'Main protagonist',
            'physical_characteristics' => 'Red hair and a pretty fit body. It wouldn’t be wrong to say he had a body that would make any style look good',
            'personality' =>  'Intelligent, crafty and sly, weak (physically) but strong',
            'biography' => 'His soul was moved into the body of Cale Henituse: a minor antagonist from the novel (courtesy of the God of Death). Prior to transmigrating, he had only read the first 5 volumes of the novel. As a result, he did not know the events that would happen after the first 5 volumes.',
            'notes' => '',
            'book_id' => '1',
        ]);

        Characters::factory()->count(1000)->create();
    }
}
