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
    public $type;
    public $max_value;
    public $c_code = 1;
    public $initial = "C";
    public $project;

    // public $tab = null ?? 'criteria';


    // listeners

    // public $listeners = ['projectAdded'];

    // helper
    public $inputs = [];

    public function mount(Project $project)
    {
        $this->project = $project->id;
        $this->inputs[] =
            ['name' => '', 'weight' => '', 'max_value' => '', 'type' => '',];
    }

    public function render()
    {
        return view('livewire.criteria');
    }

    public function add()
    {
        $this->c_code++;
        $this->inputs[] = ['name' => '', 'weight' => '', 'max_value' => '', 'type' => ''];
    }

    public function remove($key)
    {
        // $this->c_code--;
        // $previous = $key - 1;
        // $this->inputs[$previous] = ['c_code' => $this->initial.''.$this->c_code];
        unset($this->inputs[$key]);
        $this->inputs = array_values($this->inputs);
    }

    public function addCriteria()
    {
        $this->validate([
            'inputs.*.name'=> 'required',
            'inputs.*.weight'=> 'required',
            'inputs.*.max_value'=> 'required',
            'inputs.*.type'=> 'required',
        ],
        [
            'inputs.*.name.required'=> 'name field is required',
            'inputs.*.weight.required'=> 'weight field is required',
            'inputs.*.max_value.required'=> 'max value field is required',
            'inputs.*.type.required'=> 'type field is required, please select one',
        ]);

            foreach($this->inputs as  $data)
                {
                        CriteriaModel::create([
                            'project_id' => $this->project,
                            'name' => $data['name'],
                            // 'c_code' => $this->initial.''.$key++,
                            'is_cost' => $data['type'],
                            'weight' => $data['weight'],
                            'max_value' => $data['max_value'],
                        ]);
                }

        $this->emit('openTab', 'alternative');
        $this->reset(['name','type','weight','max_value','inputs']);
        $this->inputs[] = ['name' => '', 'weight' => '', 'max_value' => '', 'type' => ''];
    }

}
