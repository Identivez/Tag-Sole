<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('favorites')->insert([
            [
                'UserId' => 'f635b41f-c859-4ec6-8bc6-755c17aa1c13', // Asegúrate de que el UserId 1234567890 exista en la tabla 'users'
                'ProductId' => 1, // Asegúrate de que el ProductId 1 exista en la tabla 'products'
                'AddedAt' => now(),
            ],
            [
                'UserId' => 'ee9b141a-d7ab-4289-b639-8e59dff5023e',
                'ProductId' => 2, // Asegúrate de que el ProductId 2 exista en la tabla 'products'
                'AddedAt' => now(),
            ],
            [
                'UserId' => 'cac7cb01-2c57-44db-ac6a-99d9f88f648f',
                'ProductId' => 3, // Asegúrate de que el ProductId 3 exista en la tabla 'products'
                'AddedAt' => now(),
            ],
            [
                'UserId' => 'a453d9c5-e8cd-45c8-8e7d-d3e231ef0442',
                'ProductId' => 4, // Asegúrate de que el ProductId 4 exista en la tabla 'products'
                'AddedAt' => now(),
            ],
            [
                'UserId' => '015ab7a9-db14-454d-80f1-ad7fcb850606',
                'ProductId' => 5, // Asegúrate de que el ProductId 5 exista en la tabla 'products'
                'AddedAt' => now(),
            ],
        ]);
    }
}
