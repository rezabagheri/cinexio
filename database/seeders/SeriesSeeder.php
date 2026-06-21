<?php
/**
 * Cinexio - Seeder for series and all related tables
 *
 * Seeds the series table and all related tables (seasons, episodes, series_genre, series_tag, series_person) with realistic data using Faker.
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
use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Tag;
use App\Models\Person;
use Faker\Factory as Faker;

class SeriesSeeder extends Seeder
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
        $statuses = ['Ongoing', 'Ended', 'Canceled'];
        $countriesList = ['US', 'FR', 'DE', 'IT', 'JP', 'IR', 'CN', 'RU', 'GB', 'CA'];

        for ($i = 1; $i <= 50; $i++) {
            $series = Series::create([
                'title' => $faker->unique()->sentence(3),
                'original_title' => $faker->optional()->sentence(3),
                'description' => $faker->paragraph(3),
                'start_year' => $faker->numberBetween(1980, 2025),
                'end_year' => $faker->optional(0.3)->numberBetween(1985, 2025),
                'rating' => $faker->randomFloat(1, 4, 9.9),
                'age_rating' => $faker->optional()->randomElement(['TV-G', 'TV-PG', 'TV-14', 'TV-MA']),
                'countries' => json_encode($faker->randomElements($countriesList, $faker->numberBetween(1, 2))),
                'original_language' => $faker->randomElement($languages),
                'imdb_id' => 'tt' . $faker->unique()->numberBetween(1000000, 9999999),
                'tmdb_id' => $faker->unique()->numberBetween(10000, 999999),
                'poster_url' => $faker->imageUrl(300, 450, 'series'),
                'status' => $faker->randomElement($statuses),
                'seasons_count' => 0, // will update later
            ]);

            // Genres (1-3 per series)
            $series->genres()->attach($faker->randomElements($genreIds, $faker->numberBetween(1, 3)));
            // Tags (0-4 per series)
            if ($faker->boolean(80)) {
                $series->tags()->attach($faker->randomElements($tagIds, $faker->numberBetween(0, 4)));
            }
            // People (2-8 per series)
            $people = $faker->randomElements($personIds, $faker->numberBetween(2, 8));
            $roles = ['Director', 'Actor', 'Writer', 'Producer', 'Composer'];
            $attachPeople = [];
            foreach ($people as $pid) {
                $attachPeople[$pid] = ['role' => $faker->randomElement($roles)];
            }
            $series->people()->attach($attachPeople);

            // Seasons (1-8 per series)
            $numSeasons = $faker->numberBetween(1, 8);
            $series->seasons_count = $numSeasons;
            $series->save();
            for ($s = 1; $s <= $numSeasons; $s++) {
                $season = Season::create([
                    'series_id' => $series->id,
                    'season_number' => $s,
                    'title' => $faker->optional()->sentence(2),
                    'description' => $faker->optional()->paragraph(2),
                    'start_date' => $faker->date('Y-m-d', '-5 years'),
                    'end_date' => $faker->optional(0.5)->date('Y-m-d', 'now'),
                    'poster_url' => $faker->imageUrl(300, 450, 'season'),
                    'episodes_count' => 0, // will update later
                ]);
                // Episodes (4-24 per season)
                $numEpisodes = $faker->numberBetween(4, 24);
                $season->episodes_count = $numEpisodes;
                $season->save();
                for ($e = 1; $e <= $numEpisodes; $e++) {
                    Episode::create([
                        'season_id' => $season->id,
                        'episode_number' => $e,
                        'title' => $faker->optional()->sentence(2),
                        'summary' => $faker->optional()->paragraph(2),
                        'air_date' => $faker->date('Y-m-d', 'now'),
                        'duration' => $faker->numberBetween(20, 60),
                        'video_url' => $faker->optional()->url,
                        'disk_id' => null,
                        'quality' => $faker->optional()->randomElement(['SD', 'HD', 'FullHD', '4K']),
                    ]);
                }
            }
        }
    }
}
