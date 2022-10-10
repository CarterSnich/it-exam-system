<?php

namespace Database\Factories;

use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'section_name' => ucfirst($this->faker->unique()->word()),
            'year_level' => $this->faker->randomElement(Section::$year_levels),
            'course' => ucfirst($this->faker->word()) . ' ' . ucfirst($this->faker->word()),
            'theme_color' => $this->faker->randomElement(Section::$theme_colors),
            'teacher_id' => Teacher::all()->random()->id
        ];
    }
}
