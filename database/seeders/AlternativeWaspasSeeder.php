<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Criteria;
use App\Models\Alternative;
use Illuminate\Database\Seeder;

class AlternativeWaspasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = Project::where('name', 'Waspas')->first();
        $criterias = Criteria::where('project_id', $project->id)->get();

        $raw_value = [
            [0.95, 3.33, 3.50, 2.98, 3.24],
            [0.95, 1.42, 4.58, 4.40, 4.16],
            [0.96, 1.92, 3.40, 3.32, 3.32],
            [0.99, 4.67, 4.04, 3.74, 3.74],
            [0.99, 3.33, 3.50, 2.98, 3.24],
            [0.99, 1.42, 4.58, 4.40, 4.16],
            [0.99, 1.92, 3.40, 3.32, 3.32],
            [0.99, 4.67, 4.04, 3.74, 3.74],
            [0.99, 3.33, 3.50, 2.98, 3.24],
            [0.98, 1.42, 3.42, 3.40, 3.24]
        ];

        $values = collect($raw_value);
        $loop = 1;
        foreach ($values as $val => $value){
            $alternative_waspas = new Alternative();
            $alternative_waspas->project_id = $project->id;
            $alternative_waspas->name = 'Alternative Waspas'.' '.$loop;
            $alternative_waspas->a_code = 'A'.$loop;
            $alternative_waspas->save();
            foreach ($criterias as $key => $criteria) {
                $alternative_waspas->criterias()->attach($criteria->id, ['project_id' => $project->id,'value' => $value[$key]]);
            }
            $loop++;
        }
    }
}
