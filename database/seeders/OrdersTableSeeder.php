<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'UserId' => '015ab7a9-db14-454d-80f1-ad7fcb850606', // Asegúrate de que el UserId 1234567890 exista en la tabla 'users'
                'OrderDate' => now(),
                'TotalAmount' => 250.00,
                'OrderStatus' => 'Pending',
                'PaymentId' => 1, // Asegúrate de que el PaymentId 1 exista en la tabla de pagos (opcional)
                'ShippingMethod' => 'Standard',
                'ShippingCost' => 20.00,
                'ShippingAddressId' => 1, // Asegúrate de que el AddressId 1 exista en la tabla 'addresses'
                'BillingAddressId' => 2, // Asegúrate de que el AddressId 2 exista en la tabla 'addresses'
                'CreatedAt' => now(),
                'UpdatedAt' => now(),
            ],
            [
                'UserId' => 'a453d9c5-e8cd-45c8-8e7d-d3e231ef0442',
                'OrderDate' => now(),
                'TotalAmount' => 350.00,
                'OrderStatus' => 'Shipped',
                'PaymentId' => 2,
                'ShippingMethod' => 'Express',
                'ShippingCost' => 30.00,
                'ShippingAddressId' => 3,
                'BillingAddressId' => 4,
                'CreatedAt' => now(),
                'UpdatedAt' => now(),
            ],
            [
                'UserId' => 'cac7cb01-2c57-44db-ac6a-99d9f88f648f',
                'OrderDate' => now(),
                'TotalAmount' => 180.00,
                'OrderStatus' => 'Delivered',
                'PaymentId' => 3,
                'ShippingMethod' => 'Standard',
                'ShippingCost' => 15.00,
                'ShippingAddressId' => 5,
                'BillingAddressId' => 6,
                'CreatedAt' => now(),
                'UpdatedAt' => now(),
            ],
        ]);
    }
}
