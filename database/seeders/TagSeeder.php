<?php
/**
 * Cinexio - Seeder for tags table
 *
 * Seeds the tags table with a set of standard and useful tags for movies and series.
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
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['name' => 'Classic', 'description' => 'A classic film or series.'],
            ['name' => 'Cult', 'description' => 'Cult favorite with a dedicated fanbase.'],
            ['name' => 'Award-Winning', 'description' => 'Winner of major film or TV awards.'],
            ['name' => 'Family', 'description' => 'Suitable for family viewing.'],
            ['name' => 'Based on True Story', 'description' => 'Inspired by real events.'],
            ['name' => 'Foreign', 'description' => 'Non-English language production.'],
            ['name' => 'Indie', 'description' => 'Independent production.'],
            ['name' => 'Blockbuster', 'description' => 'Major commercial success.'],
            ['name' => 'Short Film', 'description' => 'Short format film.'],
            ['name' => 'Mini-Series', 'description' => 'Limited series with a set number of episodes.'],
            ['name' => 'Documentary', 'description' => 'Non-fiction, documentary style.'],
            ['name' => 'Animated', 'description' => 'Animated film or series.'],
            ['name' => 'Needs Subtitle', 'description' => 'Subtitle required for full understanding.'],
            ['name' => 'Remake', 'description' => 'Remake of an earlier work.'],
            ['name' => 'Sequel', 'description' => 'Follow-up to a previous film or series.'],
            ['name' => 'Prequel', 'description' => 'Story set before the original work.'],
            ['name' => 'Spin-off', 'description' => 'Derived from another work.'],
            ['name' => 'Holiday', 'description' => 'Holiday-themed content.'],
            ['name' => 'Musical', 'description' => 'Musical genre.'],
            ['name' => 'Silent', 'description' => 'Silent film.'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
