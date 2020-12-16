<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function regions()
    {
        return $this->hasMany(Country::class, 'parent', 'id');
    }

    public function countryFrRegion()
    {
        return $this->hasMany(Country::class, 'id', 'parent');
    }

    public function countryRegion()
    {
        return $this->hasone(Country::class, 'id', 'parent');
    }
}
