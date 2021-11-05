<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rangking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function alternative()
    {
        return $this->belongsTo(Alternative::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Project::class);
    }

}
