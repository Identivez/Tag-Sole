<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Municipality;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Muestra la vista de registro.
     */
    public function create()
    {
        // Cargamos los municipios para el selector
        $municipalities = Municipality::orderBy('Name')->pluck('Name', 'MunId');

        return view('auth.register', compact('municipalities'));
    }

    /**
     * Maneja una solicitud de registro entrante.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phoneNumber' => ['nullable', 'string', 'max:20'],
            'MunicipalityId' => ['nullable', 'exists:municipalities,MunId'],
        ]);

        // Crear el usuario con los campos correspondientes
        $user = User::create([
            'UserId' => (string) Str::uuid(),
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => $request->password, // Se encripta automáticamente por el mutador
            'phoneNumber' => $request->phoneNumber,
            'MunicipalityId' => $request->MunicipalityId,
            'createdAt' => now(),
        ]);

        // Iniciar sesión con el usuario recién creado
        Auth::login($user);

        // Redireccionar al home
        return redirect(RouteServiceProvider::HOME);
    }
}
