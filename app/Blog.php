<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    

    public function products()
    {

        return $this->belongsTo('App\Product')->withTimestamps();

    }

    public function categories()
    {

        return $this->belongsToMany('App\Blogcategory')->withTimestamps();

    }


    public function scopeSearchSlug($query,$slug)
    {
        if(!Empty($slug)){
            return $query->where('slug', '=', $slug);
        }

        return $query;
    }

    public function scopeSearch($query,$title)
    {
        if(!Empty($title)){
            return $query->where('title', 'like', '%'.$title.'%');
        }

        return $query;
    }

    
    
}
