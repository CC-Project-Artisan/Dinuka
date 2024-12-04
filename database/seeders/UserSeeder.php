<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'), 
                'phone' => '1234567890',
                'role' => 'admin',
                'isActive' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User 1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('12345678'),
                'phone' => '9876543210',
                'role' => 'user',
                'isActive' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('12345678'), 
                'phone' => '5555555555',
                'role' => 'user',
                'isActive' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
