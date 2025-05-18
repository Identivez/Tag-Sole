<x-guest-layout>
    <h2 class="text-2xl font-semibold mb-6 text-center">Crear una cuenta</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="firstName" :value="__('Nombre')" />
                <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="given-name" />
                <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="lastName" :value="__('Apellidos')" />
                <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autocomplete="family-name" />
                <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
            </div>
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Teléfono -->
        <div class="mt-4">
            <x-input-label for="phoneNumber" :value="__('Teléfono (opcional)')" />
            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" :value="old('phoneNumber')" autocomplete="tel" />
            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
        </div>

        <!-- Municipio -->
        <div class="mt-4">
            <x-input-label for="MunicipalityId" :value="__('Municipio (opcional)')" />
            <select id="MunicipalityId" name="MunicipalityId" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                <option value="">Seleccione un municipio</option>
                @foreach($municipalities as $id => $name)
                    <option value="{{ $id }}" {{ old('MunicipalityId') == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('MunicipalityId')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya tienes una cuenta?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
