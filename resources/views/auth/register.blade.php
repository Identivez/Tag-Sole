<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
      @csrf

      {{-- First Name --}}
      <div>
        <x-input-label for="firstName" :value="__('First Name')" />
        <x-text-input id="firstName"
                      class="block mt-1 w-full"
                      type="text"
                      name="firstName"
                      :value="old('firstName')"
                      required autofocus />
        <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
      </div>

      {{-- Last Name --}}
      <div class="mt-4">
        <x-input-label for="lastName" :value="__('Last Name')" />
        <x-text-input id="lastName"
                      class="block mt-1 w-full"
                      type="text"
                      name="lastName"
                      :value="old('lastName')"
                      required />
        <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
      </div>

      {{-- Email --}}
      <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email"
                      class="block mt-1 w-full"
                      type="email"
                      name="email"
                      :value="old('email')"
                      required />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      {{-- Password --}}
      <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password"
                      class="block mt-1 w-full"
                      type="password"
                      name="password"
                      required autocomplete="new-password"/>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      {{-- Confirm Password --}}
      <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="password_confirmation"
                      class="block mt-1 w-full"
                      type="password"
                      name="password_confirmation"
                      required />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>

      {{-- Phone Number --}}
      <div class="mt-4">
        <x-input-label for="phoneNumber" :value="__('Phone Number')" />
        <x-text-input id="phoneNumber"
                      class="block mt-1 w-full"
                      type="text"
                      name="phoneNumber"
                      :value="old('phoneNumber')" />
        <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
      </div>

      {{-- Municipality Select --}}
      <div class="mt-4">
        <x-input-label for="MunicipalityId" :value="__('Municipality')" />
        <select id="MunicipalityId"
                name="MunicipalityId"
                class="block mt-1 w-full border-gray-300 rounded">
          <option value="">{{ __('Select a municipality') }}</option>
          @foreach($municipalities as $id => $name)
            <option value="{{ $id }}" {{ old('MunicipalityId') == $id ? 'selected' : '' }}>
              {{ $name }}
            </option>
          @endforeach
        </select>
        <x-input-error :messages="$errors->get('MunicipalityId')" class="mt-2" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-primary-button>
          {{ __('Register') }}
        </x-primary-button>
      </div>
    </form>
  </x-guest-layout>
