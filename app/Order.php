<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order_products()
    {
        return $this->hasMany('App\orderProduct', 'order_id', 'id')
                ->with('product');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'product_id', 'id');
    }


}
