<?php
/**
 * Cinexio - Seeder for shared_links table
 *
 * Seeds the shared_links table with realistic shared links for movies, including type, usage_count, and message.
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
use App\Models\SharedLink;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class SharedLinkSeeder extends Seeder
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
        $types = ['view', 'download', 'edit'];
        $total = 0;
        foreach ($userIds as $userId) {
            $moviesForUser = $faker->randomElements($movieIds, $faker->numberBetween(2, 8));
            foreach ($moviesForUser as $movieId) {
                SharedLink::create([
                    'user_id' => $userId,
                    'movie_id' => $movieId,
                    'token' => Str::random(16),
                    'type' => $faker->randomElement($types),
                    'usage_count' => $faker->numberBetween(0, 20),
                    'message' => $faker->optional()->realText(40),
                    'expires_at' => $faker->optional(0.7)->dateTimeBetween('now', '+6 months'),
                    'is_active' => $faker->boolean(85),
                ]);
                $total++;
            }
        }
        $this->command?->info("Seeded $total shared_links records.");
    }
}
