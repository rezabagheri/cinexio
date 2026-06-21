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
 * Class CreateAudioTable
 *
 * Migration for creating the 'audio' table to store audio track information for movies and episodes.
 */
class CreateAudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'audio' table with fields for audio track details.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('audio', function (Blueprint $table) {
            $table->id()->comment('Primary key for the audio track');
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
            $table->string('language')->comment('Language of the audio track (e.g., English, French)');
            $table->string('type')->comment('Type of the audio track (e.g., Stereo, 5.1, Dolby Atmos)');
            $table->timestamp('created_at')->nullable()->comment('Timestamp for when the audio track was created');
            $table->timestamp('updated_at')->nullable()->comment('Timestamp for when the audio track was last updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'audio' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('audio');
    }
}
