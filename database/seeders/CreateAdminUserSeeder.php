<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        // This seeder is disabled for security reasons
        // To create an admin user manually:
        // 1. Register through the web interface at /register
        // 2. Use php artisan tinker and run:
        //    User::where('email', 'your-email@example.com')->update(['is_admin' => true]);
        // 
        // Or create a new user and make them admin in one step:
        // User::create([
        //     'name' => 'Your Name',
        //     'email' => 'your-email@example.com',
        //     'password' => Hash::make('your-secure-password'),
        //     'is_admin' => true,
        // ]);
        
        echo "CreateAdminUserSeeder is disabled for security.\n";
        echo "Please create admin users manually using the instructions in this file.\n";
        
        return;
    }
}
