<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function subOffers()
    {
        return $this->hasMany(Offer::class, 'parent', 'id');
    }
}
