<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function criterias()
    {
        return $this->belongsToMany(Criteria::class)->withPivot('value');
    }
    public function rangking()
    {
        return $this->hasOne(Rangking::class);
    }
    public function getValueAttribute($key)
    {
        return $this->criterias()->wpivot->value;
    }
}
