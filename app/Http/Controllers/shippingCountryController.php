<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Shippingcountry;
use Session;
use App\shop;
use DB;

class shippingCountryController extends Controller
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

        $countries = Shippingcountry::WHERE('country_id','=',$shopId)->get();
         //###################  PAGE NAME #########################
         $page = "shipping_country";
          //###################  ALL SHOPS #########################
          $allShops = shop::all();
        return view('admin.shipping.shipping_country', compact('countries','page','allShops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // return "manjd jjjs";
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
              // SHOP ID
              $shopId = Session::get('shopId');

            //BING PARAM
                $s_country = new Shippingcountry;
                $s_country->country = $request->input('country');
                $s_country->code = $request->input('code');
                $s_country->zone = $request->input('zone'); 
                $s_country->type = $request->input('type');
                $s_country->publish = $request->input('publish');
              //  $rate->country_id = $request->input('country_id');
                $s_country->country_id = $shopId;

              // SAVE
               $s_country->save();
          
            // $parent = Category::WHERE('parent', 0)->get();
               $countries = Shippingcountry::WHERE('country_id','=',$shopId)->get();
               $success = 'You Have Added a new Country Succefully .';
            //###################  PAGE NAME #########################
               $page = "shipping_country";
                //###################  ALL SHOPS #########################
               $allShops = shop::all();
               return view('admin.shipping.shipping_country',compact('success','countries','page','allShops'));

            //    return redirect()->route('products.index')
            //    ->with('success','Product created successfully.');
    
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
        //
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

        $country = Shippingcountry::find($id);
        $countries = Shippingcountry::WHERE('country_id','=',$shopId)->get();
         //###################  PAGE NAME #########################
        $page = "edit_shipping_country";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.shipping.edit_shipping_country', compact('countries','country','page','allShops'));
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
          try{
               // SHOP ID
               $shopId = Session::get('shopId');

            //BING PARAM
                $s_country =  Shippingcountry::find($id);
                $s_country->country = $request->input('country');
                $s_country->code = $request->input('code');
                $s_country->zone = $request->input('zone'); 
                $s_country->type = $request->input('type');
                $s_country->publish = $request->input('publish');
              //  $rate->country_id = $request->input('country_id');
               // $s_country->country_id = 1;

              // SAVE
               $s_country->save();
          
            // $parent = Category::WHERE('parent', 0)->get();
               $country = Shippingcountry::find($id);
               $countries = Shippingcountry::WHERE('country_id','=',$shopId)->get();
               $success = 'Updated Country Succefully .';
                //###################  PAGE NAME #########################
               $page = "edit_shipping_country";
                //###################  ALL SHOPS #########################
                $allShops = shop::all();
               return view('admin.shipping.edit_shipping_country',compact('success','countries','country','page','allShops'));
    
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

            $country = Shippingcountry::find($id)->delete();
             // AFTER DELETE
             $countries = Shippingcountry::WHERE('country_id','=',$shopId)->get();
             $success = 'Deleted Successfully';
              //###################  PAGE NAME #########################
              $page = "shipping_country";
               //###################  ALL SHOPS #########################
               $allShops = shop::all();
             return view('admin.shipping.shipping_country',compact('success','countries','shipping_country','allShops'));
    
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
    public function destroyAll(Request $request)
    {
        try{
             // SHOP ID
             $shopId = Session::get('shopId');
             $country = Shippingcountry::WHERE('country_id','=',$shopId)->delete();
             // AFTER DELETE
             $countries = Shippingcountry::WHERE('country_id','=',$shopId)->get();
             $success = 'Deleted Successfully';
             //###################  PAGE NAME #########################
              $page = "shipping_country";
               //###################  ALL SHOPS #########################
               $allShops = shop::all();
             return view('admin.shipping.shipping_country',compact('success','countries','page','allShops'));
    
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

            if ($request->hasFile('country')) {
                    $filename = $request->file('country')->getPathName();
                    if( $request->file('country')->getSize() > 0)
                    {
                        $file = fopen($filename, "r");
                         while(($emapData = fgetcsv($file, 10000, ",")) !== FALSE){
                            
                            if($num != 0){  // to skip file header

                            $s_country = new Shippingcountry;
                            $s_country->country = $emapData['0'];
                            $s_country->code = $emapData['1'];
                            $s_country->zone = $emapData['2']; 
                            $s_country->type = $request->input('type');
                            $s_country->publish = "Yes";
                            $s_country->country_id = $shopId;
                            // SAVE
                            $s_country->save();
                    
                            }
                          $num++;
                        }
                    }
                     // AFTER IMPORT
                    $countries = Shippingcountry::WHERE('country_id','=',$shopId)->get();
                    $success = 'Imported Successfully';
                     //###################  PAGE NAME #########################
                    $page = "shipping_country";
                     //###################  ALL SHOPS #########################
                     $allShops = shop::all();
                    return view('admin.shipping.shipping_country',compact('success','countries','page','allShops'));
                }

        }catch(\Exception $e) {
         return $e->getMessage();
       }
     }


    


}
