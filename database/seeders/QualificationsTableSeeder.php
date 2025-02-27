<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class QualificationsTableSeeder extends Seeder {
    public function run() {
        DB::table('qualifications')->insert([
            ['name' => 'Uneducated', 'level' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Primary Education', 'level' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Middle School', 'level' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Matric (10th)', 'level' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Intermediate (+2)', 'level' => 12, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Diploma', 'level' => 13, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bachelor’s Degree', 'level' => 16, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Master’s Degree', 'level' => 18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Doctorate (Ph.D.)', 'level' => 21, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Certification', 'level' => 99, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
