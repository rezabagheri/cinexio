<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call other seeders here
        $this->call([
            UserSeeder::class,
            DiskSeeder::class,
            GenreSeeder::class,
            TagSeeder::class,
            PersonSeeder::class,
            MovieSeeder::class,
            SeriesSeeder::class,
            ReviewSeeder::class,
            RatingSeeder::class,
            CommentSeeder::class,
            WatchlistSeeder::class,
            FavoriteSeeder::class,
            PlaylistSeeder::class,
            NotificationSeeder::class,
            UserSettingSeeder::class,
            ActivityLogSeeder::class,
            SocialConnectionSeeder::class,
            FriendRequestSeeder::class,
            SharedLinkSeeder::class,
            PaymentTransactionSeeder::class,
            ApiTokenSeeder::class,
        ]);
    }
}
