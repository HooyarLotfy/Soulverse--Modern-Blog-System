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

        // Note: Admin user creation removed for security
        // Please create admin users manually using instructions in ADMIN_SETUP.md

        // Seed posts with demo content
        $this->call([
            PostSeeder::class,
        ]);
    }
}
