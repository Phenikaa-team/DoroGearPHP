<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Import thư viện Hash
use App\Models\User;                  // Import model User
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'full_name' => 'Admin User',
            'email' => 'admin@doro.com',
            'password' => Hash::make('admin'),
            'role' => 'Admin',
            'created_at' => now(),
        ]);

        User::create([
            'full_name' => 'Regular User',
            'email' => 'user@doro.com',
            'password' => Hash::make('user'),
            'role' => 'Customer',
            'created_at' => now(),
        ]);
    }
}
