<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'Name' => 'Nike Air Max 90',
                'Brand' => 'Nike',
                'Price' => 120.00,
                'Description' => 'Zapatillas deportivas cómodas y resistentes.',
                'CreatedAt' => now(),
                'Quantity' => 100,
                'LastUpdate' => now(),
                'Stock' => 50,
                'ProviderId' => 1, // Asegúrate de que el ProviderId 1 exista en la tabla providers
                'CategoryId' => 1, // Asegúrate de que el CategoryId 1 exista en la tabla categories
            ],
            [
                'Name' => 'Adidas Ultraboost 21',
                'Brand' => 'Adidas',
                'Price' => 180.00,
                'Description' => 'Zapatillas de running de alto rendimiento.',
                'CreatedAt' => now(),
                'Quantity' => 200,
                'LastUpdate' => now(),
                'Stock' => 150,
                'ProviderId' => 2, // Asegúrate de que el ProviderId 2 exista en la tabla providers
                'CategoryId' => 1, // Asegúrate de que el CategoryId 1 exista en la tabla categories
            ],
            [
                'Name' => 'Puma RS-X',
                'Brand' => 'Puma',
                'Price' => 90.00,
                'Description' => 'Zapatillas deportivas de estilo urbano.',
                'CreatedAt' => now(),
                'Quantity' => 50,
                'LastUpdate' => now(),
                'Stock' => 25,
                'ProviderId' => 3, // Asegúrate de que el ProviderId 3 exista en la tabla providers
                'CategoryId' => 1, // Asegúrate de que el CategoryId 1 exista en la tabla categories
            ],
            [
                'Name' => 'Reebok Classic Leather',
                'Brand' => 'Reebok',
                'Price' => 75.00,
                'Description' => 'Zapatillas clásicas de cuero con estilo vintage.',
                'CreatedAt' => now(),
                'Quantity' => 150,
                'LastUpdate' => now(),
                'Stock' => 80,
                'ProviderId' => 4, // Asegúrate de que el ProviderId 4 exista en la tabla providers
                'CategoryId' => 1, // Asegúrate de que el CategoryId 1 exista en la tabla categories
            ],
            [
                'Name' => 'Under Armour HOVR Phantom',
                'Brand' => 'Under Armour',
                'Price' => 150.00,
                'Description' => 'Zapatillas de running con tecnología avanzada de amortiguación.',
                'CreatedAt' => now(),
                'Quantity' => 75,
                'LastUpdate' => now(),
                'Stock' => 60,
                'ProviderId' => 5, // Asegúrate de que el ProviderId 5 exista en la tabla providers
                'CategoryId' => 1, // Asegúrate de que el CategoryId 1 exista en la tabla categories
            ],
        ]);
    }
}
