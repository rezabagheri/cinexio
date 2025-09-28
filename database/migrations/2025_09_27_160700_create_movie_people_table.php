<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'movie_person' table with foreign keys for movies and persons, including role information.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('movie_person', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the pivot record');
                 $table->foreignId('movie_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the movies table');
                 $table->foreignId('person_id')->constrained('persons')->onDelete('cascade')->comment('Foreign key referencing the persons table');
                 $table->string('role')->nullable()->comment('Role of the person, e.g., Director, Actor');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'movie_person' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('movie_person');
         }
     };
