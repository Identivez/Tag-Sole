<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->string('RoleId', 450)->primary();
            $table->string('Name', 256)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }

};
