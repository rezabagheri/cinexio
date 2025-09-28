<?php
/**
 * Cinexio - Seeder for genres table
 *
 * Seeds the genres table with standard IMDB genres (in English).
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
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Action', 'Adventure', 'Animation', 'Biography', 'Comedy', 'Crime', 'Documentary',
            'Drama', 'Family', 'Fantasy', 'Film-Noir', 'Game-Show', 'History', 'Horror',
            'Music', 'Musical', 'Mystery', 'News', 'Reality-TV', 'Romance', 'Sci-Fi',
            'Short', 'Sport', 'Talk-Show', 'Thriller', 'War', 'Western'
        ];

        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre,
                'description' => null,
            ]);
        }
    }
}
