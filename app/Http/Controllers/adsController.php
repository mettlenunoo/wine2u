<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\shop;
use App\Models\Ads;

class adsController extends Controller
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
         // SHOP ID
         $shopId = Session::get('shopId');

         $ads = Ads::WHERE('country_id','=',$shopId)->get();
         //###################  PAGE NAME #########################
         $page = "ads_tb";
          //###################  ALL SHOPS #########################
          $allShops = shop::all();
          
        return view('admin.ads.ads_tb',compact('ads','page','allShops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          //###################  PAGE NAME #########################
          $page = "add_ads";
          //###################  ALL SHOPS #########################
          $allShops = shop::all();
         return view('admin.ads.add_ads',compact('page','allShops'));
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
         
           // SLUG
               $slug = str_slug($request->input('title'));
           // END OF SLUG

           // IMAGE PROCESSOR
               if ($request->hasFile('pic')) {
                       
                   $image = $request->file('pic');
                   $image_name = $slug."-".time().'.'.$image->getClientOriginalExtension();
                   $destinationPath = public_path('/ads');
                   $image->move($destinationPath, $image_name);

                   $image_name = "/ads/".$image_name;
       
               }else{

                   $image_name = "";
               }
       
          // END  IMAGE PROCESSOR
           
           //BING PARAM
               $ads = new ads;
               $ads->title = $request->input('title');
               $ads->link = $request->input('link');
               $ads->page = $request->input('page'); 
               $ads->publish = $request->input('publish');
               $ads->pic = $image_name;
               $ads->country_id = $shopId;
           //END BING PARAM

           // SAVE
             $ads->save();
         
          //
           $success = 'You Have Added a New Ads Successfully .';
           //###################  PAGE NAME #########################
            $page = "add_ads";
             //###################  ALL SHOPS #########################
             $allShops = shop::all();
           return view('admin.ads.add_ads',compact('success','page','allShops'));
       
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
        $ads = Ads::find($id);
        //###################  PAGE NAME #########################
        $page = "add_ads";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.ads.edit_ads',compact('ads','page','allShops'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads = Ads::find($id);
        //###################  PAGE NAME #########################
       $page = "add_ads";
        //###################  ALL SHOPS #########################
        $allShops = shop::all();
       return view('admin.ads.edit_ads',compact('ads','page','allShops'));
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
            $ads = Ads::find($id);
            // SLUG
                $slug = str_slug($request->input('title'));
            // END OF SLUG

            // IMAGE PROCESSOR
                if ($request->hasFile('pic')) {
                        
                    $image = $request->file('pic');
                    $image_name = $slug."-".time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/ads');
                    $image->move($destinationPath, $image_name);

                    $image_name = "/ads/".$image_name;
                    $ads->pic = $image_name;
        
                }
           // END  IMAGE PROCESSOR
            
            //BING PARAM
               
                $ads->title = $request->input('title');
                $ads->link = $request->input('link');
                $ads->page = $request->input('page'); 
                $ads->publish = $request->input('publish');
               
            //END BING PARAM

            // SAVE
              $ads->save();
          
             $success = 'You Have Updated an Ads Succefully .';
            //###################  PAGE NAME #########################
            $page = "add_adss";
             //###################  ALL SHOPS #########################
             $allShops = shop::all();
            return view('admin.ads.edit_ads',compact('success','ads','page','allShops'));
        
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
            
          $ads = Ads::find($id)->delete();
          // AFTER DELETE
          $ads = Ads::WHERE('country_id','=',$shopId)->get();
          $success = 'Deleted Successfully';
         //###################  PAGE NAME #########################
          $page = "ads_tb";
           //###################  ALL SHOPS #########################
           $allShops = shop::all();
          return view('admin.ads.ads_tb',compact('success','ads','page','allShops'));
 
        }catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
