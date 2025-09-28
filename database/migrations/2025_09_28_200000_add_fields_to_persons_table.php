<?php
/**
 * Cinexio - Migration to add extra fields to persons table
 *
 * Adds imdb_id, birthdate, deathdate, gender, place_of_birth, photo, known_for, website, popularity, aliases, social_links to persons table.
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
        Schema::table('persons', function (Blueprint $table) {
            $table->string('imdb_id')->unique()->nullable()->after('name')->comment('IMDB ID for the person');
            $table->date('birthdate')->nullable()->after('imdb_id')->comment('Birthdate of the person');
            $table->date('deathdate')->nullable()->after('birthdate')->comment('Deathdate if deceased');
            $table->string('gender')->nullable()->after('deathdate')->comment('Gender of the person');
            $table->string('place_of_birth')->nullable()->after('gender')->comment('Place of birth');
            $table->string('photo')->nullable()->after('place_of_birth')->comment('Photo URL or path');
            $table->string('known_for')->nullable()->after('photo')->comment('Known for (notable works)');
            $table->string('website')->nullable()->after('known_for')->comment('Official/personal website');
            $table->float('popularity')->nullable()->after('website')->comment('Popularity score');
            $table->json('aliases')->nullable()->after('popularity')->comment('Aliases or stage names');
            $table->json('social_links')->nullable()->after('aliases')->comment('Social media links');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('persons', function (Blueprint $table) {
            $table->dropColumn([
                'imdb_id', 'birthdate', 'deathdate', 'gender', 'place_of_birth', 'photo',
                'known_for', 'website', 'popularity', 'aliases', 'social_links'
            ]);
        });
    }
};
