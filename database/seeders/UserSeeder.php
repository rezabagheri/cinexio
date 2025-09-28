<?php
/**
 * Cinexio - Seeder for users table
 *
 * Seeds the users table with 100 sample users for development/testing.
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

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $domains = ['gmail.com', 'yahoo.com', 'outlook.com', 'hotmail.com', 'mail.com', 'aol.com', 'protonmail.com', 'icloud.com'];
        for ($i = 1; $i <= 100; $i++) {
            $domain = $faker->randomElement($domains);
            $username = $faker->unique()->userName;
            $email = $username . '@' . $domain;
            User::create([
                'name' => $faker->name,
                'username' => $username,
                'email' => $email,
                'bio' => $faker->optional()->sentence(10),
                'avatar' => $faker->optional()->imageUrl(200, 200, 'people'),
                'location' => $faker->optional()->city . ', ' . $faker->optional()->country,
                'last_login_at' => $faker->optional()->dateTimeBetween('-1 year', 'now'),
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
