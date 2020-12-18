<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Str;
use Hash;
use Auth;
use App\Customer;

class socialiteController extends Controller
{
       
    public function facebook_Callback(){

        return Socialite::driver('facebook')->redirect();
    }

    public function facebook_redirect(){

      $user = Socialite::driver('facebook')->user();
        $user = Customer::firstorCreate([

            'email' => $user->email

        ],[
            'fname' => $user->name,
            'password' => Hash::make(Str::random(24))

        ]);

       // Auth::login($user, true);

        Auth::guard('customer')->login($user, true);
        return redirect()->intended('/account');

    }


    public function google_Callback(){

        return Socialite::driver('google')->redirect();
    }

    public function google_redirect(){

      $user = Socialite::driver('google')->user();
        $user = Customer::firstorCreate([

            'email' => $user->email

        ],[
            'fname' => $user->name,
            'password' => Hash::make(Str::random(24))

        ]);

       // Auth::login($user, true);

        Auth::guard('customer')->login($user, true);
        return redirect()->intended('/account');

    }
}
