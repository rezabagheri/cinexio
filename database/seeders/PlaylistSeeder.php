<?php
/**
 * Cinexio - Seeder for playlists and playlist_movie tables
 *
 * Seeds the playlists table with realistic playlists for users and attaches movies to each playlist.
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
use App\Models\Playlist;
use App\Models\User;
use App\Models\Movie;
use Faker\Factory as Faker;

class PlaylistSeeder extends Seeder
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
        $playlistCount = 0;
        $pivotCount = 0;
        foreach ($userIds as $userId) {
            $numPlaylists = $faker->numberBetween(2, 5);
            for ($i = 0; $i < $numPlaylists; $i++) {
                $playlist = Playlist::create([
                    'user_id' => $userId,
                    'name' => $faker->words($faker->numberBetween(1, 3), true),
                    'description' => $faker->optional()->realText(60),
                ]);
                $playlistCount++;
                // Attach 5-20 random movies to each playlist (no duplicates)
                $moviesForPlaylist = $faker->randomElements($movieIds, $faker->numberBetween(5, 20));
                $playlist->movies()->attach($moviesForPlaylist);
                $pivotCount += count($moviesForPlaylist);
            }
        }
        $this->command?->info("Seeded $playlistCount playlists and $pivotCount playlist_movie records.");
    }
}
