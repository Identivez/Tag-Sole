<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'UserId' => Str::uuid(),
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password123'),  // Cambiar el valor de la contraseña por defecto
            'phoneNumber' => $this->faker->phoneNumber,
            'MunicipalityId' => \App\Models\Municipality::inRandomOrder()->first()->MunId,
            'createdAt' => now(),
        ];
    }
}
