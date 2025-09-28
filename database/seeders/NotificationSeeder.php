<?php
/**
 * Cinexio - Seeder for notifications table
 *
 * Seeds the notifications table with realistic notifications for users.
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
use App\Models\Notification;
use App\Models\User;
use Faker\Factory as Faker;

class NotificationSeeder extends Seeder
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
        $types = ['new_comment', 'reminder', 'friend_request', 'review_reply', 'system'];
        $total = 0;
        foreach ($userIds as $userId) {
            $numNotifications = $faker->numberBetween(3, 10);
            for ($i = 0; $i < $numNotifications; $i++) {
                Notification::create([
                    'user_id' => $userId,
                    'type' => $faker->randomElement($types),
                    'message' => $faker->realText($faker->numberBetween(30, 120)),
                    'is_read' => $faker->boolean(40), // 40% read
                ]);
                $total++;
            }
        }
        $this->command?->info("Seeded $total notifications.");
    }
}
