<?php

namespace Database\Factories;

use App\Models\Student;
use Carbon\Carbon;
use Closure;
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
            'student_id' => $this->faker->numerify("{date('Y')}-####"),
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

    public function configure()
    {
        return $this->afterCreating(function (Student $student) {
            $carbon = new Carbon($student->created_at);
            $student->student_id = $carbon->year . "-" . str_pad($student->id, 4, '0', STR_PAD_LEFT);
            $student->save();
        });
    }
}
