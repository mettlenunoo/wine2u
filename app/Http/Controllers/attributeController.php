<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Attribute;
use Session;
use App\shop;
USE DB;
class attributeController extends Controller
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
        $parent = Attribute::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
        $attributes = Attribute::WHERE('country_id','=',$shopId)->get();
        $page = "attribute";

        //###################  ALL SHOPS #########################
        $allShops = Shop::all();

        return view('admin.attribute.attributes',compact('attributes','parent','page','allShops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // SHOP ID
        $shopId = Session::get('shopId');

        $parent = Attribute::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
        $attributes = Attribute::WHERE('country_id','=',$shopId)->get();
        $page = "attribute";

        //###################  ALL SHOPS #########################
        $allShops = Shop::all();

        return view('admin.attribute.attributes',compact('attributes','parent','page','allShops'));
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
            // SLUG
            // To check whether two pieces of content with the same title.

                $results = Attribute::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
                $slug = $this->checker_slug($request->input('title'),$results, null);
            
            //BING PARAM

                $attribute = new Attribute;
                $attribute->title = $request->input('title');
                $attribute->slug =  $slug;
                $attribute->parent = $request->input('parent');
                $attribute->publish = $request->input('publish');
                $attribute->content = $request->input('content');
                $attribute->country_id = $shopId;


            // SAVE

                $attribute->save();
          
            //
                $parent = Attribute::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
                $attributes = Attribute::WHERE('country_id','=',$shopId)->get();
                $success = 'You Have Added a New Attribute Successfully .';
                $page = "attribute";

                //###################  ALL SHOPS #########################
                $allShops = Shop::all();
                return view('admin.attribute.attributes',compact('attributes','parent','success','page','allShops'));
        
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
         // SHOP ID
         $shopId = Session::get('shopId');
        //
        $attribute = Attribute::find($id);
        $parent = Attribute::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
        $attributes = Attribute::WHERE('country_id','=',$shopId)->get();
        $page = "attribute";
          //###################  ALL SHOPS #########################
          $allShops = Shop::all();
        return view('admin.attribute.edit_attributes',compact('attributes','parent','attribute','page','allShops'));
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
        $attribute = Attribute::find($id);
        $parent = Attribute::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
        $attributes = Attribute::WHERE('country_id','=',$shopId)->get();

        $page = "attribute";
          //###################  ALL SHOPS #########################
          $allShops = Shop::all();
        return view('admin.attribute.edit_attributes',compact('attributes','parent','attribute','page','allShops'));
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

              $attribute =  Attribute::find($id);
            // SLUG
            // To check whether two pieces of content with the same title.

                $results = Attribute::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
                $slug = $this->checker_slug($request->input('title'),$results, $attribute->slug);
            
            //BING PARAM

                $attribute->title = $request->input('title');
                $attribute->slug =  $slug;
                $attribute->parent = $request->input('parent');
                $attribute->publish = $request->input('publish');
                $attribute->content = $request->input('content');
               
            // SAVE

                $attribute->save();
          
            //  OUTPUT
                $attribute =  Attribute::find($id);
                $parent = Attribute::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
                $attributes = Attribute::WHERE('country_id','=',$shopId)->get();
                $success = 'You Have Added a New Attribute Successfully .';
                $page = "attribute";
                  //###################  ALL SHOPS #########################
                  $allShops = Shop::all();
                return view('admin.attribute.edit_attributes',compact('attributes','parent','success','attribute','page','allShops'));
        
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

            $attribute = Attribute::find($id)->delete();
             // AFTER DELETE
             $parent = Attribute::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
             $attributes = Attribute::WHERE('country_id','=',$shopId)->get();
             $success = 'Deleted  Successfully .';
             $page = "attribute";
               //###################  ALL SHOPS #########################
             $allShops = Shop::all();
             return view('admin.attribute.attributes',compact('attributes','parent','success','page','allShops'));
    
        }catch(\Exception $e) {
          return $e->getMessage();
        }

    }

     
      // SLUG CHECKER
      public function checker_slug($name,$results, $old_slug = null){
        // To check whether  
      $q_count = count($results);
      $count=1;
      if($q_count > 0){
        
            foreach ($results as $key => $result) {
              if($q_count > 0  && $key == 0 &&  $old_slug != null ){
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
