<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Entity; // Importamos el modelo Entity

class MunicipalitiesTableSeeder extends Seeder
{
    public function run()
    {
        // Obtener las entidades existentes
        $entities = Entity::all();

        // Crear municipios asociados a entidades
        DB::table('municipalities')->insert([
            // Municipios de Argentina
            [
                'EntityId' => $entities->where('Name', 'Buenos Aires')->first()->EntityId,
                'Name' => 'La Plata',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Buenos Aires')->first()->EntityId,
                'Name' => 'Mar del Plata',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Buenos Aires')->first()->EntityId,
                'Name' => 'Bahía Blanca',
                'Status' => 1
            ],

            // Municipios de Córdoba
            [
                'EntityId' => $entities->where('Name', 'Córdoba')->first()->EntityId,
                'Name' => 'Córdoba capital',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Córdoba')->first()->EntityId,
                'Name' => 'Villa María',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Córdoba')->first()->EntityId,
                'Name' => 'Río Cuarto',
                'Status' => 1
            ],

            // Municipios de Santa Fe
            [
                'EntityId' => $entities->where('Name', 'Santa Fe')->first()->EntityId,
                'Name' => 'Rosario',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Santa Fe')->first()->EntityId,
                'Name' => 'Santa Fe',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Santa Fe')->first()->EntityId,
                'Name' => 'Rafaela',
                'Status' => 1
            ],

            // Municipios de São Paulo
            [
                'EntityId' => $entities->where('Name', 'São Paulo')->first()->EntityId,
                'Name' => 'São Paulo',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'São Paulo')->first()->EntityId,
                'Name' => 'Campinas',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'São Paulo')->first()->EntityId,
                'Name' => 'Santos',
                'Status' => 1
            ],

            // Municipios de Rio de Janeiro
            [
                'EntityId' => $entities->where('Name', 'Rio de Janeiro')->first()->EntityId,
                'Name' => 'Rio de Janeiro',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Rio de Janeiro')->first()->EntityId,
                'Name' => 'Niterói',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Rio de Janeiro')->first()->EntityId,
                'Name' => 'Cabo Frio',
                'Status' => 1
            ],

            // Municipios de Chile
            [
                'EntityId' => $entities->where('Name', 'Santiago')->first()->EntityId,
                'Name' => 'Santiago Centro',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Santiago')->first()->EntityId,
                'Name' => 'Providencia',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Santiago')->first()->EntityId,
                'Name' => 'Las Condes',
                'Status' => 1
            ],

            // Municipios de Valparaíso
            [
                'EntityId' => $entities->where('Name', 'Valparaíso')->first()->EntityId,
                'Name' => 'Valparaíso',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Valparaíso')->first()->EntityId,
                'Name' => 'Viña del Mar',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Valparaíso')->first()->EntityId,
                'Name' => 'Quillota',
                'Status' => 1
            ],

            // Municipios de Jalisco
            [
                'EntityId' => $entities->where('Name', 'Jalisco')->first()->EntityId,
                'Name' => 'Guadalajara',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Jalisco')->first()->EntityId,
                'Name' => 'Puerto Vallarta',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Jalisco')->first()->EntityId,
                'Name' => 'Tlaquepaque',
                'Status' => 1
            ],

            // Municipios de Ciudad de México
            [
                'EntityId' => $entities->where('Name', 'Ciudad de México')->first()->EntityId,
                'Name' => 'Xochimilco',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Ciudad de México')->first()->EntityId,
                'Name' => 'Coyoacán',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Ciudad de México')->first()->EntityId,
                'Name' => 'Iztapalapa',
                'Status' => 1
            ],

            // Municipios de Bogotá
            [
                'EntityId' => $entities->where('Name', 'Bogotá')->first()->EntityId,
                'Name' => 'Bogotá',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Bogotá')->first()->EntityId,
                'Name' => 'Usaquén',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Bogotá')->first()->EntityId,
                'Name' => 'Teusaquillo',
                'Status' => 1
            ],

            // Municipios de Antioquia
            [
                'EntityId' => $entities->where('Name', 'Antioquia')->first()->EntityId,
                'Name' => 'Medellín',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Antioquia')->first()->EntityId,
                'Name' => 'Rionegro',
                'Status' => 1
            ],
            [
                'EntityId' => $entities->where('Name', 'Antioquia')->first()->EntityId,
                'Name' => 'Bello',
                'Status' => 1
            ]
        ]);
    }
}
