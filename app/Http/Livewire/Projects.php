<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class Projects extends Component
{
    // Project
    public $name;
    public $type;
    public $project_list;
    public $selected_project;
    public $create_new;


    protected $rules = [
        'selected_project' => 'required_if:create_new,false',
        'name' => 'required_if:selected_project,null',
        'type' => 'required_if:selected_project,null'
    ];


    public function render()
    {
        $this->project_list = Project::all();
        return view('livewire.projects');
    }

    public function addProject()
    {
        $this->validate();

        $project = Project::firstOrCreate(
            ['id' => $this->selected_project],
            ['name' => $this->name, 'type' => $this->type]);

        $this->reset(['name', 'type']);
        // $this->emit('created', $project, 'criteria');
        return redirect()->route('decission-support-system.show', $project);
    }
}
