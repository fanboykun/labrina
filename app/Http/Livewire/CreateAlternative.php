<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Alternative as LivewireAlternative;
use LivewireUI\Modal\ModalComponent;
use App\Models\Alternative;

class CreateAlternative extends ModalComponent
{
    // property
    public $alternative_id;
    public $altname;
    public $criterias = [];
    public $criteria_data;
    public $project_id;

    protected $rules = [
    'altname'=> 'required',
    'criterias.*.criteria_id' => 'required',
    'criterias.*.value' => 'required|numeric',];

    protected $messages = [
        'altname.required'=> 'name is required',
        'criterias.*.criteria_id.required'=> 'sorry but something wrong',
        'criterias.*.value.required'=> 'value is required',
        'criterias.*.value.numeric'=> 'value must be a numeric',
    ];

    public function mount(Alternative $alternative ,int $project, array $criteria_data = [])
    {
        if ($alternative->exists) {
            $this->project_id = $project;
            $alternative->load('criterias');
            $this->alternative_id = $alternative->id;
            $this->altname = $alternative->name;
            $this->criteria_data = $alternative->criterias;
            foreach ($this->criteria_data as $key => $criteria) {
                $this->criterias[$key] =['criteria_id' => $criteria->id, 'value' => $criteria->pivot->value];
            }
        }else{
            $this->alternative_id = $alternative->id;
            $this->project_id = $project;
            $this->criteria_data = $criteria_data;
            foreach ($this->criteria_data as $key => $criteria) {
                $this->criterias[$key] =['criteria_id' => $criteria['id'], 'value' => ''];
            }
        }
    }

    public function render()
    {
        return view('livewire.create-alternative');
    }

    public function saveAlternative()
    {
        $this->validate();
        $alternative =  Alternative::updateOrCreate([
            'id' => $this->alternative_id,
            'project_id' => $this->project_id,
        ],[
            'name' => $this->altname,
        ]);
        if($alternative->wasRecentlyCreated){
            foreach ($this->criterias as $criteria) {
                $alternative->criterias()->attach($criteria['criteria_id'], ['project_id' => $this->project_id, 'value' => $criteria['value']]);
            }
        }else{
            foreach ($this->criterias as $criteria) {
                $alternative->criterias()->updateExistingPivot($criteria['criteria_id'], ['project_id' => $this->project_id, 'value' => $criteria['value']]);
            }
        }
        $this->reset(['altname','criterias']);
        $this->closeModalWithEvents([
            LivewireAlternative::getName() => 'alternativeSaved'
        ]);
    }
}
