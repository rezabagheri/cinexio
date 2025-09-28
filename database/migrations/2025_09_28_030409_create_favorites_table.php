<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'favorites' table with fields for user favorites.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('favorites', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the favorite item');
                 $table->foreignId('movie_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the movies table');
                 $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'favorites' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('favorites');
         }
     };
