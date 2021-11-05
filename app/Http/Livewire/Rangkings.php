<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\Rangking;
use Livewire\Component;

class Rangkings extends Component
{
    public $project;
    public $rangkings;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->rangkings = Rangking::where('project_id', $project->id)->with('alternative')->get();
    }

    public function render()
    {
        return view('livewire.rangkings');
    }
}
