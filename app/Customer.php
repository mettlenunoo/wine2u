<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Models\LinkedSocialAccount;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Customer extends Authenticatable 
{
    //
    use HasApiTokens,Notifiable;
    protected $guard = 'customer';

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
    ];
   
    protected $hidden = [
        'password', 'remembertoken',
    ];


    
    public function orders(): HasMany
    {
        return $this->hasMany('App\Order', 'customer_id', 'id');
    }

    public function product()
    {
        return $this->belongsToMany('App\Product', 'App\Review')->using('App\Review')->withTimestamps();
    }


    public function wishListProduct()
    {
        return $this->belongsToMany('App\Product', 'App\WishList')->using('App\WishList')->withTimestamps();
    }

    public function shipping(): HasMany
    {
        return $this->hasMany('App\Shipping', 'customer_id', 'id');
    }

    public function linkedSocialAccounts()
    {
        return $this->hasMany(LinkedSocialAccount::class);
    }




}
