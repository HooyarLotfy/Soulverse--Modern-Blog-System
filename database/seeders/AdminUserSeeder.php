<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // This seeder is disabled for security reasons
        // To create an admin user, please follow these steps:
        // 1. Register a new user through the web interface
        // 2. Run: php artisan tinker
        // 3. Execute: User::where('email', 'your-email@example.com')->update(['is_admin' => true]);
        
        echo "AdminUserSeeder is disabled for security.\n";
        echo "Please create admin users manually using the instructions in this file.\n";
        
        return;
    }
}
