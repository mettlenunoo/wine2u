<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Category;
use App\Page;
use App\shop;

class CustomerLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function clientlogin($country)
    {      

        // SHOP
         $shop = shop::WHERE('country', '=', $country)->firstorfail();
         $this->shop_id = $shop->id;
      
         Session::put('currency', $shop->currency);
         Session::put('shopCountry', $shop->country);

         // ALL SHOP FOR MENU
         $shops = shop::WHERE('status', '=', 'Approved')->orderby('country','ASC')->get();
        
          //  CATEGORIES
          $categories = Category::WHERE('publish',  "Yes")->WHERE('parent', '=', 0)->WHERE('country_id', '=',$this->shop_id)->orderBy('position', 'ASC')->get();
          $sub_categories = Category::WHERE('publish',  "Yes")->WHERE('parent', '!=', 0)->WHERE('country_id', '=',$this->shop_id)->get();

          $today = now();
          $pg = Page::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shop_id)->orderBy('created_at', 'ASC')->get();
       
          return view('frontend.login',compact('categories','sub_categories','shop','shops', 'pg'));
    
    }


    public function userLogin(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/'.strtolower(session()->get('shopCountry')).'/account');
        }
        return back()->withInput($request->only('email', 'remember'))->with('error','Incorrect Username or Password. Please try again.');
    }


    public function checkoutUserLogin(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/'.strtolower(session()->get('shopCountry')).'/checkout');
        }

        return back()->withInput($request->only('email', 'remember'))->with('error','Incorrect Username or Password. Please try again.');
    }




    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/'.strtolower(session()->get('shopCountry')).'/user/login');
    }

}
