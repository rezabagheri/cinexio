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
 * Class CreateSubtitlesTable
 *
 * Migration for creating the 'subtitles' table to store subtitle information for movies and episodes.
 */
class CreateSubtitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'subtitles' table with fields for subtitle details.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('subtitles', function (Blueprint $table) {
            $table->id()->comment('Primary key for the subtitle');
            $table->foreignId('movie_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade')
                  ->comment('Foreign key referencing the movies table, nullable if not for a movie');
            $table->foreignId('episode_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade')
                  ->comment('Foreign key referencing the episodes table, nullable if not for an episode');
            $table->string('language')->comment('Language of the subtitle (e.g., English, Persian)');
            $table->string('file_path')->nullable()->comment('Path to the subtitle file, if stored locally');
            $table->timestamp('created_at')->nullable()->comment('Timestamp for when the subtitle was created');
            $table->timestamp('updated_at')->nullable()->comment('Timestamp for when the subtitle was last updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'subtitles' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('subtitles');
    }
}
