<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            // identity
            'lastname' => $this->faker->lastName(),
            'firstname' => $this->faker->firstName(),
            'middlename' => $this->faker->randomElement([$this->faker->lastname(), NULL]),

            // personal information
            'date_of_birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male', 'female']),

            // contact information
            'email' => $this->faker->email(),
            'mobile_no' => $this->faker->numerify('09#########'),

            // address
            'address' => $this->faker->address(),

            // user account credentials
            'password' => Hash::make('password'),
        ];
    }
}
