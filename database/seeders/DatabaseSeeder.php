<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Remove all existing data (SQLite compatible)
        \DB::table('posts')->delete();
        \DB::table('users')->delete();

        // Create the admin user
        $admin = User::create([
            'name' => 'Hooyar Lotfy',
            'email' => 'robin.hooyar@gmail.com',
            'password' => Hash::make('Maya68163404'),
            'is_admin' => true,
        ]);

        // Seed posts with demo content
        $this->call([
            PostSeeder::class,
        ]);
    }
}
