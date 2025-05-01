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
            $table->string('Name', 255);  // Cambiado a 'string' para nombre de la categoría
            $table->text('Description')->nullable();  // Descripción opcional
            $table->timestamps();  // Agregar timestamps para 'created_at' y 'updated_at'
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
