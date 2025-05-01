<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Municipality; // Importamos el modelo Municipality

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Obtener algunos municipios existentes
        $municipalities = Municipality::all();

        // Crear usuarios con datos de ejemplo y asignarles un MunicipalityId
        DB::table('users')->insert([
            [
                'UserId' => Str::uuid(),
                'firstName' => 'Juan',
                'lastName' => 'Pérez',
                'createdAt' => now(),
                'email' => 'juan.perez@example.com',
                'password' => bcrypt('password123'),
                'phoneNumber' => '5551234567',
                'MunicipalityId' => $municipalities->random()->MunId, // Asignar municipio aleatorio
            ],
            [
                'UserId' => Str::uuid(),
                'firstName' => 'Ana',
                'lastName' => 'Gómez',
                'createdAt' => now(),
                'email' => 'ana.gomez@example.com',
                'password' => bcrypt('password456'),
                'phoneNumber' => '5559876543',
                'MunicipalityId' => $municipalities->random()->MunId, // Asignar municipio aleatorio
            ],
            [
                'UserId' => Str::uuid(),
                'firstName' => 'Carlos',
                'lastName' => 'Sánchez',
                'createdAt' => now(),
                'email' => 'carlos.sanchez@example.com',
                'password' => bcrypt('password789'),
                'phoneNumber' => '5553456789',
                'MunicipalityId' => $municipalities->random()->MunId, // Asignar municipio aleatorio
            ],
            [
                'UserId' => Str::uuid(),
                'firstName' => 'María',
                'lastName' => 'López',
                'createdAt' => now(),
                'email' => 'maria.lopez@example.com',
                'password' => bcrypt('password101'),
                'phoneNumber' => '5557654321',
                'MunicipalityId' => $municipalities->random()->MunId, // Asignar municipio aleatorio
            ],
            [
                'UserId' => Str::uuid(),
                'firstName' => 'José',
                'lastName' => 'Martínez',
                'createdAt' => now(),
                'email' => 'jose.martinez@example.com',
                'password' => bcrypt('password202'),
                'phoneNumber' => '5555678901',
                'MunicipalityId' => $municipalities->random()->MunId, // Asignar municipio aleatorio
            ],
        ]);
    }
}
