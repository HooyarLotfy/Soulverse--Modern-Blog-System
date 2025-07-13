<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $categories = ['Life Arc', 'Training', 'Loss', 'Power Ups', 'Inspiration', 'Reflection'];
        
        $titles = [
            'Life Arc' => [
                'The Beginning of My Journey',
                'Finding My Purpose',
                'A New Chapter Unfolds',
                'The Path Forward',
                'Embracing Change'
            ],
            'Training' => [
                'Pushing Through the Plateau',
                'Daily Discipline Challenge',
                'Building Mental Strength',
                'The Grind Never Stops',
                'Mastering the Fundamentals'
            ],
            'Loss' => [
                'Learning from Failure',
                'When Everything Falls Apart',
                'The Cost of Growth',
                'Accepting What I Cannot Control',
                'Rising from the Ashes'
            ],
            'Power Ups' => [
                'Breakthrough Moment',
                'Leveling Up My Skills',
                'New Abilities Unlocked',
                'The Transformation',
                'Peak Performance Achieved'
            ],
            'Inspiration' => [
                'What Drives Me Forward',
                'Finding Light in Darkness',
                'The Power of Belief',
                'Inspiration from Unexpected Places',
                'Fuel for the Soul'
            ],
            'Reflection' => [
                'Looking Back to Move Forward',
                'Lessons from the Journey',
                'What I Learned Today',
                'The Wisdom of Experience',
                'Understanding My Growth'
            ]
        ];

        $bodies = [
            'Life Arc' => [
                'Every great story has a beginning, and today marks the start of mine. I\'ve decided to document this journey not just for myself, but for anyone who might find strength in these words. The path ahead is uncertain, but that\'s what makes it an adventure.',
                'There comes a moment when everything clicks into place. Today was that moment for me. After months of searching, questioning, and doubting, I finally understand what I\'m meant to do. The clarity is both terrifying and exhilarating.',
                'Change is the only constant in life, yet we often resist it with every fiber of our being. I\'m learning to dance with uncertainty, to embrace the unknown as a friend rather than an enemy.',
            ],
            'Training' => [
                'The plateau is the most frustrating part of any journey. You\'re putting in the work, following the plan, but the results seem to have stagnated. Today I learned that plateaus aren\'t roadblocks—they\'re launching pads.',
                'Discipline isn\'t about motivation; it\'s about commitment. When motivation fails, discipline carries you through. Today marked day 100 of my daily practice, and I can finally see the compound effect taking hold.',
                'Mental strength isn\'t built in the gym—it\'s forged in the quiet moments when you choose to continue despite everything telling you to quit.',
            ],
            'Loss' => [
                'Failure isn\'t the opposite of success; it\'s a stepping stone to it. Today\'s setback taught me more about myself than a hundred victories ever could. The sting is real, but so is the growth.',
                'Sometimes the universe dismantles everything you\'ve built to show you that you\'re stronger than your circumstances. In the rubble of my plans, I\'m finding the foundation for something better.',
                'There\'s a difference between giving up and letting go. Today I learned when to hold on and when to release my grip.',
            ],
            'Power Ups' => [
                'Breakthrough moments don\'t announce themselves with fanfare. They whisper in the quiet realization that what once seemed impossible now feels inevitable. Today I crossed a threshold I didn\'t even know existed.',
                'Skills aren\'t just accumulated—they\'re transformed. Today I experienced the moment when practice becomes intuition, when effort becomes effortless.',
                'Growth isn\'t always gradual. Sometimes it happens in quantum leaps that leave you breathless and wondering how you ever lived without this new perspective.',
            ],
            'Inspiration' => [
                'Inspiration isn\'t a lightning bolt—it\'s a steady flame that burns brightest when you tend to it daily. Today I found fuel in the most unexpected place.',
                'The human spirit is remarkably resilient. In the darkest moments, we discover lights we never knew existed within us.',
                'Belief isn\'t about certainty; it\'s about moving forward despite uncertainty. Today I chose to believe in possibilities I can\'t yet see.',
            ],
            'Reflection' => [
                'The rearview mirror shows where you\'ve been, but it shouldn\'t determine where you\'re going. Looking back today, I see not mistakes but lessons, not failures but foundations.',
                'Experience is a harsh teacher—it gives the test first and the lesson after. But the lessons learned through experience stick in ways that theoretical knowledge never could.',
                'Growth isn\'t always visible in the moment. It\'s in the quiet accumulation of small changes that one day reveal themselves as transformation.',
            ]
        ];

        $category = $this->faker->randomElement($categories);
        $title = $this->faker->randomElement($titles[$category]);
        $body = $this->faker->randomElement($bodies[$category]);

        return [
            'title' => $title,
            'body' => $body,
            'category' => $category,
            'user_id' => User::factory(),
            'cover_image' => null,
            'is_public' => true,
            'is_private' => false,
            'created_at' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'updated_at' => now(),
        ];
    }
}
