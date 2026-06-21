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
 * Class CreateGenresTable
 *
 * Migration for creating the 'genres' table to store movie genres.
 */
class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'genres' table with fields for genre details.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id()->comment('Primary key for the genre');
            $table->string('name')->unique()->comment('Name of the genre (e.g., Drama, Comedy)');
            $table->text('description')->nullable()->comment('Optional description of the genre');
            $table->timestamp('created_at')->nullable()->comment('Timestamp for when the genre was created');
            $table->timestamp('updated_at')->nullable()->comment('Timestamp for when the genre was last updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'genres' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('genres');
    }
}
