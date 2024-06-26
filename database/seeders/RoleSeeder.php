<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create([
            'nom' => 'admin',
        ]);

        Role::create([
            'nom' => 'user',
        ]);

        Role::create([
            'nom' => 'suscriptor',
        ]);

    }
}
