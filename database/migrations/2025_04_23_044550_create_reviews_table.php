<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('ReviewId');
            $table->unsignedInteger('ProductId');
            $table->string('UserId',450);
            $table->integer('Rating')->nullable();
            $table->text('Comment')->nullable();
            $table->dateTime('ReviewDate')->nullable();

            $table->foreign('ProductId')
                  ->references('ProductId')
                  ->on('products')
                  ->onDelete('cascade');
            $table->foreign('UserId')
                  ->references('UserId')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }

};
