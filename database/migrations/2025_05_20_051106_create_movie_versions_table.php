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
 * Class CreateMovieVersionsTable
 *
 * Migration for creating the 'movie_versions' table to store different versions of movies.
 */
class CreateMovieVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'movie_versions' table with fields for movie version details.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('movie_versions', function (Blueprint $table) {
            $table->id()->comment('Primary key for the movie version');
            $table->foreignId('movie_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->comment('Foreign key referencing the movies table');
            $table->string('version_type')->nullable()->comment('Type of the movie version (e.g., BluRay, DVD, Digital)');
            $table->string('quality')->nullable()->comment('Quality of the version (e.g., 1080p, 720p)');
            $table->integer('duration')->nullable()->comment('Duration of the version in minutes');
            $table->foreignId('disk_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('set null')
                  ->comment('Foreign key referencing the disks table, nullable if not stored on a disk');
            $table->timestamp('created_at')->nullable()->comment('Timestamp for when the version was created');
            $table->timestamp('updated_at')->nullable()->comment('Timestamp for when the version was last updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'movie_versions' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_versions');
    }
}
