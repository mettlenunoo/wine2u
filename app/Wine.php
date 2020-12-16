<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    
    public function subWines()
    {
        return $this->hasMany(Wine::class, 'parent', 'id');
    }
}
