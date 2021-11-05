<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;


class ProjectWaspasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $waspas = new Project();
        $waspas->name = 'Waspas';
        $waspas->type = 'Waspas';
        $waspas->save();
    }
}
