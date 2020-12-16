<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
       
        'fname',
        'lname',
        'ship_email',
        'customer_id',
        
    ];
}
