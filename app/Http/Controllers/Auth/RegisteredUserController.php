<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Municipality;
use App\Providers\RouteServiceProvider;   // ← Importa este proveedor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $municipalities = Municipality::pluck('Name', 'MunId');
        return view('auth.register', compact('municipalities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName'       => 'required|string|max:255',
            'lastName'        => 'required|string|max:255',
            'email'           => 'required|string|email|max:256|unique:users,email',
            'password'        => 'required|string|confirmed|min:8',
            'phoneNumber'     => 'nullable|string|max:20',
            'MunicipalityId'  => 'nullable|exists:municipalities,MunId',
        ]);

        $user = User::create([
            'UserId'          => (string) Str::uuid(),
            'firstName'       => $request->firstName,
            'lastName'        => $request->lastName,
            'email'           => $request->email,
            'password'        => $request->password,
            'phoneNumber'     => $request->phoneNumber,
            'MunicipalityId'  => $request->MunicipalityId,
        ]);

        Auth::login($user);

        // Ahora sí, RouteServiceProvider::HOME está disponible
        return redirect(RouteServiceProvider::HOME);
    }
}
