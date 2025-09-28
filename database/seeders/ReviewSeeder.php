<?php
/**
 * Cinexio - Seeder for reviews table
 *
 * Seeds the reviews table with realistic reviews for existing users and movies.
 *
 * @package    Cinexio
 * @author     Reza Bagheri <rezabagheri@gmail.com>
 * @copyright  2025 Reza Bagheri
 * @license    MIT License
 * @version    1.0.0
 * @link       https://github.com/rezabagheri/cinexio
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Movie;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();
        $movieIds = Movie::pluck('id')->toArray();
        $statuses = ['approved', 'pending', 'rejected'];
        $reviewed = [];
        $total = 0;
        // Each user reviews 5-15 random movies
        foreach ($userIds as $userId) {
            $moviesForUser = $faker->randomElements($movieIds, $faker->numberBetween(5, 15));
            foreach ($moviesForUser as $movieId) {
                // Prevent duplicate review for same user/movie
                $key = $userId.'_'.$movieId;
                if (isset($reviewed[$key])) continue;
                $reviewed[$key] = true;
                Review::create([
                    'user_id' => $userId,
                    'movie_id' => $movieId,
                    'content' => $faker->paragraph(2),
                    'rating' => $faker->randomFloat(1, 4, 10),
                    'status' => $faker->randomElement($statuses),
                    'parent_id' => null,
                ]);
                $total++;
            }
        }
        // Optionally, add replies to some reviews, ensuring unique (movie_id, user_id)
        $reviewIds = Review::pluck('id')->toArray();
        foreach ($faker->randomElements($reviewIds, min(50, count($reviewIds))) as $parentId) {
            $parent = Review::find($parentId);
            if (!$parent) continue;
            $usedUserIds = Review::where('movie_id', $parent->movie_id)->pluck('user_id')->toArray();
            $availableUserIds = array_diff($userIds, $usedUserIds);
            if (empty($availableUserIds)) continue;
            $replyUserId = $faker->randomElement($availableUserIds);
            Review::create([
                'user_id' => $replyUserId,
                'movie_id' => $parent->movie_id,
                'content' => $faker->sentence(8),
                'rating' => null,
                'status' => 'approved',
                'parent_id' => $parentId,
            ]);
        }
    }
}
