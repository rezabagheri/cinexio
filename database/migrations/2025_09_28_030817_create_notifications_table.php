<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'notifications' table with fields for user notifications.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('notifications', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the notification');
                 $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table');
                 $table->string('type')->comment('Type of notification, e.g., new_comment, reminder');
                 $table->text('message')->comment('Notification message');
                 $table->boolean('is_read')->default(false)->comment('Whether the notification has been read');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'notifications' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('notifications');
         }
     };
