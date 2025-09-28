<?php
/**
 * Cinexio - Seeder for activity_log table
 *
 * Seeds the activity_log table with realistic user activities, including polymorphic subjects.
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
use App\Models\ActivityLog;
use App\Models\User;
use App\Models\Movie;
use App\Models\Playlist;
use Faker\Factory as Faker;

class ActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();
        $movieIds = Movie::pluck('id')->toArray();
        $playlistIds = Playlist::pluck('id')->toArray();
        $actions = [
            'watched' => Movie::class,
            'added_to_favorites' => Movie::class,
            'added_to_playlist' => Playlist::class,
            'commented' => Movie::class,
            'rated' => Movie::class,
            'created_playlist' => Playlist::class,
        ];
        $total = 0;
        foreach ($users as $user) {
            $numActivities = $faker->numberBetween(10, 30);
            for ($i = 0; $i < $numActivities; $i++) {
                $action = $faker->randomElement(array_keys($actions));
                $subjectType = $actions[$action];
                if ($subjectType === Movie::class) {
                    $subjectId = $faker->randomElement($movieIds);
                } elseif ($subjectType === Playlist::class) {
                    $subjectId = $faker->randomElement($playlistIds);
                } else {
                    $subjectId = null;
                }
                ActivityLog::create([
                    'user_id' => $user->id,
                    'action' => $action,
                    'subject_type' => $subjectType,
                    'subject_id' => $subjectId,
                    'description' => $faker->optional()->realText(60),
                    'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                ]);
                $total++;
            }
        }
        $this->command?->info("Seeded $total activity_log records.");
    }
}
