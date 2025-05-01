<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['Name' => 'Sneakers', 'Description' => 'Zapatillas deportivas y casuales para todos los gustos.'],
            ['Name' => 'Ropa', 'Description' => 'Ropa para hombres y mujeres, desde casual hasta formal.'],
            ['Name' => 'Accesorios', 'Description' => 'Complementos de moda, incluyendo relojes, gafas de sol, y más.'],
            ['Name' => 'Bolsos', 'Description' => 'Bolsos de mano, mochilas y carteras de diferentes estilos.'],
            ['Name' => 'Hombres', 'Description' => 'Categoría con productos exclusivamente para hombres.'],
            ['Name' => 'Mujeres', 'Description' => 'Categoría con productos exclusivamente para mujeres.'],
        ]);
    }
}
