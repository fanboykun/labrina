<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class DecissionSupportSystem extends Component
{
    public $project;
    public $selected_project;
    public $tab = 'criteria' ?? '';


    public $queryString = [
        'tab' => ['except' => '']
    ];

    public $listeners = ['openTab' => 'changeTab'];

    public function mount(Project $project)
    {
        // Project::find($project->id);
        if(Project::find($project->id) != null){
            $this->project = $project;
            $this->selected_project = $project;
            // $this->tab = 'criteria';
        }else{
            $this->tab = '';
        }
    }

    public function render()
    {
        return view('livewire.decission-support-system');
    }

    public function changeTab($tab)
    {
        $this->tab = $tab;
    }
}
