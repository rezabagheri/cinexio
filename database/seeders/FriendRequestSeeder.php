<?php
/**
 * Cinexio - Seeder for friend_requests table
 *
 * Seeds the friend_requests table with realistic friend requests between users, using enum and message.
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
use App\Models\FriendRequest;
use App\Models\User;
use App\Enums\FriendRequestStatus;
use Faker\Factory as Faker;

class FriendRequestSeeder extends Seeder
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
            FriendRequestStatus::Pending,
            FriendRequestStatus::Accepted,
            FriendRequestStatus::Rejected,
        ];
        $total = 0;
        foreach ($userIds as $senderId) {
            $receivers = $faker->randomElements(array_diff($userIds, [$senderId]), $faker->numberBetween(3, 10));
            foreach ($receivers as $receiverId) {
                if (FriendRequest::where('sender_id', $senderId)->where('receiver_id', $receiverId)->exists()) {
                    continue;
                }
                FriendRequest::create([
                    'sender_id' => $senderId,
                    'receiver_id' => $receiverId,
                    'status' => $faker->randomElement($statuses),
                    'message' => $faker->optional()->realText(40),
                ]);
                $total++;
            }
        }
        $this->command?->info("Seeded $total friend_requests records.");
    }
}
