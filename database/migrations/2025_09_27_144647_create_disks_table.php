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
      * Class CreateDisksTable
      *
      * Migration for creating the 'disks' table to store information about storage disks.
      */
     class CreateDisksTable extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'disks' table with fields for disk details.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('disks', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the disk');
                 $table->string('name')->comment('Name of the disk, e.g., HDD1, External Drive');
                 $table->text('description')->nullable()->comment('Optional description of the disk, e.g., 1TB Seagate');
                 $table->unsignedBigInteger('capacity')->nullable()->comment('Total capacity of the disk in gigabytes');
                 $table->unsignedBigInteger('free_space')->nullable()->comment('Available free space on the disk in gigabytes');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'disks' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('disks');
         }
     }
