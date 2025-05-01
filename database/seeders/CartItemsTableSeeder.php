<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cart_items')->insert([
            [
                'UserId' => '015ab7a9-db14-454d-80f1-ad7fcb850606', // Asegúrate de que el UserId 1234567890 exista en la tabla 'users'
                'ProductId' => 1, // Asegúrate de que el ProductId 1 exista en la tabla 'products'
                'Quantity' => 2,
                'Price' => 120.00,
                'Total' => 240.00,
            ],
            [
                'UserId' => 'a453d9c5-e8cd-45c8-8e7d-d3e231ef0442',
                'ProductId' => 2, // Asegúrate de que el ProductId 2 exista en la tabla 'products'
                'Quantity' => 1,
                'Price' => 150.00,
                'Total' => 150.00,
            ],
            [
                'UserId' => 'cac7cb01-2c57-44db-ac6a-99d9f88f648f',
                'ProductId' => 3, // Asegúrate de que el ProductId 3 exista en la tabla 'products'
                'Quantity' => 3,
                'Price' => 90.00,
                'Total' => 270.00,
            ],
            [
                'UserId' => 'ee9b141a-d7ab-4289-b639-8e59dff5023e',
                'ProductId' => 4, // Asegúrate de que el ProductId 4 exista en la tabla 'products'
                'Quantity' => 1,
                'Price' => 80.00,
                'Total' => 80.00,
            ],
            [
                'UserId' => 'f635b41f-c859-4ec6-8bc6-755c17aa1c13',
                'ProductId' => 5, // Asegúrate de que el ProductId 5 exista en la tabla 'products'
                'Quantity' => 5,
                'Price' => 50.00,
                'Total' => 250.00,
            ],
        ]);
    }
}
