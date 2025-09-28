<?php
/**
 * Cinexio - Seeder for ratings table
 *
 * Seeds the ratings table with realistic ratings for existing users and movies.
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
use App\Models\Rating;
use App\Models\User;
use App\Models\Movie;
use Faker\Factory as Faker;

class RatingSeeder extends Seeder
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
        $rated = [];
        // Each user rates 10-30 random movies
        foreach ($userIds as $userId) {
            $moviesForUser = $faker->randomElements($movieIds, $faker->numberBetween(10, 30));
            foreach ($moviesForUser as $movieId) {
                $key = $userId.'_'.$movieId;
                if (isset($rated[$key])) continue;
                $rated[$key] = true;
                Rating::create([
                    'user_id' => $userId,
                    'movie_id' => $movieId,
                    'value' => $faker->randomFloat(1, 1, 10),
                    'status' => $faker->randomElement($statuses),
                ]);
            }
        }
    }
}
