<?php

namespace App\Http\Livewire;
use App\Models\Criteria as CriteriaModel;
use App\Models\Project;
use Livewire\Component;

class Criteria extends Component
{
    // property
    public $name;
    public $weight;
    public $max_value;
    public $c_code = 1;
    public $initial = "C";
    public $project_id;

    // listeners

    // public $listeners = ['projectAdded'];

    // helper
    public $inputs = [];

    public function mount(Project $project)
    {
        $this->project_id = $project;
        $this->inputs[] =
            ['name' => '', 'weight' => '', 'max_value' => '', 'c_code' => $this->initial.''.$this->c_code,];
    }

    public function render()
    {
        return view('livewire.criteria');
    }

    public function add()
    {
        $this->c_code++;
        $this->inputs[] = ['name' => '', 'weight' => '', 'max_value' => '', 'c_code' => $this->initial.''.$this->c_code];
    }

    public function remove($key)
    {
        unset($this->inputs[$key]);
        $this->inputs = array_values($this->inputs);
    }

    public function addCriteria()
    {
        $this->validate([
            'inputs.*.name'=> 'required',
            'inputs.*.weight'=> 'required',
            'inputs.*.max_value'=> 'required',
        ],
        [
            'inputs.*.name.required'=> 'name field is required',
            'inputs.*.weight.required'=> 'weight field is required',
            'inputs.*.max_value.required'=> 'max value field is required',
        ]);

        // dd($this->inputs);
            foreach($this->inputs as $data)
                {
                        CriteriaModel::create([
                            'project_id' => $this->project_id->id,
                            'name' => $data['name'],
                            'c_code' => $data['c_code'],
                            'is_cost' => false,
                            'weight' => $data['weight'],
                            'max_value' => $data['max_value'],
                        ]);
                }

        $this->emit('created', 3);
        $this->reset(['name','c_code','weight','max_value','inputs']);
        $this->inputs[] = ['name' => '', 'weight' => '', 'max_value' => '', 'c_code' => $this->initial.''.$this->c_code];
    }

}
