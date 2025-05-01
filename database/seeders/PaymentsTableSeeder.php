<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([
            [
                'OrderId' => 1, // Asegúrate de que el OrderId 1 exista en la tabla 'orders'
                'UserId' => '1234567890', // Asegúrate de que el UserId 1234567890 exista en la tabla 'users'
                'PaymentMethod' => 'Credit Card',
                'Amount' => 250.00,
                'PaymentStatus' => 'Completed',
                'TransactionDate' => now(),
                'PaymentProvider' => 'Stripe',
            ],
            [
                'OrderId' => 2,
                'UserId' => '1234567891',
                'PaymentMethod' => 'PayPal',
                'Amount' => 350.00,
                'PaymentStatus' => 'Completed',
                'TransactionDate' => now(),
                'PaymentProvider' => 'PayPal',
            ],
            [
                'OrderId' => 3,
                'UserId' => '1234567892',
                'PaymentMethod' => 'Credit Card',
                'Amount' => 180.00,
                'PaymentStatus' => 'Pending',
                'TransactionDate' => now(),
                'PaymentProvider' => 'Stripe',
            ],
            [
                'OrderId' => 4,
                'UserId' => '1234567890',
                'PaymentMethod' => 'Bank Transfer',
                'Amount' => 80.00,
                'PaymentStatus' => 'Completed',
                'TransactionDate' => now(),
                'PaymentProvider' => 'Bank',
            ],
            [
                'OrderId' => 5,
                'UserId' => '1234567891',
                'PaymentMethod' => 'PayPal',
                'Amount' => 250.00,
                'PaymentStatus' => 'Failed',
                'TransactionDate' => now(),
                'PaymentProvider' => 'PayPal',
            ],
        ]);
    }
}
