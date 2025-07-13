<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('email', 'robin.hooyar@gmail.com')->first();
        
        if ($user) {
            $user->is_admin = 1;
            $user->save();
            
            echo "User {$user->name} ({$user->email}) has been made admin.\n";
        } else {
            echo "User with email robin.hooyar@gmail.com not found.\n";
        }
    }
}
