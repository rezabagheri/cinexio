<?php
/**
 * Cinexio - Migration to add extra fields to movies table
 *
 * Adds imdb_id, tmdb_id, original_title, release_date, runtime, poster_url, backdrop_url, trailer_url, language, countries, age_rating, budget, revenue, rating, votes, status to movies table.
 *
 * @package    Cinexio
 * @author     Reza Bagheri <rezabagheri@gmail.com>
 * @copyright  2025 Reza Bagheri
 * @license    MIT License
 * @version    1.0.0
 * @link       https://github.com/rezabagheri/cinexio
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->date('release_date')->nullable()->after('year')->comment('Exact release date');
            $table->integer('runtime')->nullable()->after('release_date')->comment('Duration in minutes');
            $table->string('backdrop_url')->nullable()->after('poster_url')->comment('Backdrop image URL');
            $table->string('trailer_url')->nullable()->after('backdrop_url')->comment('Trailer video URL');
            $table->bigInteger('budget')->nullable()->after('age_rating')->comment('Production budget');
            $table->bigInteger('revenue')->nullable()->after('budget')->comment('Box office revenue');
            $table->integer('votes')->nullable()->after('rating')->comment('Number of votes');
            $table->string('status')->nullable()->after('votes')->comment('Release status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn([
                'release_date', 'runtime', 'backdrop_url', 'trailer_url', 'budget', 'revenue', 'votes', 'status'
            ]);
        });
    }
};
