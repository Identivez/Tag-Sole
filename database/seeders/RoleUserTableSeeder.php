<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User; // Importamos el modelo User
use App\Models\Role; // Importamos el modelo Role

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        // Obtener todos los usuarios y roles
        $users = User::all();
        $roles = Role::all();

        // Asignar roles aleatorios a los usuarios
        foreach ($users as $user) {
            // Asignar 1 a 3 roles aleatorios a cada usuario
            $assignedRoles = $roles->random(rand(1, 3));

            foreach ($assignedRoles as $role) {
                DB::table('role_user')->insert([
                    'UserId' => $user->UserId,
                    'RoleId' => $role->RoleId,
                ]);
            }
        }
    }
}
