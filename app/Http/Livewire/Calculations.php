<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Project;
use Livewire\Component;
use App\Models\Ranking;
use Illuminate\Support\Arr;

class Calculations extends Component
{
    public $alternatives = [];
    public $normalisations = [];
    public $i = 1;
    public $data = [];

    // public function mount(Project $project)
    // {
    //     $this->project = $project;
    // }

    public function render()
    {
        $alternativeses = Alternative::where('project_id', 1)->with(['criterias' => function($query) {
            $query->withPivot('value');
        }])->get();
        return view('livewire.calculations', compact('alternativeses'));
    }

    public function calculate()
    {
        $this->alternatives = Alternative::where('project_id', 1)->with(['criterias' => function($query) {
            $query->withPivot('value');
        }])->get()->toArray();

        foreach ($this->alternatives as $key =>$alternative)
        {
            foreach($alternative['criterias'] as $k => $criteria)
            {
                $values['value'] = $criteria['pivot']['value'] / $criteria['max_value'];
                for ($i=0; $i < count($values); $i++)
                {
                    $calc1[] = $values['value'] * ($criteria['weight'] / 100);
                    $calc2[] = pow($values['value'], ($criteria['weight'] / 100));
                }
                $calculations = (0.5 * array_sum($calc1)) + (0.5 * array_product($calc2));
            }
            $result[$key] = ['alternative_id' => $alternative['id'], 'value' => $calculations];
        }
        $collections = collect($result);
        $sorted = $collections->sortByDesc(function ($result){return $result['value'];})->toArray();
        foreach ($sorted as $key => $srt)
        {
            Ranking::create([
                'project_id' => 1,
                'alternative_id' => $srt['alternative_id'],
                'result' => $srt['value'],
                'rank' => $this->i,
            ]);
            $this->i++;
        }

    }
















    // public function go()
    // {
    //     $this->alternatives = Alternative::where('project_id', 1)->with(['criterias' => function($query) {
    //         $query->withPivot('value');
    //     }])->get();
    //     // dd($this->alternatives);
    //     foreach ($this->alternatives as $key => $alternative)
    //     {
    //         foreach ($alternative->criterias as $k => $criteria)
    //         {
    //             $normalisations[$k] = [$criteria->pivot->value / $criteria->max_value];

    //         }
    //         // dd($normalisations);
    //         foreach ($normalisations as $memek => $normalisation)
    //         {
    //            $this->data[] =  0.5 * ($normalisation[$memek] * pow($normalisation[$memek], ($criteria->weight / 100)));
    //            dd($this->data);
    //         }

    //     }
    // }

    // public function calculate()
    // {
    //     $alternatives = Alternative::where('project_id', 1)->with('criterias')->get();
    //     for ($i=0; $i < $alternatives->count(); $i++) {
    //             $data = [];
    //             foreach ($alternatives as $alternative)
    //             {
    //                 foreach ($alternative->criterias as $k => $criteria)
    //                 {
    //                     $normalisation[] = $criteria->pivot->value / $criteria->max_value ;
    //                     $qi = (0.5 * ($normalisation[$k] * ($criteria->weight / 100))) + (0.5 * ($normalisation[$k] ^ $criteria->max_value));
    //                 }
    //                 $data[] = ['alternative_id' => $alternative->id,'result' => $qi];
    //             }
    //     }
    //     dd($data);
    // }

}
