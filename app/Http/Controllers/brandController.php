<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Attribute;
use App\Models\Brand;
use Session;
use App\shop;
USE DB;

class brandController extends Controller
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
          $brands = Brand::all();
          $page = "brand";
          $allShops = Shop::all();
          return view('admin.brand.brand',compact('brands','page','allShops'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $brands = Brand::all();
          $page = "brand";
          $allShops = Shop::all();
          return view('admin.brand.brand',compact('brands','page','allShops'));
        
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
          // SLUG
          // To check whether two pieces of content with the same title.
            $results = Brand::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
            $slug = $this->checker_slug($request->input('title'), null,$results);

            $brand = new Brand;
            $brand->title = $request->input('title');
            $brand->slug =  $slug;
            $brand->publish = $request->input('publish');
            $brand->content = $request->input('content');
            $brand->country_id = $shopId;
            $brand->save();
    
            $brands = Brand::all();
            $success = 'You Have Added a New Brand Successfully.';
            $page = "brand";

            $allShops = Shop::all();
            return view('admin.brand.brand',compact('brands','success','page','allShops'));
      
      
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
        $brand = Brand::find($id);
        $brands = Brand::all();
        $page = "brand";
        $allShops = Shop::all();
        return view('admin.brand.edit_brand',compact('brands','brand','page','allShops'));
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
        $brand = Brand::find($id);
        $brands = Brand::all();
        $page = "brand";
        $allShops = Shop::all();
        return view('admin.brand.edit_brand',compact('brands','brand','page','allShops'));
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
        $shopId = Session::get('shopId');
        $brand =  Brand::find($id);
        $results = Brand::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
        $slug = $this->checker_slug($request->input('title'), $brand->slug,$results);

        $brand->title = $request->input('title');
        $brand->slug =  $slug;
        $brand->publish = $request->input('publish');
        $brand->content = $request->input('content');
        $brand->country_id = $shopId;
        $brand->save();

        $brands = Brand::all();
        $success = 'You Have Updated Successfully.';
        $page = "brand";

        $allShops = Shop::all();
        return view('admin.brand.edit_brand',compact('brands','brand','success','page','allShops'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           // SHOP ID
           $shopId = Session::get('shopId');

           $brand = Brand::find($id)->delete();
            // AFTER DELETE
            $brands = Brand::all();
            $success = 'Deleted  Successfully .';
            $page = "brand";
              //###################  ALL SHOPS #########################
            $allShops = Shop::all();
            return view('admin.brand.brand',compact('brands','success','page','allShops'));
    }

    public function checker_slug($name, $old_slug = null,$results){
        // To check whether  
      $q_count = count($results);
      $count=1;
      if($q_count > 0){
        
            foreach ($results as $key => $result) {
            if($q_count > 1 && $key == 0){
            $slug_name = $result['title'];
            }else{
             $slug_name = $result['title']."-".$count++;
            }
            // convert to slug
            $new_slug = str_slug($slug_name);
            if($new_slug == $old_slug){
                break;
            }
            }

            return $new_slug;

      }else{

            $new_slug =  str_slug($name);
            return $new_slug;

      }

    }
}
