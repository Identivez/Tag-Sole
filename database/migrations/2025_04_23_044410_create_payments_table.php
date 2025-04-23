<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('PaymentId');
            $table->unsignedInteger('OrderId');
            $table->string('UserId',450);
            $table->string('PaymentMethod',50)->nullable();
            $table->decimal('Amount',10,2)->nullable();
            $table->string('PaymentStatus',20)->nullable();
            $table->dateTime('TransactionDate')->nullable();
            $table->string('PaymentProvider',50)->nullable();

            $table->foreign('OrderId')
                  ->references('OrderId')
                  ->on('orders')
                  ->onDelete('cascade');
            $table->foreign('UserId')
                  ->references('UserId')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }

};
