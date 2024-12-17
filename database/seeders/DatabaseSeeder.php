<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'SuperAdministrator',
            'email' => 'superadmin@gmail.com',
            'password' =>  bcrypt('password'),
            'user_type' => 'superadmin',
        ]);

        
        
    }
}