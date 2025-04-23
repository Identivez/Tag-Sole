<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('ProductId');
            $table->string('Name', 100);
            $table->string('Brand', 100)->nullable();
            $table->decimal('Price',10,2);
            $table->text('Description')->nullable();
            $table->dateTime('CreatedAt')->nullable();
            $table->integer('Quantity')->nullable();
            $table->dateTime('LastUpdate')->nullable();
            $table->integer('Stock')->nullable();
            $table->unsignedInteger('ProviderId')->nullable();
            $table->unsignedInteger('CategoryId')->nullable();

            $table->foreign('ProviderId')
                  ->references('ProviderId')
                  ->on('providers')
                  ->onDelete('set null');
            $table->foreign('CategoryId')
                  ->references('CategoryId')
                  ->on('categories')
                  ->onDelete('set null');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }

};
