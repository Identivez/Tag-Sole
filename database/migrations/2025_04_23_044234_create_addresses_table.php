<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('AddressId');
            $table->string('UserId',450);
            $table->text('AddressLine1');
            $table->text('AddressLine2')->nullable();
            $table->text('City');
            $table->text('State');
            $table->integer('ZipCode')->nullable();
            $table->text('Country');
            $table->unsignedInteger('CountryId')->nullable();
            $table->unsignedInteger('MunicipalityId')->nullable();
            $table->string('AddressType',50);
            $table->boolean('IsDefault')->default(false);
            $table->timestamp('CreatedAt')->useCurrent();
            $table->dateTime('UpdatedAt')->nullable();
            $table->boolean('IsActive')->default(true);

            $table->foreign('UserId')
                  ->references('UserId')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('CountryId')
                  ->references('CountryId')
                  ->on('countries')
                  ->onDelete('set null');
            $table->foreign('MunicipalityId')
                  ->references('MunId')
                  ->on('municipalities')
                  ->onDelete('set null');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }

};
