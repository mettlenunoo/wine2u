<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Paymentmethod;
use App\shop;
class paymentMethodController extends Controller
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
        $pay = Paymentmethod::WHERE('shop_id','=',$shopId)->first();
        $page = "payment";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.paymentmethod.edit',compact("pay",'page','allShops'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // SHOP ID
         $shopId = Session::get('shopId');

         $pay = new Paymentmethod;
         $pay->rave = $request->input('rave');
         $pay->rave_api = $request->input('rave_api_key');
         $pay->paypal = $request->input('paypal');
         $pay->paypal_api = $request->input('paypal_api_key');
         $pay->cash_on_delivery = $request->input('cash');
         $pay->shop_id = $shopId;
         // SAVE
         $pay->save();
          //###################  ALL SHOPS #########################
          $allShops = shop::all();
         return view('admin.paymentmethod.index')->with(['success' => 'Added Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $shopId = Session::get('shopId');
        $pay = Paymentmethod::WHERE('shop_id','=',$shopId)->first();
        $page = "payment";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.paymentmethod.edit',compact("pay","page",'allShops'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shopId = Session::get('shopId');
        $pay = Paymentmethod::WHERE('shop_id','=',$shopId)->first();
        $page = "payment";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.paymentmethod.edit',compact("pay","page",'allShops'));
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
          $pay = Paymentmethod::find($id);
          $pay->rave = $request->input('rave');
          $pay->rave_api = $request->input('rave_api_key');
          $pay->paypal = $request->input('paypal');
          $pay->paypal_api = $request->input('paypal_api_key');
          $pay->cash_on_delivery = $request->input('cash');
          
          $pay->hubtel = $request->input('hubtel');
          $pay->hubtel_api = $request->input('hubtel_api_key');
          $pay->express_pay = $request->input('expresspay');
          $pay->expresspay_api = $request->input('expresspay_api_key');
          // SAVE
          $pay->save();


          $shopId = Session::get('shopId');
          $pay = Paymentmethod::WHERE('shop_id','=',$shopId)->first();
          $page = "payment";

          $success = 'Updated Successfully.';
           //###################  ALL SHOPS #########################
            $allShops = shop::all();
          return view('admin.paymentmethod.edit',compact("success","pay","page",'allShops'));
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
}
