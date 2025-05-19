<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserssTableSeeder extends Seeder
{
    public function run()
    {
        // Usuario Administrador
        $adminId = (string) Str::uuid();
        DB::table('users')->insert([
            'UserId' => $adminId,
            'firstName' => 'Admin',
            'lastName' => 'Usuario',
            'email' => 'ghael@admin.com',
            'password' => Hash::make('admin123'),
            'phoneNumber' => '5551234567',
            'createdAt' => now(),
            'updatedAt' => now()
        ]);

        // Agregar el rol de administrador al usuario admin
        DB::table('role_user')->insert([
            'RoleId' => 'admin',
            'UserId' => $adminId
        ]);

        // Usuario Editor
        $editorId = (string) Str::uuid();
        DB::table('users')->insert([
            'UserId' => $editorId,
            'firstName' => 'Editor',
            'lastName' => 'Usuario',
            'email' => 'editor@example.com',
            'password' => Hash::make('editor123'),
            'phoneNumber' => '5552345678',
            'createdAt' => now(),
            'updatedAt' => now()
        ]);

        // Agregar el rol de editor al usuario editor
        DB::table('role_user')->insert([
            'RoleId' => 'editor',
            'UserId' => $editorId
        ]);

        // Usuario normal
        $userId = (string) Str::uuid();
        DB::table('users')->insert([
            'UserId' => $userId,
            'firstName' => 'Usuario',
            'lastName' => 'Normal',
            'email' => 'user@example.com',
            'password' => Hash::make('user123'),
            'phoneNumber' => '5553456789',
            'createdAt' => now(),
            'updatedAt' => now()
        ]);

        // Agregar el rol de usuario al usuario normal
        DB::table('role_user')->insert([
            'RoleId' => 'user',
            'UserId' => $userId
        ]);

        // Usuario invitado
        $guestId = (string) Str::uuid();
        DB::table('users')->insert([
            'UserId' => $guestId,
            'firstName' => 'Invitado',
            'lastName' => 'Usuario',
            'email' => 'guest@example.com',
            'password' => Hash::make('guest123'),
            'phoneNumber' => '5554567890',
            'createdAt' => now(),
            'updatedAt' => now()
        ]);

        // Agregar el rol de invitado al usuario invitado
        DB::table('role_user')->insert([
            'RoleId' => 'guest',
            'UserId' => $guestId
        ]);
    }
}
