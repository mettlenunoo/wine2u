<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    
  
    /**
     *  Get the posts relationship.
     *
     *  @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent', 'id');
    }

    
    /**
     * Get the topic relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variableProduct(): HasMany
    {
       // return $this->hasMany('App\VariableProduct', 'product_id', 'id')->where('quantity', '>', '0');
        return $this->hasMany('App\VariableProduct', 'product_id', 'id');

    }

    public function variableProductSingle(): HasOne
    {
        return $this->hasOne('App\VariableProduct', 'product_id', 'id')->where('quantity', '>', '0')->orderby('regular_price','ASC');
    }


      /**
     * Get the posts relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function CategoryProducts()
    {
        $curDateTime = date("Y-m-d H:i:s");
        return $this->hasMany(Product::class, 'category', 'id')->WHERE('visibility',  "public")->WHERE('publish', '<=', $curDateTime)->with('variableProductSingle');
    }

    // public function subCategories()
    // {
    //     return $this->cat()->with('subCategories')->ORDERBY('position','asc');
    // }


    // public function subCategories()
    // {
    //     return $this->cat()->with('CategoryProducts')->ORDERBY('position','asc');
    // }

     //    FOR RECURSIVE CATEGORY
    public function subCategoriesoLD()
    {
        return $this->cat()->with('subCategories')->with('CategoryProducts')->ORDERBY('position','asc');
    }


    public function products(){

        return $this->belongsTo('App\Product')->with('variableProductAttributes');

    }

    public function variableProductAttributes()
    {
        return $this->variableProduct()->with('attribute');
    }

//     public function categories()
// {
//     return $this->belongsToMany('App\Category');
// }
  

}
