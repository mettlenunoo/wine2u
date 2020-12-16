<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Cart;
use App\Blog;
use App\Category;
use App\Product;
use App\VariableProduct;
use App\Attribute;
use App\Shippingrate;
use App\Shippingcountry;
use App\Customer;
use App\Shipping;
use App\Order;
use App\OrderProduct;
use App\shop;
use App\Page;

class customerContoller extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function profile() 
    {
        $profile =  auth('customer')->user();
        //dd($profile);
        $profile = $profile->load(['shipping','wishListProduct','orders']);
        return view("pages.profile",compact('profile'));
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }


    
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index($country)
    // {
    //      // SHOP
    //      $shop = shop::WHERE('country', '=', $country)->firstorfail();
    //      $this->shop_id = $shop->id;
    //      Session::put('currency', $shop->currency);
    //      // ALL SHOP FOR MENU
    //      $shops = shop::WHERE('status', '=', 'Approved')->orderby('country','ASC')->get();

    //      //  CATEGORIES
    //      $categories = Category::WHERE('publish',  "Yes")->WHERE('parent', '=', 0)->WHERE('country_id', '=', $this->shop_id)->orderBy('position', 'ASC')->get();
    //      $sub_categories = Category::WHERE('publish',  "Yes")->WHERE('parent', '!=', 0)->WHERE('country_id', '=', $this->shop_id)->get();

    //      // PAGE
    //      $today = now();
    //      $pg = Page::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shop_id)->orderBy('created_at', 'ASC')->get(); 


    //      return view('frontend.account',compact('categories','sub_categories','shop','shops','pg'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
        
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($country)
    // {
    //      // SHOP
    //      $shop = shop::WHERE('country', '=', $country)->firstorfail();
    //      $this->shop_id = $shop->id;
    //      Session::put('currency', $shop->currency);
    //      // ALL SHOP FOR MENU
    //      $shops = shop::WHERE('status', '=', 'Approved')->orderby('country','ASC')->get();

    //     //  CATEGORIES
    //     $categories = Category::WHERE('publish',  "Yes")->WHERE('parent', '=', 0)->WHERE('country_id', '=', $this->shop_id)->orderBy('position', 'ASC')->get();
    //     $sub_categories = Category::WHERE('publish',  "Yes")->WHERE('parent', '!=', 0)->WHERE('country_id', '=', $this->shop_id)->get();

    //        // PAGE
    //        $today = now();
    //        $pg = Page::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shop_id)->orderBy('created_at', 'ASC')->get(); 
  
    //      return view('frontend.edit-account',compact('categories','sub_categories','shop','shops','pg'));
       
    // }

    //     /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function editShow($country)
    // {  
    //       // SHOP
    //       $shop = shop::WHERE('country', '=', $country)->firstorfail();
    //       $this->shop_id = $shop->id;
    //       Session::put('currency', $shop->currency);
    //       // ALL SHOP FOR MENU
    //       $shops = shop::WHERE('status', '=', 'Approved')->orderby('country','ASC')->get();

    //      //  CATEGORIES
    //      $categories = Category::WHERE('publish',  "Yes")->WHERE('parent', '=', 0)->WHERE('country_id', '=', $this->shop_id)->orderBy('position', 'ASC')->get();
    //      $sub_categories = Category::WHERE('publish',  "Yes")->WHERE('parent', '!=', 0)->WHERE('country_id', '=', $this->shop_id)->get();

    //        // PAGE
    //        $today = now();
    //        $pg = Page::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shop_id)->orderBy('created_at', 'ASC')->get(); 

    //      return view('frontend.edit-account',compact('categories','sub_categories','shop','shops','pg'));
       
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request)
    // {
       

     
    // }

    //  /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show_orders($country)
    // {
    //      // SHOP
    //      $shop = shop::WHERE('country', '=', $country)->firstorfail();
    //      $this->shop_id = $shop->id;
    //      Session::put('currency', $shop->currency);
    //      // ALL SHOP FOR MENU
    //      $shops = shop::WHERE('status', '=', 'Approved')->orderby('country','ASC')->get();

    //     //  CATEGORIES
    //     $categories = Category::WHERE('publish',  "Yes")->WHERE('parent', '=', 0)->WHERE('country_id', '=', $this->shop_id)->orderBy('position', 'ASC')->get();
    //     $sub_categories = Category::WHERE('publish',  "Yes")->WHERE('parent', '!=', 0)->WHERE('country_id', '=', $this->shop_id)->get();

    //      $orders = Order::WHERE('customer_id', auth('customer')->user()->id)->get();

    //        // PAGE
    //        $today = now();
    //        $pg = Page::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shop_id)->orderBy('created_at', 'ASC')->get(); 
  
    //     return view('frontend.orders',compact('categories','sub_categories','orders','shop','shops','pg'));
      
    
    // }


    //  /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function updateProfile(Request $request)
    // {
    //     //
      
    //     $customer = Customer::find(auth('customer')->user()->id);
    //     $customer->fname = $request->input('fname');
    //     $customer->lname = $request->input('lname');
    //     $customer->email = $request->input('email');
    //     $customer->phone = $request->input('phonenumber');
    //     $customer->country = $request->input('country');
    //     $customer->address = $request->input('street');
    //     $customer->apartment = $request->input('apartment');
    //     $customer->city = $request->input('city');
    //     $customer->state = $request->input('state');
    //     $customer->zip = $request->input('zip');
    //     // SAVE
    //     $customer->save();

    //     return redirect("/".$request->input('shop')."/account");

    
    // }


    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }

    // public function logout()
    // {
    //     Auth::guard('customer')->logout();
    //     return redirect('/');
    // }
}
