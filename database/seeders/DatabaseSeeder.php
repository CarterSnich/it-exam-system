<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // admin
        \App\Models\Administrator::factory()->create();

        // teachers
        for ($i = 0; $i < 28; $i++) {
            \App\Models\Teacher::factory()->create();
        }

        // students
        for ($i = 0; $i < 98; $i++) {
            \App\Models\Student::factory()->create();
        }

        // sections
        for ($i = 0; $i < 50; $i++) {
            \App\Models\Section::factory()->create();
        }

        // section-student
        for ($i = 0; $i < 98; $i++) {
            try {
                //code...
                \App\Models\SectionStudent::factory()->create();
            } catch (\Illuminate\Database\QueryException $th) {
                ++$i;
            }
        }
    }
}
