<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );
        User::updateOrCreate(
            ['username' => 'fairuz'],
            [
                'password' => Hash::make('fairuz123'),
                'role' => 'admin',
            ]
        );
    }
}
