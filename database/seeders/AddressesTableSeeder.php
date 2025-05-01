<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('addresses')->insert([
            [
                'UserId' => '015ab7a9-db14-454d-80f1-ad7fcb850606', // Asegúrate de que el UserId exista en la tabla 'users'
                'AddressLine1' => '123 Main St',
                'AddressLine2' => 'Apt 4B',
                'City' => 'New York',
                'State' => 'NY',
                'ZipCode' => '10001',
                'Country' => 'USA',
                'CountryId' => 1, // Asegúrate de que el CountryId 1 exista en la tabla 'countries'
                'MunicipalityId' => 1, // Asegúrate de que el MunicipalityId 1 exista en la tabla 'municipalities'
                'AddressType' => 'Home',
                'IsDefault' => true,
                'CreatedAt' => now(),
                'UpdatedAt' => now(),
                'IsActive' => true,
            ],
            [
                'UserId' => 'a453d9c5-e8cd-45c8-8e7d-d3e231ef0442',
                'AddressLine1' => '456 Oak Ave',
                'AddressLine2' => '',
                'City' => 'Los Angeles',
                'State' => 'CA',
                'ZipCode' => '90001',
                'Country' => 'USA',
                'CountryId' => 1,
                'MunicipalityId' => 2,
                'AddressType' => 'Office',
                'IsDefault' => false,
                'CreatedAt' => now(),
                'UpdatedAt' => now(),
                'IsActive' => true,
            ],
            [
                'UserId' => 'cac7cb01-2c57-44db-ac6a-99d9f88f648f',
                'AddressLine1' => '789 Pine St',
                'AddressLine2' => '',
                'City' => 'Chicago',
                'State' => 'IL',
                'ZipCode' => '60601',
                'Country' => 'USA',
                'CountryId' => 1,
                'MunicipalityId' => 3,
                'AddressType' => 'Work',
                'IsDefault' => false,
                'CreatedAt' => now(),
                'UpdatedAt' => now(),
                'IsActive' => true,
            ],
        ]);
    }
}
