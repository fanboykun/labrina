<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criteria;
use App\Models\Project;

class CriteriaMooraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moora = Project::where('name', 'Moora')->first();

        $criteria_moora1 = new Criteria();
        $criteria_moora1->project_id = $moora->id;
        $criteria_moora1->name = 'Bahan Pembuatan';
        $criteria_moora1->c_code = 'C1';
        $criteria_moora1->is_cost = false;
        $criteria_moora1->weight = 2.2;
        $criteria_moora1->max_value = 50;
        $criteria_moora1->save();

        $criteria_moora2 = new Criteria();
        $criteria_moora2->project_id = $moora->id;
        $criteria_moora2->name = 'Pengatur Suhu';
        $criteria_moora2->c_code = 'C2';
        $criteria_moora2->is_cost = false;
        $criteria_moora2->weight = 2.1;
        $criteria_moora2->max_value = 50;
        $criteria_moora2->save();

        $criteria_moora3 = new Criteria();
        $criteria_moora3->project_id = $moora->id;
        $criteria_moora3->name = 'Garansi';
        $criteria_moora3->c_code = 'C3';
        $criteria_moora3->is_cost = false;
        $criteria_moora3->weight = 2.1;
        $criteria_moora3->max_value = 50;
        $criteria_moora3->save();

        $criteria_moora4 = new Criteria();
        $criteria_moora4->project_id = $moora->id;
        $criteria_moora4->name = 'Harga';
        $criteria_moora4->c_code = 'C4';
        $criteria_moora4->is_cost = true;
        $criteria_moora4->weight = 1.8;
        $criteria_moora4->max_value = 50;
        $criteria_moora4->save();

        $criteria_moora5 = new Criteria();
        $criteria_moora5->project_id = $moora->id;
        $criteria_moora5->name = 'Ukuran';
        $criteria_moora5->c_code = 'C5';
        $criteria_moora5->is_cost = true;
        $criteria_moora5->weight = 1.8;
        $criteria_moora5->max_value = 50;
        $criteria_moora5->save();
    }
}
