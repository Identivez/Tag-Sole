<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('CartId');
            $table->string('UserId',450);
            $table->unsignedInteger('ProductId');
            $table->integer('Quantity')->default(1);
            $table->decimal('Price',10,2);
            $table->decimal('Total',10,2)->nullable();

            $table->foreign('UserId')
                  ->references('UserId')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('ProductId')
                  ->references('ProductId')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }

};
