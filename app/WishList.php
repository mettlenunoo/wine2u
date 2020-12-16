<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\Pivot;
//use Illuminate\Database\Eloquent\Model;

class WishList extends Pivot
{
    protected $table = 'wish_lists';

    public function customer()
    {
        return $this->belongsTo(Customer::class)->using('App\WishList');
    }


}
