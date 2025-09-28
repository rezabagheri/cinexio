<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'ratings' table with fields for user ratings.
          *
          * @return void
          */
         public function up(): void
         {
            Schema::create('ratings', function (Blueprint $table) {
                $table->id()->comment('Primary key for the rating');
                $table->foreignId('movie_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the movies table');
                $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table');
                $table->decimal('value', 3, 1)->comment('Rating value out of 10');
                $table->enum('status', ['approved', 'pending', 'rejected'])->default('approved')->comment('Rating status for moderation');
                $table->timestamps();
                $table->unique(['movie_id', 'user_id']);
            });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'ratings' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('ratings');
         }
     };
