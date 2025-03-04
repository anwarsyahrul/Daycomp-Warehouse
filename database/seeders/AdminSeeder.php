<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
       public function run()
    {
        User::updateOrCreate(
            ['email' => 'daycom@gmail.com'], // Ensure no duplicate entries
            [
                'name' => 'Admin Daycom',
                'email' => 'daycom@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin', // Ensure this matches your "admin" role setup
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
