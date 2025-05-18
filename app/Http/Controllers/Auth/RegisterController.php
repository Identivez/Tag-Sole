<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Municipality;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    /**
     * Muestra el formulario de registro.
     */
    public function showRegistrationForm()
    {
        $municipalities = Municipality::orderBy('Name')->get();
        return view('auth.register', compact('municipalities'));
    }

    /**
     * Registra un nuevo usuario.
     */
    public function register(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phoneNumber' => ['nullable', 'string', 'max:20'],
            'MunicipalityId' => ['nullable', 'exists:municipalities,MunId'],
        ]);

        $user = User::create([
            'UserId' => (string) Str::uuid(),
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => $request->password,
            'phoneNumber' => $request->phoneNumber,
            'MunicipalityId' => $request->MunicipalityId,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
