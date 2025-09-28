<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'friend_requests' table with fields for user friend requests.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('friend_requests', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the friend request');
                 $table->foreignId('sender_id')->constrained('users')->onDelete('cascade')->comment('Foreign key referencing the sender\'s user table');
                 $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade')->comment('Foreign key referencing the receiver\'s user table');
                 $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending')->comment('Status of the friend request');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'friend_requests' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('friend_requests');
         }
     };
