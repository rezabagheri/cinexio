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
 * Class CreateTagsTable
 *
 * Migration for creating the 'tags' table to store custom tags for movies.
 */
class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'tags' table with fields for tag details.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id()->comment('Primary key for the tag');
            $table->string('name')->unique()->comment('Name of the tag (e.g., Classic, Needs Subtitle)');
            $table->text('description')->nullable()->comment('Optional description of the tag');
            $table->timestamp('created_at')->nullable()->comment('Timestamp for when the tag was created');
            $table->timestamp('updated_at')->nullable()->comment('Timestamp for when the tag was last updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'tags' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
}
