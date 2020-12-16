<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Category;
use App\shop;
use App\Customer;
use App\Order;

USE DB;



class customersController extends Controller
{

   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
  
    public function index()
    {
         // SHOP ID
        $shopId = Session::get('shopId');
         // CUSTOMER FOR SPECIFIC COUNTRY
        $customers = Customer::WHERE('shop_id', $shopId)->with('orders')->get();
         //###################  PAGE NAME #########################
         $page = "all_customers";
             //###################  ALL SHOPS #########################
        $allShops = shop::all();

        return view('admin.customer.index',compact('customers','page','allShops'));
    }


    public function orders($customer_id)
    {
        //  // SHOP ID
        //  $shopId = Session::get('shopId');

        
         // today's Date 
         $today = date("Y-m-d");
        //all transactions
        $trans = Order::whereDate('created_at', $today)->WHERE('customer_id', $customer_id)->get();

        //today's transactions
       
        // sql Statement
        $t_trans = Order::whereDate('created_at', $today)->WHERE('customer_id', $customer_id)->get();

         #############   Week's transactions  ############
        // Week's Date 
        $today = getdate();
        $curMonth =  date("m");
        $weekStartDate = $today['mday'] - $today['wday'];
        $weekEndDate = $today['mday'] - $today['wday']+6;
        // sql statement
        $w_trans = Order::whereMonth('created_at', '=', $curMonth)->whereDay('created_at', '>=' ,$weekStartDate)->whereDay('created_at', '<=' ,$weekEndDate)->WHERE('customer_id', $customer_id)->get();

        ############   MONTH TRANSACTION ####################
        $curMonth =  date("m");
        $m_trans = Order::whereMonth('created_at', '=', $curMonth)->WHERE('customer_id', $customer_id)->get();

         ############   YEAR TRANSACTION ####################
         $curyear =  date("Y");
         $y_trans = Order::whereYear('created_at', '=', $curyear)->WHERE('customer_id', $customer_id)->get();

         // CUSTOMER FOR SPECIFIC COUNTRY

         $customer = Customer::WHERE('id', $customer_id)->with('orders')->first();

         //###################  PAGE NAME #########################
         $page = "all_customers";

         //###################  ALL SHOPS #########################
         $allShops = shop::all();
         

        return view('admin.customer.orders',compact('trans','t_trans','w_trans','m_trans','y_trans','customer','page','allShops'));
    }



   
}
