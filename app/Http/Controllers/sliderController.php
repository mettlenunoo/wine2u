<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Slider;
use App\shop;
use DB;

class sliderController extends Controller
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

         $sliders = Slider::WHERE('country_id','=',$shopId)->get();
         //###################  PAGE NAME #########################
         $page = "slider_tb";
          //###################  ALL SHOPS #########################
          $allShops = shop::all();
          
        return view('admin.slider.slider_tb',compact('sliders','page','allShops'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //###################  PAGE NAME #########################
        $page = "add_slider";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.slider.add_slider',compact('page','allShops'));
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
                    $destinationPath = public_path('/slider');
                    $image->move($destinationPath, $image_name);
        
                }else{

                    $image_name = "";
                }
        
           // END  IMAGE PROCESSOR
            
            //BING PARAM
                $Slider = new Slider;
                $Slider->title = $request->input('title');
                $Slider->link = $request->input('link');
                $Slider->btn_text = $request->input('btn_text'); 
                $Slider->publish = $request->input('publish');
                $Slider->pic = $image_name;
                $Slider->content = "";
                $Slider->country_id = $shopId;
            //END BING PARAM

            // SAVE
              $Slider->save();
          
           //
            $success = 'You Have Added a New Slider Successfully .';
            //###################  PAGE NAME #########################
             $page = "add_slider";
              //###################  ALL SHOPS #########################
              $allShops = shop::all();
            return view('admin.slider.add_slider',compact('success','page','allShops'));
        
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
        $slider = Slider::find($id);
        //###################  PAGE NAME #########################
        $page = "add_slider";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.slider.edit_slider',compact('slider','page','allShops'));
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
        $slider = Slider::find($id);
         //###################  PAGE NAME #########################
        $page = "add_slider";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.slider.edit_slider',compact('slider','page','allShops'));
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
            $Slider = Slider::find($id);
            // SLUG
                $slug = str_slug($request->input('title'));
            // END OF SLUG

            // IMAGE PROCESSOR
                if ($request->hasFile('pic')) {
                        
                    $image = $request->file('pic');
                    $image_name = $slug."-".time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/slider');
                    $image->move($destinationPath, $image_name);

                    $Slider->pic = $image_name;
        
                }
           // END  IMAGE PROCESSOR
            
            //BING PARAM
               
                $Slider->title = $request->input('title');
                $Slider->link = $request->input('link');
                $Slider->btn_text = $request->input('btn_text'); 
                $Slider->publish = $request->input('publish');
               
            //END BING PARAM

            // SAVE
              $Slider->save();
          
          //
            $slider = Slider::find($id);
            $success = 'You Have Updated  Slider Succefully .';
            //###################  PAGE NAME #########################
            $page = "add_slider";
             //###################  ALL SHOPS #########################
             $allShops = shop::all();
            return view('admin.slider.edit_slider',compact('success','slider','page','allShops'));
        
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
               
             $slider = Slider::find($id)->delete();
             // AFTER DELETE
             $sliders = Slider::WHERE('country_id','=',$shopId)->get();
             $success = 'Deleted Successfully';
            //###################  PAGE NAME #########################
             $page = "slider_tb";
              //###################  ALL SHOPS #########################
              $allShops = shop::all();
             return view('admin.slider.slider_tb',compact('success','sliders','page','allShops'));
    
        }catch(\Exception $e) {
            return $e->getMessage();
        }

    }
}
