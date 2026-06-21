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
 * Class CreatePersonsTable
 *
 * Migration for creating the 'persons' table to store information about individuals (e.g., directors, actors).
 */
class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'persons' table with fields for person details.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id()->comment('Primary key for the person');
            $table->string('name')->comment('Full name of the person (e.g., Christopher Nolan)');
            $table->integer('birth_year')->nullable()->comment('Year of birth, if known');
            $table->text('bio')->nullable()->comment('Short biography of the person');
            $table->timestamp('created_at')->nullable()->comment('Timestamp for when the person was created');
            $table->timestamp('updated_at')->nullable()->comment('Timestamp for when the person was last updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'persons' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
}
