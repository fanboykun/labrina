<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectMooraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moora = new Project();
        $moora->name = 'Moora';
        $moora->type = 'Moora';
        $moora->save();
    }
}
