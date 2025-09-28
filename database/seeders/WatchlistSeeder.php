<?php
/**
 * Cinexio - Seeder for watchlist table
 *
 * Seeds the watchlist table with realistic watchlist items for existing users and movies.
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
use App\Models\Watchlist;
use App\Models\User;
use App\Models\Movie;
use Faker\Factory as Faker;

class WatchlistSeeder extends Seeder
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
        $total = 0;
        // Each user adds 10-25 random movies to their watchlist
        foreach ($userIds as $userId) {
            $moviesForUser = $faker->randomElements($movieIds, $faker->numberBetween(10, 25));
            foreach ($moviesForUser as $movieId) {
                Watchlist::create([
                    'user_id' => $userId,
                    'movie_id' => $movieId,
                    'planned_at' => $faker->optional()->dateTimeBetween('-1 year', '+6 months'),
                    'watched' => $faker->boolean(60), // 60% watched
                ]);
                $total++;
            }
        }
        $this->command?->info("Seeded $total watchlist items.");
    }
}
