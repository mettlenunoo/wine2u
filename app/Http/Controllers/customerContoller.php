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
        $profile = $profile->load(['shipping','wishListProduct','orders']);
        return view("pages.profile",compact('profile'));

    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }


    public function userUpdate(Request $request)
    {

        $this->validate($request, [

                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255']
            ],
        );

        $customer = Customer::find(auth('customer')->user()->id);
        //$customer = Customer::find($request->id);
        $customer->fname = $request->input('fname');
        $customer->lname = $request->input('lname');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phonenumber');
        $customer->country = $request->input('country');
        $customer->address = $request->input('street');
        $customer->apartment = $request->input('apartment');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');
        $customer->zip = $request->input('zip');
        $customer->gender = $request->input('gender');
        $customer->dob = $request->input('dob');
    
        // SAVE
        $customer->save();
        
        if( $customer ){

            return ['message' => 'Success'];

        }else{

            return ['message' => 'Error '];

        }


    }


    public function changepassword(Request $request)
    {
        $this->validate($request, [
            'currentpassword' => ['required', 'min:8', 'max:255'],
            'password' => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            [   
                'password.regex' => 'Your password must contain at least one uppercase,one number and one special character -for example: $, #, @, !,%,^,&,*,(,) ',
            ],
        ]);

       $email = auth("customer")->user()->email;

        if (Auth::guard('customer')->attempt(['email' => $email, 'password' => $request->currentpassword], $request->get('remember'))) {
            
            $id = auth("customer")->user()->id;
            $customer = Customer::find($id);
            $customer->password = Hash::make($request->input('password'));
            $customer->save();

            return 'success';

        }else{
            
            return 'Incorrect Current Password';
        }
 
    }


    public function single_order($id){

           $order = Order::with('order_products')->where('tracking_code','=',$id)->first();
           return view('pages.single_order',compact('order'));
   
    }
  
}
