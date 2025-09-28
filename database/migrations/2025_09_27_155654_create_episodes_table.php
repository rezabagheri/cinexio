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
      * Class CreateEpisodesTable
      *
      * Migration for creating the 'episodes' table to store episode information for seasons.
      */
     class CreateEpisodesTable extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'episodes' table with fields for episode details.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('episodes', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the episode');
                 $table->foreignId('season_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the seasons table');
                 $table->integer('episode_number')->comment('The episode number, e.g., 1, 2');
                 $table->string('title')->nullable()->comment('The title of the episode');
                 $table->integer('duration')->nullable()->comment('Duration of the episode in minutes');
                 $table->foreignId('disk_id')->nullable()->constrained()->onDelete('set null')->comment('Foreign key referencing the disks table, nullable if not stored on a disk');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'episodes' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('episodes');
         }
     }
