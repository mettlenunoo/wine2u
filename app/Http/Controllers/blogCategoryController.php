<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Blogcategory;
use App\shop;
USE DB;

class blogCategoryController extends Controller
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
        $parent = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
        $categories = Blogcategory::WHERE('country_id','=',$shopId)->get();
         //###################  PAGE NAME #########################
         $page = "categories";
            //###################  ALL SHOPS #########################
        $allShops = shop::all();
        return view('admin.blog.category.categories',compact('categories','parent','page','allShops'));
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
            // CHECK POSITION
            // if($request->input('position') != $request->input('i')){

            //     $position =  $request->input('position');

            //     for ($i = $request->input('position'); $i < $request->input('i') ; $i++) {
                    
            //         $position =  $position + 1;
            //         $category = Category::WHERE([ ['position', '=', $i] ])->first();
            //         $category->position =  $position;
            //         $category->save();

            //   }
               
            // }

            // SLUG
            // To check whether two pieces of content with the same title.
                $results = Blogcategory::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
                $slug = $this->checker_slug($request->input('title'),$results, $old_slug = null);
            // END OF SLUG

            // IMAGE PROCESSOR
                if ($request->hasFile('image')) {
                        
                    $image = $request->file('image');
                    $image_name = $slug.'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $image_name);
        
                }else{

                    $image_name = "";
                }
        
           // END  IMAGE PROCESSOR
            
            //BING PARAM

                $category = new Blogcategory;
                $category->title = $request->input('title');
                $category->slug =  $slug;
                $category->parent = $request->input('parent');
                $category->position = $request->input('position'); 
                $category->publish = $request->input('publish');
                $category->content = $request->input('content');
                $category->image = $image_name;
                $category->country_id = $shopId;

            //END BING PARAM

            // SAVE
              $category->save();
          
         //
            $parent = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
            $categories = Blogcategory::WHERE('country_id','=',$shopId)->get();
            $success = 'You Have Added a New Category Successfully .';
            //###################  PAGE NAME #########################
            $page = "categories";
               //###################  ALL SHOPS #########################
             $allShops = shop::all();
            return view('admin.blog.category.categories',compact('categories','parent','success','page','allShops'));
        
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
        $category = Blogcategory::find($id);
        $parent = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
        $categories = Blogcategory::WHERE('country_id','=',$shopId)->get();
        //###################  PAGE NAME #########################
        $page = "edit_category";
           //###################  ALL SHOPS #########################
           $allShops = shop::all();
        return view('admin.blog.category.edit_category',compact('categories','parent','category','page','allShops'));
       
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
        $category = Blogcategory::find($id);
        $parent = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
        $categories = Blogcategory::WHERE('country_id','=',$shopId)->get();
        //###################  PAGE NAME #########################
        $page = "edit_category";
           //###################  ALL SHOPS #########################
           $allShops = shop::all();
        return view('admin.blog.category.edit_category',compact('categories','parent','category','page','allShops'));
        
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

            $category = Blogcategory::find($id);
           // CHECK POSITION
                // if($request->input('position') != $request->input('i')){

                //     $position =  $request->input('position');

                //     for ($i = $request->input('position'); $i < $request->input('i') ; $i++) {
                        
                //         $position =  $position + 1;
                //         $category = Category::WHERE([ ['position', '=', $i] ])->first();
                //         $category->position =  $position;
                //         $category->save();

                // }
                
                // }
            

            // SLUG
                // To check whether two pieces of content with the same title.
                    $results = Blogcategory::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
                    $slug = $this->checker_slug($request->input('title'),$results,$category->slug);
                // END OF SLUG
               
               
            // IMAGE PROCESSOR
                if ($request->hasFile('image')) {
                        
                    $image = $request->file('image');
                    $image_name = $slug.time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $image_name);
                    // bind image
                    $category->image = $image_name;
                }
        
                $category->title = $request->input('title');
                $category->slug =  $slug;
                $category->parent = $request->input('parent');
                $category->position = $request->input('position'); 
                $category->publish = $request->input('publish');
                $category->content = $request->input('content');
                // $category->country_id = 1;

                // SAVE
                $category->save();
          
            // AFTER UPDATE
            $parent = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
            $categories = Blogcategory::WHERE('country_id','=',$shopId)->get();
            $category = Blogcategory::find($id);
            $success = 'Updated  Successfully .';
             //###################  PAGE NAME #########################
            $page = "edit_category";
               //###################  ALL SHOPS #########################
            $allShops = shop::all();
            return view('admin.blog.category.edit_category',compact('categories','parent','success','category','page','allShops'));
        
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
        
        $category = Blogcategory::find($id)->delete();
         // AFTER DELETE
         $parent = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
         $categories = Blogcategory::WHERE('country_id','=',$shopId)->get();
         $success = 'Updated  Successfully .';
          //###################  PAGE NAME #########################
         $page = "categories";
            //###################  ALL SHOPS #########################
         $allShops = shop::all();
         return view('admin.blog.category.categories',compact('categories','parent','success','page','allShops'));

        }catch(\Exception $e) {
        return $e->getMessage();
        }
    }

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
