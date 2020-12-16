<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Shippingrate;
use Session;
use App\shop;
USE DB;

class shippingController extends Controller
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
         //
         $rates = Shippingrate::WHERE('country_id','=',$shopId)->get();
         //###################  PAGE NAME #########################
         $page = "shipping_rate";
          //###################  ALL SHOPS #########################
          $allShops = shop::all();
        return view('admin.shipping.shipping_rate',compact('rates','page','allShops'));
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

        try{
             // SHOP ID
              $shopId = Session::get('shopId');
            
            //BING PARAM

                $rate = new Shippingrate;
                $rate->kg = $request->input('kg');
                $rate->zone1 = $request->input('zone1');
                $rate->zone2 = $request->input('zone2'); 
                $rate->zone3 = $request->input('zone3');
                $rate->zone4 = $request->input('zone4');
                $rate->zone5 = $request->input('zone5'); 
                $rate->zone6 = $request->input('zone6');
                $rate->zone7 = $request->input('zone7');
                $rate->zone8 = $request->input('zone8'); 
                $rate->type = $request->input('type');
                $rate->publish = $request->input('publish');
              //  $rate->country_id = $request->input('country_id');
                $rate->country_id = $shopId;

            // SAVE
               $rate->save();
          
        // $parent = Category::WHERE('parent', 0)->get();
               $rates = Shippingrate::WHERE('country_id','=',$shopId)->get();
               $success = 'You Have Added a new Rate Successfully .';
                //###################  PAGE NAME #########################
                $page = "shipping_rate";
                 //###################  ALL SHOPS #########################
                 $allShops = shop::all();
               return view('admin.shipping.shipping_rate',compact('success','rates','page','allShops'));
    
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
    {    // SHOP ID
        $shopId = Session::get('shopId');
        //
        $rate = Shippingrate::find($id);
        $rates = Shippingrate::WHERE('country_id','=',$shopId)->get();
         //###################  PAGE NAME #########################
         $page = "edit_shipping_rate";
          //###################  ALL SHOPS #########################
          $allShops = shop::all();
        return view('admin.shipping.edit_shipping_rate',compact('rates','rate','page','allShops'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          // SHOP ID
          $shopId = Session::get('shopId');

         $rate = Shippingrate::find($id);
         $rates = Shippingrate::WHERE('country_id','=',$shopId)->get();
        //###################  PAGE NAME #########################
         $page = "edit_shipping_rate";
          //###################  ALL SHOPS #########################
          $allShops = shop::all();
         return view('admin.shipping.edit_shipping_rate',compact('rates','rate','page','allShops'));
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

        try{
             // SHOP ID
             $shopId = Session::get('shopId');
            
            //BING PARAM

                $rate =  Shippingrate::find($id);
                $rate->kg = $request->input('kg');
                $rate->zone1 = $request->input('zone1');
                $rate->zone2 = $request->input('zone2'); 
                $rate->zone3 = $request->input('zone3');
                $rate->zone4 = $request->input('zone4');
                $rate->zone5 = $request->input('zone5'); 
                $rate->zone6 = $request->input('zone6');
                $rate->zone7 = $request->input('zone7');
                $rate->zone8 = $request->input('zone8'); 
                $rate->type = $request->input('type');
                $rate->publish = $request->input('publish');
                $rate->country_id = $shopId;

            // SAVE
               $rate->save();
          
               $rate = Shippingrate::find($id);
               $rates = Shippingrate::WHERE('country_id','=',$shopId)->get();
               $success = 'Updated  Successfully .';
               //###################  PAGE NAME #########################
               $page = "edit_shipping_rate";
                //###################  ALL SHOPS #########################
               $allShops = shop::all();
               return view('admin.shipping.edit_shipping_rate',compact('success','rates','rate','page','allShops'));
    
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
              // SHOP ID
              $shopId = Session::get('shopId');
            $rate = Shippingrate::find($id)->delete();
             // AFTER DELETE
             $rates = Shippingrate::WHERE('country_id','=',$shopId)->get();
             $success = 'Deleted Successfully';
              //###################  PAGE NAME #########################
              $page = "shipping_rate";
               //###################  ALL SHOPS #########################
               $allShops = shop::all();
             return view('admin.shipping.shipping_rate',compact('success','rates','page','allShops'));
    
        }catch(\Exception $e) {
          return $e->getMessage();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAll()
    {
        try{
             // SHOP ID
             $shopId = Session::get('shopId');
             //$rate = Shippingrate::truncate();
             $rate = Shippingrate::WHERE('country_id','=',$shopId)->delete();
             // AFTER DELETE
             $rates = Shippingrate::WHERE('country_id','=',$shopId)->get();
             $success = 'Deleted Successfully';
              //###################  PAGE NAME #########################
              $page = "shipping_rate";
               //###################  ALL SHOPS #########################
             $allShops = shop::all();
             return view('admin.shipping.shipping_rate',compact('success','rates','page','allShops'));
    
        }catch(\Exception $e) {
          return $e->getMessage();
        }
    }



    public function importfromexcel(Request $request)
    {
        try{
               // SHOP ID
              $shopId = Session::get('shopId');

              $num = 0; // to avoid insert the file header 

            if ($request->hasFile('rate')) {
                    $filename = $request->file('rate')->getPathName();
                    if( $request->file('rate')->getSize() > 0)
                    {
                        $file = fopen($filename, "r");
                         while(($emapData = fgetcsv($file, 10000, ",")) !== FALSE){
                            
                            if($num != 0){  // to skip file header

                                $rate = new Shippingrate;
                                $rate->kg = $emapData['0'];
                                $rate->zone1 = $emapData['1'];
                                $rate->zone2 = $emapData['2'];
                                $rate->zone3 = $emapData['3'];
                                $rate->zone4 = $emapData['4'];
                                $rate->zone5 = $emapData['5']; 
                                $rate->zone6 = $emapData['6'];
                                $rate->zone7 = $emapData['7'];
                                $rate->zone8 = $emapData['8'];
                                $rate->type = $request->input('type');
                                $rate->publish = "Yes";
                                $rate->country_id = $shopId;
                                 // SAVE
                                $rate->save();
                            }
                          $num++;
                        }
                    }
                     // AFTER IMPORT
                     $rates = Shippingrate::WHERE('country_id','=',$shopId)->get();
                     $success = 'Imported  Succefully .';
                     //###################  PAGE NAME #########################
                      $page = "shipping_rate";
                       //###################  ALL SHOPS #########################
                      $allShops = shop::all();
                     return view('admin.shipping.shipping_rate',compact('success','rates','page','allShops'));
                }
        }catch(\Exception $e) {
         return $e->getMessage();
       }
     }
   
   
    

}
