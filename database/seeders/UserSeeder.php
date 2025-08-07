<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default accounts
        User::create([
            'name' => 'Default User',
            'username' => 'defaultuser',
            'email' => 'user@mail.com',
            'mobile' => '1111111111',
            'is_admin' => 0,
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Admin User',
            'username' => 'adminuser',
            'email' => 'admin@mail.com',
            'mobile' => '2222222222',
            'is_admin' => 1,
            'password' => bcrypt('password'),
        ]);

        User::factory(20)->create();
    }
}
