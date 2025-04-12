<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'username' => 'admin',
            'name' => 'Administrator',
            'email' => 'admin@webkonsul.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create Teacher User
        User::create([
            'username' => 'teacher',
            'name' => 'Teacher User',
            'email' => 'teacher@webkonsul.com',
            'password' => Hash::make('teacher123'),
            'role' => 'teacher',
        ]);

        // Create Student User
        User::create([
            'username' => 'ancaaaahhh',
            'name' => 'Student User',
            'email' => 'student@webkonsul.com',
            'password' => Hash::make('anca'),
            'role' => 'student',
        ]);
    }
}