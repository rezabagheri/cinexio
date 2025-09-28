<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'comments' table with fields for user comments.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('comments', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the comment');
                 $table->foreignId('movie_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the movies table');
                 $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table');
                 $table->text('content')->comment('Comment text written by the user');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'comments' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('comments');
         }
     };
