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
 * Class AddCapacityAndFreeSpaceToDisksTable
 *
 * Migration to add capacity and free_space columns to the 'disks' table.
 */
class AddCapacityAndFreeSpaceToDisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Adds capacity and free_space columns to track disk storage details.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('disks', function (Blueprint $table) {
            $table->unsignedBigInteger('capacity')->nullable()->after('description')->comment('Total capacity of the disk in gigabytes');
            $table->unsignedBigInteger('free_space')->nullable()->after('capacity')->comment('Available free space on the disk in gigabytes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Removes the capacity and free_space columns from the 'disks' table.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('disks', function (Blueprint $table) {
            $table->dropColumn(['capacity', 'free_space']);
        });
    }
}
