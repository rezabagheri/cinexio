<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         /**
          * Run the migrations.
          *
          * Creates the 'payment_transactions' table with fields for payment records.
          *
          * @return void
          */
         public function up(): void
         {
             Schema::create('payment_transactions', function (Blueprint $table) {
                 $table->id()->comment('Primary key for the payment transaction');
                 $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Foreign key referencing the users table');
                 $table->decimal('amount', 8, 2)->comment('Transaction amount in currency');
                 $table->string('currency')->default('USD')->comment('Currency of the transaction');
                 $table->string('payment_method')->comment('Payment method, e.g., credit_card, paypal');
                 $table->string('transaction_id')->unique()->comment('Unique transaction ID from payment gateway');
                 $table->enum('status', ['pending', 'completed', 'failed'])->default('pending')->comment('Status of the transaction');
                 $table->timestamps();
             });
         }

         /**
          * Reverse the migrations.
          *
          * Drops the 'payment_transactions' table.
          *
          * @return void
          */
         public function down(): void
         {
             Schema::dropIfExists('payment_transactions');
         }
     };
