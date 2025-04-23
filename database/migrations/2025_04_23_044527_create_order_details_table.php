<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('order_details', function (Blueprint $table) {
        $table->unsignedInteger('OrderId');
        $table->unsignedInteger('ProductId');
        $table->integer('Quantity');
        $table->decimal('UnitPrice',10,2)->nullable();
        $table->unsignedInteger('CouponId')->nullable(); // si aplica

        $table->primary(['OrderId','ProductId']);

        $table->foreign('OrderId')
              ->references('OrderId')
              ->on('orders')
              ->onDelete('cascade');
        $table->foreign('ProductId')
              ->references('ProductId')
              ->on('products')
              ->onDelete('cascade');
    });
}
public function down(): void
{
    Schema::dropIfExists('order_details');
}

};
