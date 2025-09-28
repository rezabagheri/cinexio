<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'watchlist' table with fields for user watchlist items.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('watchlist', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the watchlist item');
                 $table->foreignId('movie_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the movies table');
                 $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table');
                 $table->timestamp('planned_at')->nullable()->comment('Planned time to watch the movie');
                 $table->boolean('watched')->default(false)->comment('Whether the movie has been watched');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'watchlist' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('watchlist');
         }
     };
