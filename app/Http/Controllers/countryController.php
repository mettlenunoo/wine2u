<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Country;
use App\shop;

class countryController extends Controller
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
            $countries = Country::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->with('regions')->get();
            $allShops = shop::all();
            $page = "all-country";
            return view('admin.country.all_countries',compact('countries','page','allShops'));
    }

   
    public function create()
    {

         // SHOP ID
         $shopId = Session::get('shopId');
         $countries = Country::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
         $allShops = shop::all();
         $page = "country";
         // RETURN
         return view('admin.country.add_country',compact('countries','page','allShops'));
       
    }

    public function createRegion()
    {

         // SHOP ID
         $shopId = Session::get('shopId');
         // PARENT
         $countries = Country::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
         // PAGE NAME 
         $page = "region";
         // ALL SHOPS 
         $allShops = shop::all();
         // RETURN
         return view('admin.country.region.add_region',compact('countries','page','allShops'));
       
    }

    public function editRegion($id)
    {

      // SHOP ID
      $shopId = Session::get('shopId');
      $country = Country::find($id);
      $countries = Country::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->get();
      $allShops = shop::all();
      $page = "region";
      return view('admin.country.region.edit_region',compact('countries','country','page','allShops'));
       
    }

  
    public function store(Request $request)
    {
           // SHOP ID
           $shopId = Session::get('shopId');

           // SLUG
           // To check whether two pieces of content with the same title.
               $results = Country::WHERE('name', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
               $slug = $this->checker_slug($request->input('title'), $old_slug = null,$results);
           // END OF SLUG
  
           // IMAGE PROCESSOR
               if ($request->hasFile('banner')) {
                       
                   $image = $request->file('banner');
                   $image_name = $slug.'banner.'.$image->getClientOriginalExtension();
                   $destinationPath = public_path('/country');
                   $image->move($destinationPath, $image_name);
       
               }else{
  
                   $image_name = "";
               }

                      // IMAGE PROCESSOR
                if ($request->hasFile('flag')) {
                       
                    $image = $request->file('flag');
                    $flag = $slug.'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/country');
                    $image->move($destinationPath, $flag);
            
                }else{
       
                    $flag = "";
                 }
       
          
         
               $country = new Country;
               $country->name = $request->input('title');
               $country->slug =  $slug;
               $country->type = $request->input('type');
               $country->parent = $request->input('parent');
               $country->content = $request->input('content');
               $country->banner = $image_name; 
               $country->flag = $flag;
               $country->visibility = $request->input('visibility');
               $country->publish = $request->input('publish');
               $country->country_id = $shopId;
  
  
           // SAVE
             $country->save();

             $success = "Added Successfully";

             return redirect("/admin/country")->with(['success' => $success]);
         
          // return view('admin.country.add_country',compact('countries','success','page','allShops'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
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
         $country = Country::find($id);
         $countries = Country::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->with('regions')->get();
         $page = "country";
         $allShops = shop::all();
         return view('admin.country.edit_country',compact('countries','country','page','allShops'));
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
        // SHOP ID
        $shopId = Session::get('shopId');

        // SLUG
        // To check whether two pieces of content with the same title.
            $results = Country::WHERE('name', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
            $slug = $this->checker_slug($request->input('title'), $old_slug = null,$results);
        // END OF SLUG

        $country = Country::find($id);

        // IMAGE PROCESSOR
            if ($request->hasFile('banner')) {
                    
                $image = $request->file('banner');
                $image_name = $slug.'banner.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/country');
                $image->move($destinationPath, $image_name);

                $country->banner = $image_name; 
    
            }
                   // IMAGE PROCESSOR
            if ($request->hasFile('flag')) {
                
                $image = $request->file('flag');
                $flag = $slug.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/country');
                $image->move($destinationPath, $flag);

                $country->flag = $flag;
        
            }

            $country->name = $request->input('title');
            $country->slug =  $slug;
            $country->parent = $request->input('parent');
            $country->content = $request->input('content');
            $country->visibility = $request->input('visibility');
            $country->publish = $request->input('publish');

        // SAVE
          $country->save();

          $success = "Updated Successfully";

          return back()->with(['success' => $success]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id)->delete();
        $region = Country::WHERE('parent', $id)->delete();
        return back()->with(['success' => "Deleted Successfully"]);
    }

    public function checker_slug($name, $old_slug = null,$results){
        // To check whether  
      $q_count = count($results);
      $count=1;
      if($q_count > 0){
        
            foreach ($results as $key => $result) {
            if($q_count > 1 && $key == 0){
            $slug_name = $result['name'];
            }else{
             $slug_name = $result['name']."-".$count++;
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
