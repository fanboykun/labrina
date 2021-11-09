<?php

namespace App\Http\Livewire;

use App\Models\Alternative as AlternativeModel;
use App\Models\Criteria;
use App\Models\Project;
use Livewire\Component;

class Alternative extends Component
{
    // // property
    // public $altname;
    public $criterias = [];
    public $criteria_data;
    public $project;

    public $search;
    public $listeners = [
        'alternativeSaved' => '$refresh',
    ];
    // modal
    public bool $isModalOpen = false;

    public function mount(Project $project)
    {
        $this->project = $project->load('alternatives');
        $this->criteria_data = Criteria::where('project_id', $project->id)->with('alternatives')->get();
    }

    public function render()
    {
        if ($this->project->alternatives->count() > 0) {
            $alternatives = $this->project->alternatives->toQuery()->where('name', 'like', '%'.$this->search.'%')->with('criterias')->get();
        }else{
            $alternatives = [];
        }
        return view('livewire.alternative', ['alternatives' => $alternatives]);
    }
}
