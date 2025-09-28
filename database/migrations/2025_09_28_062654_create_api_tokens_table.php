<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'api_tokens' table with fields for user API tokens.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('api_tokens', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the API token');
                 $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table');
                 $table->string('token')->unique()->comment('Unique API token');
                 $table->string('name')->nullable()->comment('Name or purpose of the token');
                 $table->enum('type', ['read', 'write', 'admin'])->default('read')->comment('Type or level of the token');
                 $table->json('scopes')->nullable()->comment('Array of allowed scopes for the token');
                 $table->string('message')->nullable()->comment('Optional message for the token');
                 $table->string('allowed_ips')->nullable()->comment('Comma-separated list of allowed IPs');
                 $table->timestamp('expires_at')->nullable()->comment('Expiration time of the token');
                 $table->boolean('revoked')->default(false)->comment('Whether the token is revoked');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'api_tokens' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('api_tokens');
         }
     };
