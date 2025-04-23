<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('CategoryId');
            $table->integer('Name');
            $table->text('Description')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }

};
