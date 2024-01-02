<?php

namespace App\Models;

use App\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodPairings extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsToMany(Product::class, 'food_pairing_product', 'food_pairing_id','product_id');
    }
}
