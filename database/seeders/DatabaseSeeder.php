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
        \App\Models\Administrator::factory()->create();

        for ($i = 0; $i < 52; $i++) {
            \App\Models\Teacher::factory()->create();
        }

        for ($i = 0; $i < 127; $i++) {
            \App\Models\Student::factory()->create();
        }
    }
}
