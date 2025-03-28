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
        $this->call([
            RolesTableSeeder::class,
            AdminsTableSeeder::class,
            MenusTableSeeder::class,
            PermissionsTableSeeder::class,
            RolePermissionsTableSeeder::class,
            AppSettingsTableSeeder::class,
            StatusesTableSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            DistrictSeeder::class,
            CitySeeder::class,
            ExperienceSeeder::class,
            QualificationsTableSeeder::class,
        ]);
    }
}
