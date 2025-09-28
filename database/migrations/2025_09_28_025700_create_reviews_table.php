<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'reviews' table with fields for user reviews.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('reviews', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the review');
                 $table->foreignId('movie_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the movies table');
                 $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table');
                 $table->text('content')->comment('Review text written by the user');
                 $table->decimal('rating', 3, 1)->nullable()->comment('User rating out of 10');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'reviews' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('reviews');
         }
     };
