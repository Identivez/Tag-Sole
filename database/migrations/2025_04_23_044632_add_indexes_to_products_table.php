<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->index('CategoryId', 'IX_Product_CategoryId');
            $table->index('ProviderId', 'IX_Product_ProviderId');
        });
    }
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['CategoryId']);  // Eliminar la clave foránea antes de eliminar el índice
            $table->dropIndex('IX_Product_CategoryId');  // Ahora eliminar el índice
        });

    }

};
