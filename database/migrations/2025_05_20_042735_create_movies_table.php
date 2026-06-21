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
 * Class CreateMoviesTable
 *
 * Migration for creating the 'movies' table to store movie information.
 */
class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'movies' table with fields for movie details.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id()->comment('Primary key for the movie');
            $table->string('title')->comment('The title of the movie');
            $table->string('original_title')->nullable()->comment('The original title of the movie, if different');
            $table->integer('release_year')->nullable()->comment('The year the movie was released');
            $table->text('description')->nullable()->comment('A brief description or synopsis of the movie');
            $table->timestamp('created_at')->nullable()->comment('Timestamp for when the movie was created');
            $table->timestamp('updated_at')->nullable()->comment('Timestamp for when the movie was last updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'movies' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
}
