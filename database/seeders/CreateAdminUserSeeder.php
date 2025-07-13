<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Hooyar Lotfy',
            'email' => 'robin.hooyar@gmail.com',
            'password' => Hash::make('Maya@68163404'), // Change this to your preferred password
            'is_admin' => true,
        ]);
        
        echo "Admin user created: {$user->name} ({$user->email})\n";
        echo "Password: password123\n";
    }
}
