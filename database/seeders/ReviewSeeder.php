<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $reviews = [
            [
                'user_id' => 1,
                'movie_id' => 299536,
                'rating' => 10,
                'title' => 'Mind-blowing Madness!',
                'description' => 'Watching this movie is like trying to contain a tornado in a teacup. So much action, so little time!',
            ],
            [
                'user_id' => 2,
                'movie_id' => 24428,
                'rating' => 4,
                'title' => 'Epic Ensemble!',
                'description' => 'Seeing all these heroes team up is like a superhero buffet - a little bit of everything, and it leaves you wanting more!',
            ],
            [
                'user_id' => 1,
                'movie_id' => 299534,
                'rating' => 9,
                'title' => 'Emotional Rollercoaster!',
                'description' => 'This movie made me laugh, cry, and cheer all at the same time. It\'s a journey I\'ll never forget!',
            ],
            [
                'user_id' => 2,
                'movie_id' => 99861,
                'rating' => 6,
                'title' => 'Ultron\'s Got Sass!',
                'description' => 'Ultron may be a genocidal robot, but you have to admire his sense of humor. Too bad he\'s also bent on world domination!',
            ],
            [
                'user_id' => 1,
                'movie_id' => 299536,
                'rating' => 4,
                'title' => 'Incredible Visuals!',
                'description' => 'The special effects in this movie are mind-boggling! I felt like I was right in the middle of the action.',
            ],
            [
                'user_id' => 2,
                'movie_id' => 24428,
                'rating' => 5,
                'title' => 'Hulk Smash!',
                'description' => 'Hulk\'s smashing scenes never get old. Every time he goes green, it\'s pure entertainment!',
            ],
            [
                'user_id' => 1,
                'movie_id' => 299534,
                'rating' => 4,
                'title' => 'Avengers Assemble!',
                'description' => 'The ultimate team-up! Watching all the Avengers together on screen is a dream come true for any comic book fan.',
            ],
            [
                'user_id' => 2,
                'movie_id' => 99861,
                'rating' => 4,
                'title' => 'Vision\'s Wisdom!',
                'description' => 'Vision may be an AI, but his philosophical musings are deep. Who knew a robot could be so profound?',
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
