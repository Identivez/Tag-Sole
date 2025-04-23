<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('provider_details', function (Blueprint $table) {
            $table->increments('ProviderDetailsId');
            $table->unsignedInteger('ProviderId');
            $table->unsignedInteger('ProductId');
            $table->decimal('Price',10,2)->nullable();
            $table->integer('Quantity')->nullable();
            $table->date('SupplyDate')->nullable();

            $table->foreign('ProviderId')
                  ->references('ProviderId')
                  ->on('providers')
                  ->onDelete('cascade');
            $table->foreign('ProductId')
                  ->references('ProductId')
                  ->on('products')
                  ->onDelete('cascade');

            $table->unique(['ProviderId','ProductId'], 'UQ_ProviderDetails');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('provider_details');
    }

};
