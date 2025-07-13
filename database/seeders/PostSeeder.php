<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        if (!$user) {
            // Create a demo user for posts if no users exist
            // Note: In production, create admin users manually (see ADMIN_SETUP.md)
            $user = User::create([
                'name' => 'Demo User',
                'email' => 'demo@example.com',
                'password' => bcrypt('password'),
                'is_admin' => false, // Not admin by default for security
            ]);
        }

        $posts = [
            [
                'title' => 'The Beginning Arc: First Steps into the Digital Void',
                'body' => '<p>Every journey starts with a single step into the unknown. This is mine - documenting the evolution of a soul in the digital age. Like any good protagonist, I start at level 1, but the grind never stops.</p><p>Today marks the beginning of this chronicle. Each post will be a chapter, each challenge a boss fight, each victory a power-up. Welcome to my digital dojo.</p>',
                'category' => 'Life Arc',
                'is_public' => true,
                'is_private' => false,
            ],
            [
                'title' => 'Training Montage: Learning to Code Like a Main Character',
                'body' => '<p>The keyboard becomes my weapon, the screen my battlefield. Every bug is a mini-boss, every successful deployment a victory celebration. The grind is real, but so is the growth.</p><p>Stack Overflow is my sensei, documentation my ancient scrolls. Each error message teaches me something new about patience and persistence.</p>',
                'category' => 'Training',
                'is_public' => true,
                'is_private' => false,
            ],
            [
                'title' => 'Loss Arc: When the Server Goes Down',
                'body' => '<p>Not every episode can be a win. Today the production server decided to take an unscheduled vacation, taking my confidence with it. But like any good story, the lowest points are where real character development happens.</p><p>This is my training under the waterfall moment. Painful, necessary, and ultimately transformative.</p>',
                'category' => 'Loss',
                'is_public' => true,
                'is_private' => false,
            ],
            [
                'title' => 'Power Up: Mastering the Dark Arts of CSS Grid',
                'body' => '<p>After weeks of struggling with flexbox like it was my sworn enemy, CSS Grid appeared like a legendary item drop. Suddenly, layouts that seemed impossible became trivial.</p><p>This is what leveling up feels like - when complex problems become simple tools in your arsenal. The student becomes the master, one grid container at a time.</p>',
                'category' => 'Power Ups',
                'is_public' => true,
                'is_private' => false,
            ],
            [
                'title' => 'Inspiration Arc: Finding Your Coding Spirit Animal',
                'body' => '<p>Sometimes you need to step back and remember why you started this journey. For me, its the moment when code becomes art, when function meets form, when technology serves humanity.</p><p>Tonight I built something beautiful. Not just functional, but truly beautiful. This is why we do what we do.</p>',
                'category' => 'Inspiration',
                'is_public' => true,
                'is_private' => false,
            ],
            [
                'title' => 'Reflection: One Year of Digital Evolution',
                'body' => '<p>Looking back at where I started versus where I am now feels like comparing a level 1 character to a seasoned warrior. The skills, the confidence, the ability to see solutions where I once saw only problems.</p><p>This journey changes you. Not just as a developer, but as a person. Each line of code is a step forward in your own personal evolution.</p>',
                'category' => 'Reflection',
                'is_public' => true,
                'is_private' => false,
            ],
        ];

        foreach ($posts as $postData) {
            Post::create(array_merge($postData, [
                'user_id' => $user->id,
            ]));
        }
    }
}
