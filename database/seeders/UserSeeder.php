<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'full_name' => 'Admin 1',
            'email' => 'admin@notaris.id',
            'role' => 'ADMIN',
            'password' => Hash::make('admin')
        ]);

        User::create([
            'name' => 'User',
            'full_name' => 'User Test 1',
            'email' => 'user@notaris.id',
            'role' => 'USER',
            'password' => Hash::make('user')
        ]);
    }
}
