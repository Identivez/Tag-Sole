<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sizes')->insert([
            [
                'SizeValue' => 'S',
                'SizeRegion' => 'US',
                'SizeType' => 'ropa',
                'IsActive' => true,
            ],
            [
                'SizeValue' => 'M',
                'SizeRegion' => 'US',
                'SizeType' => 'ropa',
                'IsActive' => true,
            ],
            [
                'SizeValue' => 'L',
                'SizeRegion' => 'US',
                'SizeType' => 'ropa',
                'IsActive' => true,
            ],
            [
                'SizeValue' => 'XL',
                'SizeRegion' => 'US',
                'SizeType' => 'ropa',
                'IsActive' => true,
            ],
            [
                'SizeValue' => '42',
                'SizeRegion' => 'EU',
                'SizeType' => 'zapatos',
                'IsActive' => true,
            ],
            [
                'SizeValue' => '44',
                'SizeRegion' => 'EU',
                'SizeType' => 'zapatos',
                'IsActive' => true,
            ],
            [
                'SizeValue' => '10',
                'SizeRegion' => 'UK',
                'SizeType' => 'zapatos',
                'IsActive' => true,
            ],
            [
                'SizeValue' => '12',
                'SizeRegion' => 'UK',
                'SizeType' => 'zapatos',
                'IsActive' => true,
            ],
        ]);
    }
}
