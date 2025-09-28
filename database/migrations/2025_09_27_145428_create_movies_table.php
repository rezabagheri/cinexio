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
      * Class CreateMoviesTable
      *
      * Migration for creating the 'movies' table to store movie information.
      */
     class CreateMoviesTable extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'movies' table with fields for movie details.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('movies', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the movie');
                 $table->string('title')->comment('The title of the movie');
                 $table->string('original_title')->nullable()->comment('The original title of the movie, if different');
                 $table->text('description')->nullable()->comment('A brief description or synopsis of the movie');
                 $table->decimal('rating', 3, 1)->nullable()->comment('Rating out of 10');
                 $table->string('age_rating')->nullable()->comment('Age rating, e.g., PG-13');
                 $table->json('countries')->nullable()->comment('Countries of production');
                 $table->string('original_language')->nullable()->comment('Original language');
                 $table->integer('year')->comment('Release year');
                 $table->string('imdb_id')->unique()->nullable()->comment('IMDb ID for external reference');
                 $table->string('tmdb_id')->unique()->nullable()->comment('TMDB ID for external reference');
                 $table->string('poster_url')->nullable()->comment('URL to the movie poster image');
                 $table->timestamps();
                 $table->index(['title', 'year']);
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'movies' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('movies');
         }
     }
