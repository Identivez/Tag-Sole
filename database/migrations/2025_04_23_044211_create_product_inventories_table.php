<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_inventories', function (Blueprint $table) {
            $table->increments('InventoryId');
            $table->unsignedInteger('ProductId');
            $table->unsignedInteger('SizeId');
            $table->integer('Quantity')->default(0);
            $table->decimal('Price',10,2)->nullable();
            $table->string('SKU',50)->nullable();
            $table->string('Condition',20)->default('New');
            $table->boolean('InStock')->default(true);
            $table->integer('ReorderLevel')->default(5);
            $table->timestamp('LastUpdated')->useCurrent();

            $table->foreign('ProductId')
                  ->references('ProductId')
                  ->on('products')
                  ->onDelete('cascade');
            $table->foreign('SizeId')
                  ->references('SizeId')
                  ->on('sizes')
                  ->onDelete('cascade');

            $table->unique(['ProductId','SizeId'], 'UQ_ProductSize');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('product_inventories');
    }

};
