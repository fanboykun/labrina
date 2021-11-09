<?php

namespace App\Http\Livewire;
use App\Models\Criteria as CriteriaModel;
use App\Models\Project;
use Livewire\Component;

class Criteria extends Component
{
    // property
    public $criteria_id;
    public $name;
    public $weight;
    public $type;
    public $max_value;
    public $project;
    public $search;

    protected $listeners = [
        'criteriaAdded' => '$refresh',
    ];


    public $inputs = [];

    public function mount(Project $project)
    {
        $this->project = $project->load('criterias');
        $this->inputs[] =
            ['name' => '', 'weight' => '', 'max_value' => '', 'type' => '',];
    }

    public function render()
    {
        if ($this->project->criterias->count() > 0) {
            $criterias = $this->project->criterias->toQuery()->where('name', 'like', '%'.$this->search.'%')->get();
        } else {
            $criterias = [];
        }
        return view('livewire.criteria', ['criterias' => $criterias]);
    }

    public function remove(CriteriaModel $criteria)
    {
        $this->criteria = $criteria;
    }

    public function editCriteria(CriteriaModel $criteria)
    {
        if ($criteria == null){
            return false;
        }

        $this->criteria_id = $criteria->id;
        $this->name = $criteria->name;
        $this->weight = $criteria->weight;
        $this->max_value = $criteria->max_value;
        $this->type = $criteria->is_cost;
    }

    public function addCriteria()
    {
        $this->validate([
            'name'=> 'required',
            'weight'=> 'required',
            'max_value'=> 'required',
            'type'=> 'required',
        ],
        [
            'name.required'=> 'name field is required',
            'weight.required'=> 'weight field is required',
            'max_value.required'=> 'max value field is required',
            'type.required'=> 'type field is required, please select one',
        ]);

        CriteriaModel::updateOrcreate([
            'project_id' => $this->project->id,
            'id' => $this->criteria_id,
        ],[
            'name' => $this->name,
            'is_cost' => $this->type,
            'weight' => $this->weight,
            'max_value' => $this->max_value,
        ]);

        $this->reset(['name','type','weight','max_value']);
        $this->emitSelf('criteriaAdded');
    }

}
