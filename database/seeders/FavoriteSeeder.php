<?php
/**
 * Cinexio - Seeder for favorites table
 *
 * Seeds the favorites table with realistic favorite movies for existing users.
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
use App\Models\Favorite;
use App\Models\User;
use App\Models\Movie;
use Faker\Factory as Faker;

class FavoriteSeeder extends Seeder
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
        // Each user favorites 5-20 random movies (no duplicates)
        foreach ($userIds as $userId) {
            $moviesForUser = $faker->randomElements($movieIds, $faker->numberBetween(5, 20));
            foreach ($moviesForUser as $movieId) {
                Favorite::firstOrCreate([
                    'user_id' => $userId,
                    'movie_id' => $movieId,
                ]);
                $total++;
            }
        }
        $this->command?->info("Seeded $total favorite items.");
    }
}
