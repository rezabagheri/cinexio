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
 * Class CreateWishlistsTable
 *
 * Migration for creating the 'wishlists' table to store user movie and series wishlists.
 */
class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the 'wishlists' table with fields for user wishlists.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id()->comment('Primary key for the wishlist entry');
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->comment('Foreign key referencing the users table');
            $table->foreignId('movie_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade')
                  ->comment('Foreign key referencing the movies table, nullable if not a movie');
            $table->foreignId('series_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade')
                  ->comment('Foreign key referencing the series table, nullable if not a series');
            $table->timestamp('created_at')->nullable()->comment('Timestamp for when the wishlist entry was created');
            $table->timestamp('updated_at')->nullable()->comment('Timestamp for when the wishlist entry was last updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the 'wishlists' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
}
