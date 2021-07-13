<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class Projects extends Component
{
    // Project
    public $name;
    public $type;
    public $project_id;

    protected $rules = [
        'name' => 'required',
        'type' => 'required'
    ];

    public function mount($project)
    {
        if($project){
            $this->project_id = $project->id;
            $this->name = $project->name;
            $this->type = $project->type;
        }
            else{
                $this->name = '';
            $this->type = '';
            }
    }

    public function render()
    {
        return view('livewire.projects');
    }

    public function addProject()
    {
        $this->validate();
        $currentProject = Project::where('id', $this->project_id)->first();
        if($currentProject)
        {
            $currentProject->update(['name'=> $this->name, 'type' => $this->type]);
            $this->emit('projectAdded', $currentProject->id);
        }
        else {
            $project = new Project;
            $project->name = $this->name;
            $project->type = $this->type;
            $project->save();
            $this->emit('projectAdded', $project->id);
        }
        $this->emit('created', 2);
    }
}
