<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $guarded = [];
    
    public function defects()
    {
        return $this->hasMany(Defect::class);
    }
}
