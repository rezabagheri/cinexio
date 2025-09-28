<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'social_connections' table with fields for user social connections.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('social_connections', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the social connection');
                 $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table');
                 $table->foreignId('friend_id')->constrained('users')->onDelete('cascade')->comment('Foreign key referencing the friend\'s user table');
                 $table->enum('status', ['pending', 'accepted', 'rejected', 'blocked'])->default('pending')->comment('Friendship status');
                 $table->timestamps();
                 $table->unique(['user_id', 'friend_id']);
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'social_connections' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('social_connections');
         }
     };
