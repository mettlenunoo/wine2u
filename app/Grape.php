<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grape extends Model
{
    public function subGrapes()
    {
        return $this->hasMany(Grape::class, 'parent', 'id');
    }
}
