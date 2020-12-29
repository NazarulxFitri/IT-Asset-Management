<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defect extends Model
{
    protected $guarder = [];
    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
