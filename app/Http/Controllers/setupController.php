<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\shop;
use App\Paymentmethod;
use DB;

class setupController extends Controller
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
        $shops = shop::all();
        //###################  PAGE NAME #########################
        $page = "shop_tb";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.setup.shop_tb',compact('shops','page','allShops'));
    }

    /**
     * Show the form for creating a new resource.
     *uo
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         //###################  PAGE NAME #########################
         $page = "setup_shop";
          //###################  ALL SHOPS #########################
          $allShops = shop::all();
        return view('admin.setup.setup_shop',compact('page','allShops'));
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
        try{
          
            // SLUG
                $slug = str_slug($request->input('shop_name'));
            // END OF SLUG

            // IMAGE PROCESSOR
                if ($request->hasFile('pic')) {
                        
                    $image = $request->file('pic');
                    $image_name = $slug.'-'.time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/shop_logos');
                    $image->move($destinationPath, $image_name);
        
                }else{

                    $image_name = "";
                }
        
           // END  IMAGE PROCESSOR
            
            //BING PARAM

                $shop = new shop;
                $shop->shop_name = $request->input('shop_name');
                $shop->country = $request->input('country');
                $shop->address_1 = $request->input('address'); 
                $shop->address_2 = $request->input('address_2');
                $shop->city = $request->input('city');
                $shop->postcode_zip = $request->input('postcode_zip');
                $shop->currency = $request->input('currency'); 
                $shop->type_0f_shop = $request->input('type_0f_shop');
                $shop->logo =  $image_name;
                $shop->type_0f_shop = $request->input('selling_product');
                $shop->status = $request->input('status');
                $shop->tax = $request->input('tax');

            //END BING PARAM

            // SAVE
              $shop->save();

             $selectedShop =  shop::WHERE('logo', $image_name)->first();
             $id = $selectedShop->id;

              //  PAYMENT METHOD
                $pay = new Paymentmethod;
                $pay->rave = "No";
                $pay->rave_api = "";
                $pay->paypal = "No";
                $pay->paypal_api = "";
                $pay->cash_on_delivery = "No";
                $pay->shop_id = $id;
                // SAVE
                $pay->save();

            $success = 'You Have Added a  New Shop Successfully .';
            //###################  PAGE NAME #########################
            $page = "setup_shop";
             //###################  ALL SHOPS #########################
             $allShops = shop::all();
            return view('admin.setup.setup_shop',compact('success','page','allShops'));
        
        } catch (\Exception $e) {

         return $e->getMessage();

       // return view('admin.offers.add_offer')->with(['error' => 'Offer Already Exist','vendors' =>  $vendors,'categories' => $categories]);
        // return view('admin.category.categories')->with(['categories' => $categories, 'success' => $e->getMessage()]); ;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $shop = shop::find($id);
         //###################  PAGE NAME #########################
         $page = "edit_shop";
          //###################  ALL SHOPS #########################
          $allShops = shop::all();
         return view('admin.setup.edit_shop',compact('shop','page','allShops'));
    }



     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeShop($id)
    {
         $shop = shop::find($id);
         Session::put('shopId', $shop->id);
         Session::put('shopBanner', $shop->logo);
         Session::put('shopName', $shop->shop_name);
         Session::put('shopCurrency', $shop->currency);
         Session::put('shopTax', $shop->tax);
         Session::put('shopCountry', $shop->country);
         //###################  PAGE NAME #########################
        // $page = "edit_shop";
         return redirect('/admin/dashboard');
        // return view('admin.setup.edit_shop',compact('shop','page'));
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
        $shop = shop::find($id);
         //###################  PAGE NAME #########################
        $page = "edit_shop";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.setup.edit_shop',compact('shop','page','allShops'));
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shopSettings()
    {
        
        // SHOP ID
        $shopId = Session::get('shopId');
        
        $shop = shop::find($shopId);
         //###################  PAGE NAME #########################
        $page = "settings";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.setup.edit_shop',compact('shop','page','allShops'));

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
             $shop = shop::find($id);
          try{
          
            // SLUG
                $slug = str_slug($request->input('shop_name'));
            // END OF SLUG

            // IMAGE PROCESSOR
                if ($request->hasFile('pic')) {
                        
                    $image = $request->file('pic');
                    $image_name = $slug.'-'.time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/shop_logos');
                    $image->move($destinationPath, $image_name);
                    $shop->logo = $image_name ;
                }else{

                    $image_name = "";
                }
        
           // END  IMAGE PROCESSOR
            
            //BING PARAM

                $shop->shop_name = $request->input('shop_name');
                $shop->country = $request->input('country');
                $shop->address_1 = $request->input('address'); 
                $shop->address_2 = $request->input('address_2');
                $shop->city = $request->input('city');
                $shop->postcode_zip = $request->input('postcode_zip');
                $shop->currency = $request->input('currency'); 
                $shop->type_0f_shop = $request->input('type_0f_shop');
                $shop->status = $request->input('status');
                $shop->tax = $request->input('tax');

            //END BING PARAM

            // SAVE
              $shop->save();
          
         // 
            $shop = shop::find($id);
            $success = 'You Have Updated Successfully .';
              //###################  PAGE NAME #########################
            $page = "edit_shop";
             //###################  ALL SHOPS #########################
             $allShops = shop::all();
            return view('admin.setup.edit_shop',compact('success','shop','page','allShops'));
        
        } catch (\Exception $e) {

         return $e->getMessage();

         // return view('admin.offers.add_offer')->with(['error' => 'Offer Already Exist','vendors' =>  $vendors,'categories' => $categories]);
        // return view('admin.category.categories')->with(['categories' => $categories, 'success' => $e->getMessage()]); ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $shop = shop::find($id)->delete();
             // AFTER DELETE
             $shops = shop::all();
             $success = 'Deleted Successfully';
               //###################  PAGE NAME #########################
             $page = "shop_tb";
              //###################  ALL SHOPS #########################
              $allShops = shop::all();
             return view('admin.setup.shop_tb',compact('success','shops','page','allShops'));
        
        }catch(\Exception $e) {
          return $e->getMessage();
        }
    }
}
