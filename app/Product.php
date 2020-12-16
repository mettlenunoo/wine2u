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
use DB;
use phpseclib\Crypt\Hash;

//use Krossroad\UnionPaginator\UnionPaginatorTrait;


class Product extends Model
{
    
    public $shopId = 1;

    protected $appends = [
        'review_summary'
        //'currency'
        // 'average-rating',
        // 'one-star',
        // 'two-stars',
        // 'three-stars',
        // 'four-stars',
        // 'five-stars'
    ];

    /**
     * Get the topic relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variableProduct()
    {
        return $this->hasMany('App\VariableProduct', 'product_id', 'id');

    //  return $this->hasMany('App\VariableProduct', 'product_id', 'id')->where('quantity', '>', '0');
    }


    public function variableProductAttributes()
    {
        return $this->variableProduct()->with('attribute');
    }

    public function countryRegion()
    {
        return $this->country()->with('countryFrRegion');
    }

    // public function attrib()
    // {
    //     return $this->hasMany(Attribute::class, 'attribute_id', 'id');

    //    //  return $this->hasMany('App\VariableProduct', 'product_id', 'id')->where('quantity', '>', '0');
    // }


    public function categories(): BelongsToMany
    {

        return $this->belongsToMany('App\Category')->withTimestamps();

    }

    public function wines(): BelongsToMany
    {

        return $this->belongsToMany('App\Wine')->withTimestamps();

    }

    public function brands(): BelongsToMany
    {

        return $this->belongsToMany('App\Models\Brand')->withTimestamps();

    }

    public function brand()
    {

        return $this->belongsToMany('App\Models\Brand')->withTimestamps();

    }


    public function offers(): BelongsToMany
    {

        return $this->belongsToMany('App\Offer')->withTimestamps();

    }

    public function grapes(): BelongsToMany
    {

        return $this->belongsToMany('App\Grape')->withTimestamps();

    }

    public function pairing(): BelongsToMany
    {

        return $this->belongsToMany('App\Pairing')->withTimestamps();

    }

    public function country(): BelongsToMany
    {

        return $this->belongsToMany('App\Country')->withTimestamps();

    }

    public function reviews()
    {
        return $this->belongsToMany('App\Customer', 'App\Review')->using('App\Review')->withPivot('rating', 'comment','created_at');
    }


    public function rating()
    {
        return $this->hasMany('App\Review', 'product_id', 'id');
    }

    public function getReviewSummaryAttribute()
    {
       return $myObj = (object) [

            'average_rating' => round($this->rating()->avg('rating'),1),
            'one_star' => $this->rating()->where('rating',1)->count('rating'),
            'two_stars' => $this->rating()->where('rating',2)->count('rating'),
            'three_stars' => $this->rating()->where('rating',3)->count('rating'),
            'four_stars'  => $this->rating()->where('rating',4)->count('rating'),
            'five_stars' => $this->rating()->where('rating',5)->count('rating'),
            'total_rating' => round($this->rating()->sum('rating'),1)
        ];

        return $myObj;
    }

    
    // function getCurrencyAttribute(){

    //     $shop = \App\shop::WHERE('id', '=', $this->shopId)->WHERE('status', '=', 'Approved')->orderby('country','ASC')->first();
    //     return $shop->id;
    // }

    // function getAverageRatingAttribute(){
    //     return round($this->rating()->avg('rating'),1);
    // }

    // function getOneStarAttribute(){
    //     return $this->rating()->where('rating',1)->count('rating');
    // }

    // function getTwoStarsAttribute(){
    //     return $this->rating()->where('rating',2)->count('rating');
    // }

    // function getThreeStarsAttribute(){
    //     return $this->rating()->where('rating',3)->count('rating');
    // }

    // function getFourStarsAttribute(){
    //     return $this->rating()->where('rating',4)->count('rating');
    // }

    // function getFiveStarsAttribute(){
    //     return $this->rating()->where('rating',5)->count('rating');
    // }


    public function blogs(): BelongsToMany
    {

        return $this->belongsToMany('App\Blog')->withTimestamps();

    }

    public function gallery()
    {

        return $this->hasMany('App\Gallery_product', 'product_id', 'id');;

    }

    


    // public function reviews(): BelongsToMany
    // {

    //     return $this->belongsToMany('App\Review');

    // }



    /**
     * Get the posts relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function CategoryProducts()
    {
        return $this->hasMany(Product::class, 'parent', 'id');
    }


     /**
     * Get the topic relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productGallery(): HasMany
    {
        return $this->hasMany('App\ProductGallery', 'product_id', 'id');
    }

    public function productNote(): HasOne
    {
        return $this->hasOne('App\Note', 'product_id', 'id');
    }

   
    // public function attributes($query){

    //     return $query->join('attributes','variable_products.attribute_id','attributes.id')
    //     ->select(
    //         'attributes.id'

    //         // 'products.id',
    //         // 'products.product_name',
    //         // 'products.slug',
    //         // 'products.img1',
    //         // 'products.img2',
    //         // 'products.created_at',
            
    //         // 'variable_products.id',
    //         // 'variable_products.regular_price',
    //         // 'variable_products.sale_price',
    //         // 'variable_products.quantity',
    //         // 'variable_products.stock',
    //         // 'variable_products.weight'
    //     );
        
    //     // ->join('signatures','signatures.establishment_id','=','establishments.id')
    //     //     ->selectRaw('establishments.*, count(signatures.id) as count')->where('establishments.verified','=','true')->groupBy('establishments.id');
    // }

     /**
     * Get the topic relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variableProductSingle(): HasOne
    {
        return $this->hasOne('App\VariableProduct', 'product_id', 'id')->where('quantity', '>', '0')->orderby('regular_price','ASC');
    }


    public function scopevariableProd($query){

         $query->join('variable_products','variable_products.product_id','products.id')
        ->join('attributes', 'attributes.id', '=', 'variable_products.attribute_id')
        ->select(

            'products.id as productID',
            'products.product_name',
            'products.slug',
            'products.img1',
            'products.img2',
            'products.created_at',
            'products.description',
            'products.visibility',
            'products.publish',
            'products.category',
            'products.country_id',

            'variable_products.id',
            'variable_products.attribute_id',
            'variable_products.regular_price',
            'variable_products.sale_price',
            'variable_products.quantity',
            'variable_products.stock',
            'variable_products.weight',

            // attribute
            'attributes.title'
        );
        
        // ->join('signatures','signatures.establishment_id','=','establishments.id')
        //     ->selectRaw('establishments.*, count(signatures.id) as count')->where('establishments.verified','=','true')->groupBy('establishments.id');
    }




    // PRODUCT FILTER

    public function scopeSearch($query,$search)
    {
        if(!Empty($search)){
            return $query->where('product_name', 'like', '%'.$search.'%');
        }
        return $query;
    }


    public function scopeSearchSlug($query,$slug)
    {
        if(!Empty($slug)){
            return $query->where('slug', '=', $slug);
        }

        return $query;
    }

    public function scopeFee($query,$fee)
    {
        if(!Empty($fee)){
            return $query->where('fee_id',$fee);
        }
        return $query;
    }

    public function scopeRecency($query,$recency)
    {
        if(!Empty($recency)){
            $cutoff = Carbon::now()->subDays($recency)->format('Y-m-d');
            return $query->where('updated_at','>',$cutoff);
        }
        return $query;
    }

    public function customer()
    {
        return $this->belongsTo('App\Product')->using('App\Review')->withTimestamps();
    }



}
