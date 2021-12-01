<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    public function payment_gateways()
    {
        return $this->hasMany('App\Models\PaymentGateway', 'shop_id', 'id');

    }

    public function payment_methods()
    {
        return $this->hasOne('App\Paymentmethod', 'shop_id', 'id');

    }

    public function shipping_addresses()
    {
        return $this->hasMany('App\Shippingcountry', 'country_id', 'id');
    }
}
