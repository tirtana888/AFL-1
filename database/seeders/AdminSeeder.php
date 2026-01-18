<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Demo Admin',
            'email' => 'demo@ciputra.com',
            'password' => 'ALP4', // Will be hashed automatically
            'role' => 'super_admin',
        ]);
    }
}
