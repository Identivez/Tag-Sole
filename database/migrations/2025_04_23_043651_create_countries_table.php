<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('CountryId');
            $table->string('Name', 255);
            $table->string('Key', 5);
            $table->integer('Status')->default(1);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }

};
