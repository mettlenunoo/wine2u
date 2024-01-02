<?php

namespace App\Models;

use App\Product;
use App\Models\FoodPairings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodPairingProduct extends Model
{
    use HasFactory;

    protected $table = 'food_pairing_product';

    public function product()
    {
        return $this->belongsToMany(Product::class, 'food_pairing_product','food_pairing_id','product_id');
    }

    public function foodpairing()
    {
        return $this->belongsToMany(FoodPairings::class, 'food_pairing_product', 'product_id','food_pairing_id');
    }
}
