<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\Pivot;
// use Illuminate\Database\Eloquent\Relations\MorphPivot;
// use Illuminate\Database\Eloquent\Model;

class Review extends Pivot
{

    protected $table = 'reviews';
    // public function product()
    // {
    //     return $this->belongsTo(Product::class)->using('App\Review');
    // }

    public function customer()
    {
        return $this->belongsTo(Customer::class)->using('App\Review');
    }

    public function review_customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
       // return $this->belongsTo(Customer::class);
    }

    // public function customer()
    // {
    //     return $this->has(Customer::class)->using('App\Review');
    // }

    // public function product()
    // {
    //     return $this->belongsToMany('App\Product')->using('App\Review')->withTimestamps();
    // }

}
