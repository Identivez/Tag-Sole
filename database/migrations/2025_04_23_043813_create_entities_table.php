<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('entities', function (Blueprint $table) {
        $table->increments('EntityId');
        $table->unsignedInteger('CountryId');
        $table->string('Name', 256);
        $table->integer('Status')->default(1);

        // FK → countries.CountryId
        $table->foreign('CountryId')
              ->references('CountryId')
              ->on('countries')
              ->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::dropIfExists('entities');
}

};
