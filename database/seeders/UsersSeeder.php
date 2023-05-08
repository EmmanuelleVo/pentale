<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->create([
            'name' => 'Emmanuelle Vo',
            'username' => 'emmanuelle-vo',
            'slug' => 'emmanuelle-vo',
            'email' => 'emmanuelle.vo@student.hepl.be',
            'password' =>  bcrypt('password'),
            'discord' => 'discord.com',
            'instagram' => 'instagram.com',
            'twitter' => 'twitter.com',
            'biography' => 'I am the one and only admin !',
            'role_id' => '1',
        ]);

        User::factory()->count(40)->create();

    }
}
