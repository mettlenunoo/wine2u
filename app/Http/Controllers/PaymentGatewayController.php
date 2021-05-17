<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\shop;
use App\Models\PaymentGateway;

class PaymentGatewayController extends Controller
{

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

         $shopId = Session::get('shopId');
         $paymentGateways = PaymentGateway::WHERE('shop_id','=',$shopId)->get();
         $page = "paymentgateway_tb";
         $allShops = shop::all();
          
         return view('admin.payment_gateway.all',compact('paymentGateways','page','allShops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = "paymentgateway_add";
        $allShops = shop::all();
        return view('admin.payment_gateway.add',compact('page','allShops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
                $shopId = Session::get('shopId');
                $slug = str_slug($request->input('name'));
            
                if ($request->hasFile('logo')) {
                         
                     $image = $request->file('logo');
                     $image_name = $slug."-".time().'.'.$image->getClientOriginalExtension();
                     $destinationPath = public_path('/paymentgateway-logo');
                     $image->move($destinationPath, $image_name);
                     $image_name = "/paymentgateway-logo/".$image_name;
         
                 }else{
  
                     $image_name = "";
                 }
         
        
                $paymentGateway = new PaymentGateway;
                $paymentGateway->name = $request->input('name');
                $paymentGateway->public_key = $request->input('public_key');
                $paymentGateway->secret_key = $request->input('secret_key'); 
                $paymentGateway->currency = $request->input('currency');
                $paymentGateway->url = $request->input('url');
                $paymentGateway->logo =  $image_name; 
                $paymentGateway->status = $request->input('status');
                $paymentGateway->shop_id = $shopId;
                $paymentGateway->save();
           
                $success = 'You Have Added a New record Successfully.';
                $page = "paymentgateway_add";
                $allShops = shop::all();

                return redirect("/admin/payment-gateway");

               // return view('admin.ads.add_ads',compact('success','page','allShops'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paymentGateway = PaymentGateway::find($id);
        $page = "paymentgateway_add";
        $allShops = shop::all();
        return view('admin.payment_gateway.edit',compact('paymentGateway','page','allShops'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paymentGateway = PaymentGateway::find($id);
        $page = "paymentgateway_add";
        $allShops = shop::all();
        return view('admin.payment_gateway.edit',compact('paymentGateway','page','allShops'));
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

            $paymentGateway = PaymentGateway::findorfail($id);

            $slug = str_slug($request->input('name'));
        
            if ($request->hasFile('logo')) {
                    
                $image = $request->file('logo');
                $image_name = $slug."-".time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/paymentgateway-logo');
                $image->move($destinationPath, $image_name);
                $image_name = "/paymentgateway-logo/".$image_name;

                $paymentGateway->logo =  $image_name; 
            }

            $paymentGateway->name = $request->input('name');
            $paymentGateway->public_key = $request->input('public_key');
            $paymentGateway->secret_key = $request->input('secret_key'); 
            $paymentGateway->currency = $request->input('currency');
            $paymentGateway->url = $request->input('url');
            $paymentGateway->status = $request->input('status');
            $paymentGateway->save();
    
            $success = 'You Have Added a New record Successfully.';
            $page = "paymentgateway_add";
            $allShops = shop::all();

            return redirect("/admin/payment-gateway");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $paymentGateway = PaymentGateway::find($id)->delete();
          return back();
    }
}
