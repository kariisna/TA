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
            'kelas' => '',
            'no_hp' => '000',
        ]);

        // Create Teacher User
        User::create([
            'username' => 'samsudin',
            'name' => 'Pak Samsudin',
            'email' => 'teacher@webkonsul.com',
            'password' => Hash::make('teacher123'),
            'role' => 'teacher',
            'kelas' => '',
            'no_hp' => '08599999999',
        ]);
        User::create([
            'username' => 'jo',
            'name' => 'Pak Jo',
            'email' => 'teacher2@webkonsul.com',
            'password' => Hash::make('teacher123'),
            'role' => 'teacher',
            'kelas' => '',
            'no_hp' => '08599999999',
        ]);

        // Create Student User
        User::create([
            'username' => 'anca',
            'name' => 'Anca dwi krisna',
            'email' => 'student@webkonsul.com',
            'password' => Hash::make('anca'),
            'role' => 'student',
            'kelas' => 'XII TSM A',
            'no_hp' => '8599999999',
        ]);
        User::create([
            'username' => 'arif',
            'name' => 'Arif kurniawan',
            'email' => 'student1@webkonsul.com',
            'password' => Hash::make('arif'),
            'role' => 'student',
            'kelas' => 'X TKJ A',
            'no_hp' => '8599999999',
        ]);
        User::create([
            'username' => 'atha',
            'name' => 'Athadzaki alvaro',
            'email' => 'student2@webkonsul.com',
            'password' => Hash::make('atha'),
            'role' => 'student',
            'kelas' => 'XII RPL A',
            'no_hp' => '8599999999',
        ]);
        User::create([
            'username' => 'abror',
            'name' => 'Abrar rayhan',
            'email' => 'student3@webkonsul.com',
            'password' => Hash::make('abror'),
            'role' => 'student',
            'kelas' => 'XII BP A',
            'no_hp' => '8599999999',
        ]);
        User::create([
            'username' => 'egha',
            'name' => 'Mas Egha',
            'email' => 'student4@webkonsul.com',
            'password' => Hash::make('egha'),
            'role' => 'student',
            'kelas' => 'XII TKR A',
            'no_hp' => '8599999999',
        ]);
    }
}