<?php
/**
 * Cinexio - Seeder for comments table
 *
 * Seeds the comments table with realistic comments for existing users and movies.
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
use App\Models\Comment;
use App\Models\User;
use App\Models\Movie;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
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
        // Each user comments on 5-15 random movies
        foreach ($userIds as $userId) {
            $moviesForUser = $faker->randomElements($movieIds, $faker->numberBetween(5, 15));
            foreach ($moviesForUser as $movieId) {
                Comment::create([
                    'user_id' => $userId,
                    'movie_id' => $movieId,
                    'content' => $faker->realText($faker->numberBetween(40, 200)),
                ]);
                $total++;
            }
        }
        $this->command?->info("Seeded $total comments.");
    }
}
