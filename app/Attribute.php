<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
      /**
     * Get the posts relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function parentAttribute()
    {
        return $this->hasOne(Attribute::class, 'id', 'parent');
    }

    public function subAttributes()
    {
        return $this->hasMany(Attribute::class, 'parent', 'id');
    }
}
