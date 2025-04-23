<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('ProviderId');
            $table->integer('Name')->nullable();
            $table->string('ContactEmail', 256)->nullable();
            $table->integer('ContactPhone')->nullable();
            $table->text('Address')->nullable();
            $table->string('ContactName', 256)->nullable();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }

};
