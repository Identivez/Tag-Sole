<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->increments('MunId');
            $table->unsignedInteger('EntityId');
            $table->string('Name', 256);
            $table->integer('Status')->default(1);

            $table->foreign('EntityId')
                  ->references('EntityId')
                  ->on('entities')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('municipalities');
    }

};
