<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Rangking;
use App\Services\MooraService;

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

    public function testCalculate(MooraService $mooraService)
    {
        $normalized_criterias = $mooraService->normalize($this->criterias);
        $optimized_criterias = $mooraService->optimize($normalized_criterias);
        $sorted_value = $mooraService->sortByOptimizedValue($optimized_criterias);
        $ranked_alternatives = $mooraService->assignRank($sorted_value);
        foreach ($ranked_alternatives as $key => $rank) {
            $rangking = new Rangking();
            $rangking->result = $rank['optimized_value'];
            $rangking->rank = $rank['rank'];
            $rangking->project()->associate($this->project);
            $rangking->alternative()->associate($rank['alternative_id']);
            $rangking->save();
        }
        $this->emit('openTab', 'rangkings');
        $this->reset('criterias');
    }


}
