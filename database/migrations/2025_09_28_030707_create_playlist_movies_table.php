<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'playlist_movie' pivot table for connecting playlists and movies.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('playlist_movie', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the pivot record');
                 $table->foreignId('playlist_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the playlists table');
                 $table->foreignId('movie_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the movies table');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'playlist_movie' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('playlist_movie');
         }
     };
