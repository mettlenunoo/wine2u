<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
use Session;
use App\Category;
use App\Customer;
use App\shop;
use App\Page;


class forgotten_password extends Controller
{
    

    public function reset_link(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
             // 'password' => 'required|min:6'
        ]);
       
        $customer = Customer::WHERE('email', '=', $request->email)->first();

        if($customer == null){
           
            return back()->withInput($request->only('email'))->with("error","Email Doesn't Exist");

        }else {
          
             // ####################   EMAIL ###############################
                $token = $customer->remembertoken;
                $fullname =  $customer->fname." ".$customer->lname;
                $toEmail = $customer->email;

                \Mail::send('mail.resetpassword',array('token' => $token, 'fullname' => $fullname, 'country' => $request->input('country')), function($message) use ($toEmail){
                $message->to($toEmail,'Password Reset link from hvafrica.com')->subject('Password Reset link from hvafrica.com')->from('info@hvafrica.com','Hvafrica - Password Reset link');
                });
        
               return back()->with("status","We have E-mailed your Password reset link");
            
        }

    }


 
    public function forgottenPassword($country)
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
  
          return view('frontend.forgotten_password',compact('categories','sub_categories','shop','shops','pg'));
    
    }
   

   
    public function reset_password($country, $token)
    {    
        // check token B4
        $customer = Customer::WHERE('remembertoken', '=', $token)->first();

        if($customer != null){

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
  
       
          return view('frontend.resetpassword',compact('categories','sub_categories','shop','shops','token', 'pg'));

        }else{

            return view('errors.404');
        }
    
    }

    public function change_passwod(Request $request)
    {
       
        $this->validate($request, [
            'token' => 'required',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        
        $customer = Customer::WHERE('remembertoken', '=', $request->token)->first();

        if($customer == null){
           
            return back()->with("error","Invalid reset token");

        } else {
          
             $customer = Customer::find($customer->id);
             $customer->remembertoken = str_slug(Hash::make($request->email.time()));
             $customer->password = Hash::make($request->password);
             $customer->save();

             return redirect()->intended('/'.strtolower(session()->get('shopCountry')).'/user/login');
            
        }

    }


}
