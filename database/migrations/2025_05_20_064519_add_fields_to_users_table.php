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
 * Class AddFieldsToUsersTable
 *
 * Migration to add additional fields to the 'users' table for social features.
 */
class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Adds fields to support user profiles and social networking.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('name')->comment('Unique username for user profile');
            $table->text('bio')->nullable()->after('username')->comment('Short biography of the user');
            $table->string('avatar')->nullable()->after('bio')->comment('Path to the user avatar image');
            $table->string('location')->nullable()->after('avatar')->comment('User location, e.g., city or country');
            $table->timestamp('last_login_at')->nullable()->after('location')->comment('Timestamp of the user last login');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drops the added fields from the 'users' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'bio', 'avatar', 'location', 'last_login_at']);
        });
    }
}
