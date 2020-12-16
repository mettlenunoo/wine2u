<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\shop;
use Cookie;


class orderController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SHOP ID
        $shopId = Session::get('shopId');

        //all transactions
        $trans = Order::WHERE('country_id','=',$shopId)->get();

        //today's transactions
        // today's Date 
        $today = date("Y-m-d");
        // sql Statement
        $t_trans = Order::whereDate('created_at', $today)->WHERE('country_id','=',$shopId)->get();

         #############   Week's transactions  ############
        // Week's Date 
        $today = getdate();
        $curMonth =  date("m");
        $weekStartDate = $today['mday'] - $today['wday'];
        $weekEndDate = $today['mday'] - $today['wday']+6;
        // sql statement
        $w_trans = Order::whereMonth('created_at', '=', $curMonth)->whereDay('created_at', '>=' ,$weekStartDate)->whereDay('created_at', '<=' ,$weekEndDate)->WHERE('country_id','=',$shopId)->get();

        ############   MONTH TRANSACTION ####################
        $curMonth =  date("m");
        $m_trans = Order::whereMonth('created_at', '=', $curMonth)->WHERE('country_id','=',$shopId)->get();

         ############   YEAR TRANSACTION ####################
         $curyear =  date("Y");
         $y_trans = Order::whereYear('created_at', '=', $curyear)->WHERE('country_id','=',$shopId)->get();

        //###################  PAGE NAME #########################
         $page = "order";
        //###################  ALL SHOPS #########################
        $allShops = shop::all();
        return view('admin.order.index',compact('trans','t_trans','w_trans','m_trans','y_trans','page','allShops'));
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {

         #####################   SHOP  ##############################

         $shop = shop::WHERE('id', auth()->user()->shop_id)->first();
         if(Session::has('shopId')){
            $shop->id = Session::get('shopId');
         }else{
             
            Session::put('shopId', $shop->id);
            Session::put('shopBanner', $shop->logo);
            Session::put('shopName', $shop->shop_name);
            Session::put('shopCurrency', $shop->currency);
            Session::put('shopCountry', $shop->country);
            Session::put('shopTax', $shop->tax);
            

            // cookies to store the variable for long
            Cookie::queue('shopId', $shop->id,'1576803');
            Cookie::queue('shopBanner', $shop->logo,'1576803');
            Cookie::queue('shopName', $shop->shop_name,'1576803');
            Cookie::queue('shopCurrency', $shop->currency,'1576803');
            Cookie::queue('shopCountry', $shop->country,'1576803');
            Cookie::queue('shopTax', $shop->tax,'1576803');

         }


         // today's Date 
         $today = date("Y-m-d");
        //all transactions
        $trans = Order::whereDate('created_at', $today)->WHERE('country_id','=',$shop->id)->get();

        //today's transactions
       
        // sql Statement
        $t_trans = Order::whereDate('created_at', $today)->WHERE('country_id','=',$shop->id)->get();

         #############   Week's transactions  ############
        // Week's Date 
        $today = getdate();
        $curMonth =  date("m");
        $weekStartDate = $today['mday'] - $today['wday'];
        $weekEndDate = $today['mday'] - $today['wday']+6;
        // sql statement
        $w_trans = Order::whereMonth('created_at', '=', $curMonth)->whereDay('created_at', '>=' ,$weekStartDate)->whereDay('created_at', '<=' ,$weekEndDate)->WHERE('country_id','=',$shop->id)->get();

        ############   MONTH TRANSACTION ####################
        $curMonth =  date("m");
        $m_trans = Order::whereMonth('created_at', '=', $curMonth)->WHERE('country_id','=',$shop->id)->get();

         ############   YEAR TRANSACTION ####################
         $curyear =  date("Y");
         $y_trans = Order::whereYear('created_at', '=', $curyear)->WHERE('country_id','=',$shop->id)->get();
        
         //###################  ALL SHOPS #########################
         $allShops = shop::all();

         //###################  PAGE NAME #########################
         $page = "dashboard";
       
     
        return view('admin.order.dashboard',compact('trans','t_trans','w_trans','m_trans','y_trans','page','allShops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // SHOP ID
         $shopId = Session::get('shopId');
        //
        $order = Order::find($id);
        $orderProduct =  OrderProduct::WHERE('order_id', $id)->get();
        $products =  Product::WHERE('country_id','=',$shopId)->get();
        //###################  PAGE NAME #########################
           $page = "invoice";
        //###################  ALL SHOPS #########################
           $allShops = shop::all();
        
       
        return view('admin.order.invoice',compact('order','orderProduct','products','page','allShops'));

        



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatestatus(Request $request)
    {
       try{
           
            //
            $id = $request->input('OrderID');
            $status = Order::find($id);
            $status->complete_status = $request->input('status');
            // SAVE
            $status->save();
            $success =  "<td><span class='label label-success'><i class='fa fa-check-circle'></i> &nbsp Completed </span> </td>";
            return $success;
        } catch (\Exception $e) {

            return $e->getMessage();//var_dump($request->input('regular'));
        
        }
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateinvoice(Request $request)
    {
       try{
            // SHOP ID
            $shopId = Session::get('shopId');
            //
            $id = $request->input('OrderID');
            $status = Order::find($id);
            $status->complete_status = $request->input('status');
            $status->tracking_code = $request->input('tracking');
            // SAVE
            $status->save();
          
           $order = Order::find($id);
           $orderProduct =  OrderProduct::WHERE('order_id', $id)->get();
           $products =  Product::WHERE('country_id','=',$shopId)->get();
           //###################  PAGE NAME #########################
           $page = "invoice";
              //###################  ALL SHOPS #########################
            $allShops = shop::all();
     
            if($request->input('email_send') == "Yes"){

                // ####################   EMAIL ###############################
                $toEmail = $order->email;
              //  $storeOwner = "info@skingourmetgh.com";
                $storeOwner = "dabdulmanan@gmail.com";
                \Mail::send('mail.email',array('order' => $order, 'orderProduct' => $orderProduct, 'products' => $products), function($message) use ($toEmail,$storeOwner){
                $message->to([$toEmail,$storeOwner],'Order From hvafrica')->subject('Order From hvafrica')->from('info@hvafrica.com','Haute vie - Order');
                });

          
            }
            return \redirect()->back();


        } catch (\Exception $e) {

            return $e->getMessage();//var_dump($request->input('regular'));
        
        }
    }


    
}
