<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pairing extends Model
{
    public function subPairing()
    {
        return $this->hasMany(Pairing::class, 'parent', 'id');
    }

    // public function blog()
    // {

    //     return $this->hasOne('App\Blog','id', 'blog_id')->withTimestamps();

    // }
}
