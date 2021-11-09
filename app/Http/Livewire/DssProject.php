<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Rangking;
use App\Services\Dss;

class DssProject extends Component
{
    public $project;
    public $criterias;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->criterias = $project->criterias->load('alternatives')->map(function ($item, $key){
            return [
                'criteria_id' => $item->id,
                'name' => $item->name,
                'type' => $item->is_cost,
                'weight' => $item->weight,
                'max_value' => $item->max_value,
                'alternatives' => $item->alternatives->map(function ($item, $key){
                    return [
                        'alternative_id' => $item->id,
                        'name' => $item->name,
                        'value' => $item->pivot->value,
                    ];
                })->toArray()
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.dss-project');
    }

    public function beginCalculate(Dss $dss)
    {
        $ranked_alternatives = $dss->operate($this->project, $this->criterias);
        // dd($ranked_alternatives);
        $this->saveToRank($ranked_alternatives);
        $this->emit('openTab', 'rangkings');
        $this->reset('criterias');
    }

    public function saveToRank(array $result)
    {
        foreach ($result as $key => $rank) {
            Rangking::updateOrCreate([
                'project_id' => $this->project->id,
                'alternative_id' => $rank['alternative_id'],
            ], [
                'rank' => $rank['rank'],
                'result' => $rank['optimized_value'],
            ]);
            // $rangking = new Rangking();
            // $rangking->result = $rank['optimized_value'];
            // $rangking->rank = $rank['rank'];
            // $rangking->project()->associate($this->project);
            // $rangking->alternative()->associate($rank['alternative_id']);
            // $rangking->save();
        }
        return true;
    }


}
