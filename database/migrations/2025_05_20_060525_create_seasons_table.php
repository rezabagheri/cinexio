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
 * Class CreateSeasonsTable
 *
 * Migration for creating the 'seasons' table to store season information for series.
 */
class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'seasons' table with fields for season details.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id()->comment('Primary key for the season');
            $table->foreignId('series_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->comment('Foreign key referencing the series table');
            $table->integer('season_number')->comment('The season number (e.g., 1, 2)');
            $table->text('description')->nullable()->comment('A brief description of the season');
            $table->timestamp('created_at')->nullable()->comment('Timestamp for when the season was created');
            $table->timestamp('updated_at')->nullable()->comment('Timestamp for when the season was last updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'seasons' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
}
