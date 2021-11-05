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
        //user seeder
        \App\Models\User::factory(1)->create();
        // waspas
        $this->call(ProjectWaspasSeeder::class);
        $this->call(CriteriaWaspasSeeder::class);
        $this->call(AlternativeWaspasSeeder::class);

        // moora
        $this->call(ProjectMooraSeeder::class);
        $this->call(CriteriaMooraSeeder::class);
        $this->call(AlternativeMooraSeeder::class);
    }
}
