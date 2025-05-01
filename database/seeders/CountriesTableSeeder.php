<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('countries')->insert([
            [
                'Name' => 'Argentina',
                'Key' => 'AR',
                'Status' => 1
            ],
            [
                'Name' => 'Brasil',
                'Key' => 'BR',
                'Status' => 1
            ],
            [
                'Name' => 'Chile',
                'Key' => 'CL',
                'Status' => 1
            ],
            [
                'Name' => 'México',
                'Key' => 'MX',
                'Status' => 1
            ],
            [
                'Name' => 'Colombia',
                'Key' => 'CO',
                'Status' => 1
            ],
        ]);
    }
}
