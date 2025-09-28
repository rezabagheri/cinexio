<?php
/**
 * Cinexio - Seeder for api_tokens table
 *
 * Seeds the api_tokens table with realistic API tokens for users, including type, scopes, message, allowed_ips, etc.
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
use App\Models\ApiToken;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ApiTokenSeeder extends Seeder
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
        $types = ['read', 'write', 'admin'];
        $scopesList = [
            ['movies:read'],
            ['movies:read', 'movies:write'],
            ['users:read', 'users:write'],
            ['admin:all'],
            ['movies:read', 'users:read'],
        ];
        $total = 0;
        foreach ($userIds as $userId) {
            $numTokens = $faker->numberBetween(1, 4);
            for ($i = 0; $i < $numTokens; $i++) {
                ApiToken::create([
                    'user_id' => $userId,
                    'token' => hash('sha256', Str::random(32)),
                    'name' => $faker->optional()->words($faker->numberBetween(1, 3), true),
                    'type' => $faker->randomElement($types),
                    'scopes' => $faker->randomElement($scopesList),
                    'message' => $faker->optional()->realText(40),
                    'allowed_ips' => $faker->optional()->ipv4 . ($faker->boolean(30) ? ',' . $faker->ipv4 : ''),
                    'expires_at' => $faker->optional(0.7)->dateTimeBetween('now', '+1 year'),
                    'revoked' => $faker->boolean(10),
                ]);
                $total++;
            }
        }
        $this->command?->info("Seeded $total api_tokens records.");
    }
}
