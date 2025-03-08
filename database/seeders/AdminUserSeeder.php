<?php

namespace Database\Seeders;

use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        Administrator::create([
            'username' => env('ADMIN_USERNAME', 'admin'), // Get from .env or use default
            'password' => Hash::make(env('ADMIN_PASSWORD', 'default_password')), // Get from .env
            'email' => env('ADMIN_EMAIL', 'admin@example.com'), // Get from .env
        ]);
    }
}
