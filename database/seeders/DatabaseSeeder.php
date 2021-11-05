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
        $this->call(ProjectWaspasSeeder::class);
        $this->call(ProjectMooraSeeder::class);
        $this->call(CriteriaMooraSeeder::class);
        $this->call(AlternativeMooraSeeder::class);
    }
}
