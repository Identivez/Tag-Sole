<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('OrderId');
            $table->string('UserId', 450);
            $table->dateTime('OrderDate')->nullable();
            $table->decimal('TotalAmount', 10, 2)->nullable();
            $table->string('OrderStatus', 20)->nullable();
            $table->unsignedInteger('PaymentId')->nullable();
            $table->string('ShippingMethod', 50)->nullable();
            $table->decimal('ShippingCost', 10, 2)->nullable();
            $table->unsignedInteger('ShippingAddressId')->nullable();
            $table->unsignedInteger('BillingAddressId')->nullable();
            $table->dateTime('CreatedAt')->nullable();
            $table->dateTime('UpdatedAt')->nullable();

            $table->foreign('UserId')
                  ->references('UserId')
                  ->on('users')
                  ->onDelete('cascade');



            $table->foreign('ShippingAddressId')
                  ->references('AddressId')
                  ->on('addresses')
                  ->onDelete('set null');

            $table->foreign('BillingAddressId')
                  ->references('AddressId')
                  ->on('addresses')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }

};
