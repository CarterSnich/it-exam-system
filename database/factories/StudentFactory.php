<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // user account credentials
            'password' => Hash::make('password'),

            // identity
            'lastname' => $this->faker->lastName(),
            'firstname' => $this->faker->firstName(),
            'middlename' => $this->faker->randomElement([null, $this->faker->lastName()]),

            // personal information
            'date_of_birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male', 'female']),

            // contact information
            'email' => $this->faker->email(),
            'mobile_no' => $this->faker->numerify('09#########'),

            // address
            'address' => $this->faker->address()
        ];
    }
}
