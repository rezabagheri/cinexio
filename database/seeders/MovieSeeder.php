<?php
/**
 * Cinexio - Seeder for movies and related tables
 *
 * Seeds the movies table and all related pivot tables with realistic data using Faker.
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
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Tag;
use App\Models\Person;
use App\Models\MovieVersion;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $genreIds = Genre::pluck('id')->toArray();
        $tagIds = Tag::pluck('id')->toArray();
        $personIds = Person::pluck('id')->toArray();
        $languages = ['en', 'fr', 'es', 'de', 'it', 'ja', 'fa', 'zh', 'ru'];
        $statuses = ['Released', 'Post Production', 'Planned', 'Canceled'];
        $countriesList = ['US', 'FR', 'DE', 'IT', 'JP', 'IR', 'CN', 'RU', 'GB', 'CA'];

        // Get all disks for linking
        $diskIds = \App\Models\Disk::pluck('id')->toArray();
        $subtitleLanguages = ['en', 'fr', 'es', 'de', 'it', 'ja', 'fa', 'zh', 'ru', 'ar', 'tr', 'pt', 'hi'];
        $subtitleFormats = ['srt', 'ass', 'vtt', 'sub'];

        for ($i = 1; $i <= 50; $i++) {
            $movie = Movie::create([
                'title' => $faker->unique()->sentence(3),
                'original_title' => $faker->optional()->sentence(3),
                'description' => $faker->paragraph(3),
                'year' => $faker->numberBetween(1950, 2025),
                'release_date' => $faker->date('Y-m-d', 'now'),
                'runtime' => $faker->numberBetween(70, 180),
                'imdb_id' => 'tt' . $faker->unique()->numberBetween(1000000, 9999999),
                'tmdb_id' => $faker->unique()->numberBetween(10000, 999999),
                'poster_url' => $faker->imageUrl(300, 450, 'movies'),
                'backdrop_url' => $faker->imageUrl(800, 450, 'movies'),
                'trailer_url' => $faker->optional()->url,
                'original_language' => $faker->randomElement($languages),
                'countries' => json_encode($faker->randomElements($countriesList, $faker->numberBetween(1, 3))),
                'age_rating' => $faker->optional()->randomElement(['G', 'PG', 'PG-13', 'R', 'NC-17']),
                'budget' => $faker->optional()->numberBetween(1000000, 200000000),
                'revenue' => $faker->optional()->numberBetween(1000000, 1000000000),
                'rating' => $faker->randomFloat(1, 4, 9.9),
                'votes' => $faker->numberBetween(100, 1000000),
                'status' => $faker->randomElement($statuses),
            ]);

            // Genres (1-3 per movie)
            $movie->genres()->attach($faker->randomElements($genreIds, $faker->numberBetween(1, 3)));
            // Tags (0-4 per movie)
            if ($faker->boolean(80)) {
                $movie->tags()->attach($faker->randomElements($tagIds, $faker->numberBetween(0, 4)));
            }
            // People (2-8 per movie)
            $people = $faker->randomElements($personIds, $faker->numberBetween(2, 8));
            $roles = ['Director', 'Actor', 'Writer', 'Producer', 'Composer'];
            $attachPeople = [];
            foreach ($people as $pid) {
                $attachPeople[$pid] = ['role' => $faker->randomElement($roles)];
            }
            $movie->people()->attach($attachPeople);

            // Versions (1-3 per movie), each linked to a disk
            $numVersions = $faker->numberBetween(1, 3);
            for ($v = 0; $v < $numVersions; $v++) {
                $diskId = $faker->randomElement($diskIds);
                $version = MovieVersion::create([
                    'movie_id' => $movie->id,
                    'version_name' => $faker->randomElement(['Theatrical', 'Director\'s Cut', 'Extended', 'Remastered']),
                    'quality' => $faker->randomElement(['SD', 'HD', 'FullHD', '4K']),
                    'disk_id' => $diskId,
                ]);

                // Subtitles (0-3 per version/disk)
                $numSubtitles = $faker->numberBetween(0, 3);
                for ($s = 0; $s < $numSubtitles; $s++) {
                    \App\Models\Subtitle::create([
                        'disk_id' => $diskId,
                        'language' => $faker->randomElement($subtitleLanguages),
                        'file_path' => $faker->filePath(),
                        'format' => $faker->randomElement($subtitleFormats),
                    ]);
                }
            }
        }
    }
}
