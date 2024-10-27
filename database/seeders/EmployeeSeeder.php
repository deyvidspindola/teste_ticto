<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Employee User',
            'email' => 'employee@employee.com',
            'password' => bcrypt('teste@123'),
            'role' => 'employee'
        ]);
    }
}
