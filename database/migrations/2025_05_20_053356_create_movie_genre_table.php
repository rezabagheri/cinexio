<?php

/**
 * Cinexio - A personal movie and series archive management system with social networking features.
 *
 * This file is part of the Cinexio project, a free software for managing and sharing movie archives.
 *
 * @package Cinexio
 * @author Reza Bagheri <rezabagheri@gmail.com>
 * @copyright 2025 Reza Bagheri
 * @license MIT License
 * @version 1.0.0
 * @link https://github.com/rezabagheri/cinexio
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateMovieGenreTable
 *
 * Migration for creating the 'movie_genre' pivot table to associate movies with genres.
 */
class CreateMovieGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'movie_genre' table with foreign keys for movies and genres.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('movie_genre', function (Blueprint $table) {
            $table->id()->comment('Primary key for the pivot record');
            $table->foreignId('movie_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->comment('Foreign key referencing the movies table');
            $table->foreignId('genre_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->comment('Foreign key referencing the genres table');
            $table->timestamp('created_at')->nullable()->comment('Timestamp for when the association was created');
            $table->timestamp('updated_at')->nullable()->comment('Timestamp for when the association was last updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'movie_genre' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_genre');
    }
}
