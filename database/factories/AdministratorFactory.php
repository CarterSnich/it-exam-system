<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdministratorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => 'admin@evsu.edu.ph',
            'password' => Hash::make('admin'),
            'lastname'  => $this->faker->lastName(),
            'firstname'  => $this->faker->firstName(),
            'middlename'  => $this->faker->lastName()
        ];
    }
}
