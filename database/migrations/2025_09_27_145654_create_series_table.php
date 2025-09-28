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
      * Class CreateSeriesTable
      *
      * Migration for creating the 'series' table to store series information.
      */
     class CreateSeriesTable extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'series' table with fields for series details.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('series', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the series');
                 $table->string('title')->comment('The title of the series');
                 $table->string('original_title')->nullable()->comment('The original title of the series, if different');
                 $table->text('description')->nullable()->comment('A brief description or synopsis of the series');
                 $table->integer('start_year')->nullable()->comment('The year the series started');
                 $table->integer('end_year')->nullable()->comment('The year the series ended, if applicable');
                 $table->decimal('rating', 3, 1)->nullable()->comment('Rating out of 10');
                 $table->string('age_rating')->nullable()->comment('Age rating, e.g., TV-14');
                 $table->json('countries')->nullable()->comment('Countries of production');
                 $table->string('original_language')->nullable()->comment('Original language');
                 $table->string('imdb_id')->unique()->nullable()->comment('IMDb ID for external reference');
                 $table->string('tmdb_id')->unique()->nullable()->comment('TMDB ID for external reference');
                 $table->string('poster_url')->nullable()->comment('URL to the series poster image');
                 $table->timestamps();
                 $table->index(['title', 'start_year']);
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'series' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('series');
         }
     }
