<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->string('RoleId', 191);
            $table->string('UserId', 191);
            $table->primary(['UserId','RoleId']);

            $table->foreign('RoleId')
                  ->references('RoleId')
                  ->on('roles')
                  ->onDelete('cascade');

            $table->foreign('UserId')
                  ->references('UserId')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }

};
