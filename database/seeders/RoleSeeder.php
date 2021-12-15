<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => 'Admin'
        ]);
        Role::create([
            'role' => 'User'
        ]);
        Role::create([
            'role' => 'SuperAdmin'
        ]);
    }
}
