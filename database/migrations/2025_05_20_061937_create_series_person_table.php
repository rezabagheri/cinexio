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
 * Class CreateSeriesPersonTable
 *
 * Migration for creating the 'series_person' pivot table to associate series with individuals.
 */
class CreateSeriesPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'series_person' table with foreign keys and role field.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('series_person', function (Blueprint $table) {
            $table->id()->comment('Primary key for the pivot record');
            $table->foreignId('series_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->comment('Foreign key referencing the series table');
            $table->foreignId('person_id')
                  ->constrained('persons')
                  ->onDelete('cascade')
                  ->comment('Foreign key referencing the persons table');
            $table->string('role')->comment('Role of the person in the series (e.g., Director, Actor)');
            $table->timestamp('created_at')->nullable()->comment('Timestamp for when the association was created');
            $table->timestamp('updated_at')->nullable()->comment('Timestamp for when the association was last updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'series_person' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('series_person');
    }
}
