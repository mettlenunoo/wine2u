<?php

namespace App\Models;
use App\User;
use App\Customer;
use Illuminate\Database\Eloquent\Model;
class LinkedSocialAccount extends Model
{
    protected $fillable = [
        'provider_name',
        'provider_id',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}