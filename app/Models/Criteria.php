<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function alternatives()
    {
        return $this->belongsToMany(Alternative::class)->withPivot('value');
    }
    public function rangkings()
    {
        return $this->hasMany(Rangking::class);
    }
}
