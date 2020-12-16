<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    public function blogs()
    {

        return $this->belongsToMany('App\Blog')->withTimestamps();

    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent', 'id');
    }
}
