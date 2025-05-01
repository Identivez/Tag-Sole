<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductInventoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_inventories')->insert([
            [
                'ProductId' => 1, // Asegúrate de que el ProductId 1 exista en la tabla 'products'
                'SizeId' => 1,    // Asegúrate de que el SizeId 1 exista en la tabla 'sizes'
                'Quantity' => 50,
                'Price' => 120.00,
                'SKU' => 'NIKE-001',
                'Condition' => 'New',
                'InStock' => true,
                'ReorderLevel' => 5,
                'LastUpdated' => now(),
            ],
            [
                'ProductId' => 1,
                'SizeId' => 2,
                'Quantity' => 30,
                'Price' => 120.00,
                'SKU' => 'NIKE-002',
                'Condition' => 'New',
                'InStock' => true,
                'ReorderLevel' => 5,
                'LastUpdated' => now(),
            ],
            [
                'ProductId' => 2,
                'SizeId' => 3,
                'Quantity' => 100,
                'Price' => 150.00,
                'SKU' => 'ADIDAS-001',
                'Condition' => 'New',
                'InStock' => true,
                'ReorderLevel' => 10,
                'LastUpdated' => now(),
            ],
            [
                'ProductId' => 3,
                'SizeId' => 1,
                'Quantity' => 75,
                'Price' => 90.00,
                'SKU' => 'PUMA-001',
                'Condition' => 'New',
                'InStock' => true,
                'ReorderLevel' => 7,
                'LastUpdated' => now(),
            ],
            [
                'ProductId' => 4,
                'SizeId' => 2,
                'Quantity' => 50,
                'Price' => 80.00,
                'SKU' => 'REEBOK-001',
                'Condition' => 'New',
                'InStock' => true,
                'ReorderLevel' => 5,
                'LastUpdated' => now(),
            ],
        ]);
    }
}
