<?php
/**
 * Cinexio - Seeder for user_settings table
 *
 * Seeds the user_settings table with realistic settings for each user, including flexible JSON settings.
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
use App\Models\UserSetting;
use App\Models\User;
use Faker\Factory as Faker;

class UserSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $languages = ['en', 'fa', 'fr', 'de', 'es', 'it', 'ru', 'zh', 'ja'];
        $themes = ['light', 'dark', 'system'];
        $timezones = ['Asia/Tehran', 'Europe/Paris', 'America/New_York', 'Asia/Tokyo', 'UTC', 'Europe/London'];
        $privacyOptions = ['public', 'private', 'friends_only'];
        $users = User::all();
        $total = 0;
        foreach ($users as $user) {
            UserSetting::create([
                'user_id' => $user->id,
                'language' => $faker->optional(0.8)->randomElement($languages),
                'notifications_enabled' => $faker->boolean(90),
                'theme' => $faker->optional(0.7)->randomElement($themes),
                'settings' => [
                    'timezone' => $faker->optional(0.9)->randomElement($timezones),
                    'privacy' => $faker->optional(0.8)->randomElement($privacyOptions),
                    'email_marketing' => $faker->boolean(60),
                    'auto_play_trailers' => $faker->boolean(70),
                ],
            ]);
            $total++;
        }
        $this->command?->info("Seeded $total user_settings records.");
    }
}
