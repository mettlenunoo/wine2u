<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Coupon;
use Session;
use App\shop;
USE DB;

class couponController extends Controller
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
        
         $coupons = Coupon::WHERE('country_id','=',$shopId)->get();
         $page = "coupon";
 
         //###################  ALL SHOPS #########################
         $allShops = Shop::all();
 
         return view('admin.coupon.coupon',compact('coupons','page','allShops'));
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
           try{ 
            // SHOP ID
           $shopId = Session::get('shopId');
         
          //BING PARAM
              $coupon = new Coupon;
              $coupon->title = $request->input('title');
              $coupon->code = $request->input('code');
              $coupon->type = $request->input('type');
              $coupon->value = $request->input('amt');
              $coupon->percent_off = $request->input('percentange');
              $coupon->usage = $request->input('usage');
              $coupon->valid_date = $request->input('valid_date');
              $coupon->end_date = $request->input('end_date');
              $coupon->country_id = $shopId;
              $coupon->status = $request->input('status');
              $coupon->details = $request->input('content');
              $coupon->total_used = 0;
          // SAVE

              $coupon->save();
        
          // AFTER
            $coupons = Coupon::WHERE('country_id','=',$shopId)->get();
            $page = "coupon";
            //###################  ALL SHOPS #########################
            $allShops = Shop::all();
            $success = 'You Have Added a New Attribute Successfully .';
            // RETRUN
            return view('admin.coupon.coupon',compact('coupons','success','page','allShops'));

      } catch (\Exception $e) {

       return $e->getMessage();
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
          //
          $coupon = coupon::find($id);
          $coupons = Coupon::WHERE('country_id','=',$shopId)->get();
          $page = "coupon";
            //###################  ALL SHOPS #########################
          $allShops = Shop::all();

          return view('admin.coupon.edit_coupon',compact('coupon','coupons','page','allShops'));
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
              $coupon = Coupon::find($id);
              $coupon->title = $request->input('title');
              $coupon->code = $request->input('code');
              $coupon->type = $request->input('type');
              $coupon->value = $request->input('amt');
              $coupon->percent_off = $request->input('percentange');
              $coupon->usage = $request->input('usage');
              $coupon->valid_date = $request->input('valid_date');
              $coupon->end_date = $request->input('end_date');
              $coupon->status = $request->input('status');
              $coupon->details = $request->input('content');

          // SAVE
              $coupon->save();
          // AFTER
            $coupons = Coupon::WHERE('country_id','=',$shopId)->get();
            $page = "coupon";
            //###################  ALL SHOPS #########################
            $allShops = Shop::all();
            $success = 'Updated Successfully .';
            // RETRUN
            return view('admin.coupon.edit_coupon',compact('coupons','coupon','success','page','allShops'));

      } catch (\Exception $e) {

       return $e->getMessage();
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

            $coupon = Coupon::find($id)->delete();
             // AFTER DELETE
             $coupons = Coupon::WHERE('country_id','=',$shopId)->get();
             $page = "coupon";
             //###################  ALL SHOPS #########################
             $allShops = Shop::all();
             $success = 'Deleted Successfully .';

             return view('admin.coupon.coupon',compact('coupons','success','page','allShops'));
    
        }catch(\Exception $e) {
          return $e->getMessage();
        }

    }

  
  
}
