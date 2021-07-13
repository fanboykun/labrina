<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function criterias()
    {
        return $this->hasMany(Criteria::class);
    }

    public function alternatives()
    {
        return $this->hasMany(Alternative::class);
    }
    public function rangkings()
    {
        return $this->hasMany(Rangking::class);
    }
}
