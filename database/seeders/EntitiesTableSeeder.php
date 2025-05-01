<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country; // Importamos el modelo Country

class EntitiesTableSeeder extends Seeder
{
    public function run()
    {
        // Obtener los países existentes
        $countries = Country::all();

        // Crear entidades asociadas a países
        DB::table('entities')->insert([
            // Para Argentina
            [
                'CountryId' => $countries->where('Key', 'AR')->first()->CountryId,
                'Name' => 'Buenos Aires',
                'Status' => 1
            ],
            [
                'CountryId' => $countries->where('Key', 'AR')->first()->CountryId,
                'Name' => 'Córdoba',
                'Status' => 1
            ],
            [
                'CountryId' => $countries->where('Key', 'AR')->first()->CountryId,
                'Name' => 'Santa Fe',
                'Status' => 1
            ],

            // Para Brasil
            [
                'CountryId' => $countries->where('Key', 'BR')->first()->CountryId,
                'Name' => 'São Paulo',
                'Status' => 1
            ],
            [
                'CountryId' => $countries->where('Key', 'BR')->first()->CountryId,
                'Name' => 'Rio de Janeiro',
                'Status' => 1
            ],
            [
                'CountryId' => $countries->where('Key', 'BR')->first()->CountryId,
                'Name' => 'Minas Gerais',
                'Status' => 1
            ],

            // Para Chile
            [
                'CountryId' => $countries->where('Key', 'CL')->first()->CountryId,
                'Name' => 'Santiago',
                'Status' => 1
            ],
            [
                'CountryId' => $countries->where('Key', 'CL')->first()->CountryId,
                'Name' => 'Valparaíso',
                'Status' => 1
            ],
            [
                'CountryId' => $countries->where('Key', 'CL')->first()->CountryId,
                'Name' => 'Antofagasta',
                'Status' => 1
            ],

            // Para México
            [
                'CountryId' => $countries->where('Key', 'MX')->first()->CountryId,
                'Name' => 'Jalisco',
                'Status' => 1
            ],
            [
                'CountryId' => $countries->where('Key', 'MX')->first()->CountryId,
                'Name' => 'Ciudad de México',
                'Status' => 1
            ],
            [
                'CountryId' => $countries->where('Key', 'MX')->first()->CountryId,
                'Name' => 'Nuevo León',
                'Status' => 1
            ],

            // Para Colombia
            [
                'CountryId' => $countries->where('Key', 'CO')->first()->CountryId,
                'Name' => 'Bogotá',
                'Status' => 1
            ],
            [
                'CountryId' => $countries->where('Key', 'CO')->first()->CountryId,
                'Name' => 'Antioquia',
                'Status' => 1
            ],
            [
                'CountryId' => $countries->where('Key', 'CO')->first()->CountryId,
                'Name' => 'Valle del Cauca',
                'Status' => 1
            ],
        ]);
    }
}
