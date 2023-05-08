<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'author', 'translator', 'reader', 'guest'];
        foreach ($roles as $role) {
            Role::factory()->create([
                'name' => $role,
                'slug' => Str::slug($role),
            ]);
        }
    }
}
