<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin@123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Manager User',
            'email' => 'manager@admin.com',
            'password' => bcrypt('admin@123'),
            'role' => 'admin'
        ]);
    }
}
