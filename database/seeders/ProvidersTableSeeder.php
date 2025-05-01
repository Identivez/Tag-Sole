<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvidersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('providers')->insert([
            [
                'Name' => 'Nike Inc.',
                'ContactEmail' => 'contact@nike.com',
                'ContactPhone' => '+1234567890',
                'Address' => 'One Bowerman Drive, Beaverton, OR',
                'ContactName' => 'John Doe',
            ],
            [
                'Name' => 'Adidas AG',
                'ContactEmail' => 'support@adidas.com',
                'ContactPhone' => '+1987654321',
                'Address' => 'Adi-Dassler-Straße 1, Herzogenaurach, Germany',
                'ContactName' => 'Jane Smith',
            ],
            [
                'Name' => 'Puma SE',
                'ContactEmail' => 'info@puma.com',
                'ContactPhone' => '+1122334455',
                'Address' => 'Puma Way, Herzogenaurach, Germany',
                'ContactName' => 'Emily Johnson',
            ],
            [
                'Name' => 'Reebok',
                'ContactEmail' => 'contact@reebok.com',
                'ContactPhone' => '+1456789012',
                'Address' => '1895 J.W. Foster Blvd, Canton, MA, USA',
                'ContactName' => 'Michael Brown',
            ],
            [
                'Name' => 'Under Armour',
                'ContactEmail' => 'info@underarmour.com',
                'ContactPhone' => '+1098765432',
                'Address' => '1020 Hull Street, Baltimore, MD, USA',
                'ContactName' => 'Sarah Wilson',
            ],
        ]);
    }
}
