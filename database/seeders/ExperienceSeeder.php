<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder {
    public function run() {
        DB::table('experiences')->insert([
            ['name' => 'Fresher', 'min_years' => 0, 'max_years' => 0],
            ['name' => '1-2 years', 'min_years' => 1, 'max_years' => 2],
            ['name' => '2-3 years', 'min_years' => 2, 'max_years' => 3],
            ['name' => '3-5 years', 'min_years' => 3, 'max_years' => 5],
            ['name' => '5+ years', 'min_years' => 5, 'max_years' => null],
        ]);
    }
}