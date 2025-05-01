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
            $table->string('Name', 255)->nullable();  // Cambiado a string para el nombre del proveedor
            $table->string('ContactEmail', 256)->nullable();
            $table->string('ContactPhone', 20)->nullable();  // Cambiado a string para el teléfono (para poder manejar prefijos)
            $table->text('Address')->nullable();
            $table->string('ContactName', 256)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
