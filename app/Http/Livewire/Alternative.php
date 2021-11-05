<?php

namespace App\Http\Livewire;

use App\Models\Alternative as AlternativeModel;
use App\Models\Criteria;
use App\Models\Project;
use Livewire\Component;

class Alternative extends Component
{
    // property
    public $name;
    public $a_code = 1;
    public $criterias = [];
    public $project;

    // helper
    public $initial = "A";
    public $inputs = [];
    public $cols;
    public $column = 2;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->cols = Criteria::where('project_id', $project->id)->count() + $this->column;
        $this->criterias = Criteria::where('project_id', $project->id)->get();
        $this->inputs[] =
            ['name' => '', 'criterias' => $this->criterias];
    }

    public function render()
    {
        return view('livewire.alternative');
    }

    public function add()
    {

        $this->a_code++;
        $this->inputs[] =
            ['name' => '', 'criterias' => $this->criterias];
    }

    public function remove($key)
    {
        unset($this->inputs[$key]);
        $this->inputs = array_values($this->inputs);
    }

    public function addAlternative()
    {
        // dd($this->inputs);
        $this->validate([
            'inputs.*.name'=> 'required',
        ],
        [
            'inputs.*.name.required'=> 'name field is required',
        ]);
            foreach($this->inputs as $data)
                {
                      $alternative =  AlternativeModel::create([
                            'project_id' => $this->project->id,
                            'name' => $data['name'],
                            // 'a_code' => $data['a_code'],
                        ]);
                        foreach ($data['criterias'] as $criteria) {
                            $alternative->criterias()->attach($criteria['id'], ['project_id' => $this->project->id, 'value' => $criteria['value']]);
                        }
                }
        $this->reset(['name','inputs']);
        $this->cols = Criteria::count() + $this->column;
        $this->inputs[] =
        ['name' => '', 'criterias' => $this->criterias];
        $this->emit('openTab', 'calculate');

    }
}
