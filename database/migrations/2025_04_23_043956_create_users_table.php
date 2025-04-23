<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('UserId', 450)->primary();
            $table->text('firstName')->nullable();
            $table->text('lastName')->nullable();
            $table->dateTime('createdAt')->nullable();
            $table->string('email', 256)->nullable();
            $table->string('password', 256)->nullable();
            $table->text('phoneNumber')->nullable();
            $table->unsignedInteger('MunicipalityId')->nullable();

            $table->foreign('MunicipalityId')
                  ->references('MunId')
                  ->on('municipalities')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }

};
