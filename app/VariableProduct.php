<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariableProduct extends Model
{
    //
    public function product(){

        return $this->belongsTo('App\Product');

    }

     /**
     * Get the posts relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attribute()
    {
        return $this->hasOne(Attribute::class, 'id', 'attribute_id')->with('parentAttribute');
    }
}
