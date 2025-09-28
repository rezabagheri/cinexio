<?php
/**
 * Cinexio - Seeder for social_connections table
 *
 * Seeds the social_connections table with realistic friendship states between users.
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
use App\Models\SocialConnection;
use App\Models\User;
use App\Enums\SocialConnectionStatus;
use Faker\Factory as Faker;

class SocialConnectionSeeder extends Seeder
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
        $statuses = [
            SocialConnectionStatus::Pending,
            SocialConnectionStatus::Accepted,
            SocialConnectionStatus::Rejected,
            SocialConnectionStatus::Blocked,
        ];
        $total = 0;
        foreach ($userIds as $userId) {
            // Each user sends 5-15 friend requests to other users
            $friends = $faker->randomElements(array_diff($userIds, [$userId]), $faker->numberBetween(5, 15));
            foreach ($friends as $friendId) {
                // Avoid duplicate (user, friend) pairs
                if (SocialConnection::where('user_id', $userId)->where('friend_id', $friendId)->exists()) {
                    continue;
                }
                SocialConnection::create([
                    'user_id' => $userId,
                    'friend_id' => $friendId,
                    'status' => $faker->randomElement($statuses),
                ]);
                $total++;
            }
        }
        $this->command?->info("Seeded $total social_connections records.");
    }
}
