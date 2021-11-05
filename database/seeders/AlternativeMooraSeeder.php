<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Criteria;
use App\Models\Alternative;

class AlternativeMooraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = Project::where('name', 'Moora')->first();
        $criterias = Criteria::where('project_id', $project->id)->get();

        $raw_value = [
            [40,30,50,40,50],
            [40,40,50,30,30],
            [30,50,50,40,40],
            [30,50,20,50,30],
            [40,40,50,50,30],
            [20,50,20,40,30],
            [30,50,50,30,40],
            [50,40,50,30,30],
            [40,40,50,30,50],
            [20,50,20,40,30]
        ];
        $values = collect($raw_value);

        $loop = 1;
        foreach ($values as $val => $value){
            $alternative_moora = new Alternative();
            $alternative_moora->project_id = $project->id;
            $alternative_moora->name = 'Alternative Moora'.' '.$loop;
            $alternative_moora->a_code = 'A'.$loop;
            $alternative_moora->save();
            foreach ($criterias as $key => $criteria) {
                $alternative_moora->criterias()->attach($criteria->id, ['project_id' => $project->id,'value' => $value[$key]]);
            }
            $loop++;
        }
    }

}
