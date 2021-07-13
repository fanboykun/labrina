<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class DecissionSupportSystem extends Component
{
    public $tab = 1;
    public $project_id;

    public $listeners = ['created' => 'created',
     'projectAdded' => 'added'];


    public function render()
    {
        return view('livewire.decission-support-system');
    }

    public function added(Project $project)
    {
        $this->project_id = $project;
    }

    public function tabs($key)
    {
        if ($key === 1) {
            $this->tab = $key;
        }
        elseif ($key != 1 and $this->project_id != NULL){
            $this->tab = $key;
        }

    }

    public function created($key)
    {
        $this->tab = $key;
    }
}
