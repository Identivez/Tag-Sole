<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('FavoriteId');
            $table->string('UserId',450);
            $table->unsignedInteger('ProductId');
            $table->dateTime('AddedAt')->nullable();

            $table->foreign('UserId')
                  ->references('UserId')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('ProductId')
                  ->references('ProductId')
                  ->on('products')
                  ->onDelete('cascade');

            $table->unique(['UserId','ProductId'], 'UQ_Favorites_UserProduct');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }

};
