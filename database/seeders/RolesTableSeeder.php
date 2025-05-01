<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Verificar si los roles ya existen antes de insertarlos
        $roles = [
            ['RoleId' => 'admin', 'Name' => 'Administrador'],
            ['RoleId' => 'user', 'Name' => 'Usuario'],
            ['RoleId' => 'moderator', 'Name' => 'Moderador'],
            ['RoleId' => 'editor', 'Name' => 'Editor'],
            ['RoleId' => 'guest', 'Name' => 'Invitado'],
        ];

        foreach ($roles as $role) {
            // Solo insertar si el RoleId no existe ya
            if (!DB::table('roles')->where('RoleId', $role['RoleId'])->exists()) {
                DB::table('roles')->insert($role);
            }
        }
    }


}
