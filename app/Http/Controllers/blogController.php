<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Blogcategory;
use App\Blog;
use App\shop;

USE DB;

class blogController extends Controller
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

        $blogs = Blog::WHERE('country_id','=',$shopId)->get();
        //###################  PAGE NAME #########################
         $page = "all_blogs";
            //###################  ALL SHOPS #########################
        $allShops = shop::all();
        return view('admin.blog.all_blogs',compact('blogs','page','allShops'));
       // return view('admin.blog.add_blog');

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
        //
        $parent = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
        $categories = Blogcategory::WHERE('country_id','=',$shopId)->get();
        //###################  PAGE NAME #########################
        $page = "add_blog";
           //###################  ALL SHOPS #########################
           $allShops = shop::all();
        return view('admin.blog.add_blog',compact('categories','parent','page','allShops'));
       // return view('admin.blog.add_blog');
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
            // To check whether two pieces of content with the same title.
                $results = Blog::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
                $slug = $this->checker_slug($request->input('title'),$results, $old_slug = null);
            // END OF SLUG

            // IMAGE PROCESSOR
                if ($request->hasFile('pic')) {
                        
                    $image = $request->file('pic');
                    $image_name = $slug.'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/blog_images');
                    $image->move($destinationPath, $image_name);
        
                }else{

                    $image_name = "";
                }
        
           // END  IMAGE PROCESSOR
            
            //BING PARAM

                $blog = new Blog;
                $blog->title = $request->input('title');
                $blog->slug =  $slug;
                $blog->type = $request->input('type');
                $blog->video = $request->input('video');
                $blog->content = $request->input('content');
                $blog->pic = $image_name; 
                $blog->tag = $request->input('tag');
                $blog->visibility = $request->input('visibility');
                $blog->publish = $request->input('publish');
                $blog->featured = $request->input('featured');
                $blog->author = $request->input('author');
                $blog->country_id = $shopId;

            //END BING PARAM

            // SAVE
              $blog->save();

              $blog->categories()->sync($request->input('category'));

          
            //
            $parent = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
            $categories = Blogcategory::WHERE('country_id','=',$shopId)->get();
            $success = 'You Have Added a New Blog Successfully .';
             //###################  PAGE NAME #########################
             $page = "add_blog";
                //###################  ALL SHOPS #########################
             $allShops = shop::all();
            return view('admin.blog.add_blog',compact('categories','parent','success','page','allShops'));
        
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
        $blog = Blog::find($id);
       // $parent = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
        $categories = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
         //###################  PAGE NAME #########################
         $page = "edit_blog";
            //###################  ALL SHOPS #########################
        $allShops = shop::all();
        return view('admin.blog.edit_blog',compact('categories','blog','page','allShops'));
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
        $blog = Blog::with('categories')->find($id);
        // $parent = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
        $categories = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
         //###################  PAGE NAME #########################
         $page = "edit_blog";
            //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.blog.edit_blog',compact('categories','blog','page','allShops'));
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

               $blog = Blog::find($id);
            // SLUG
            // To check whether two pieces of content with the same title.
                $results = Blog::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
                $slug = $this->checker_slug($request->input('title'),$results, $blog->slug);
            // END OF SLUG

            // IMAGE PROCESSOR
                if ($request->hasFile('pic')) {
                        
                    $image = $request->file('pic');
                    $image_name = $slug.time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/blog_images');
                    $image->move($destinationPath, $image_name);

                    $blog->pic = $image_name; 

                }else{

                    $image_name = "";
                }
        
           // END  IMAGE PROCESSOR
            
            //BING PARAM

                
                $blog->title = $request->input('title');
                $blog->slug =  $slug;
                $blog->video = $request->input('video');
                $blog->content = $request->input('content');
                $blog->tag = $request->input('tag');
                $blog->visibility = $request->input('visibility');
                $blog->publish = $request->input('publish');
                //$blog->publish = now();
                $blog->featured = $request->input('featured');
                $blog->author = $request->input('author') ;

            //END BING PARAM

            // SAVE
              $blog->save();

              $blog->categories()->sync($request->input('category'));
          
            //
            $blog = Blog::find($id);
            $parent = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
            $categories = Blogcategory::WHERE('country_id','=',$shopId)->get();
            $success = 'You Have Updated a Blog Successfully .';
             //###################  PAGE NAME #########################
             $page = "edit_blog";
                //###################  ALL SHOPS #########################
            $allShops = shop::all();
            return view('admin.blog.edit_blog',compact('categories','parent','success','blog','page','allShops'));
        
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
        //
        try{
            // SHOP ID
             $shopId = Session::get('shopId');

            $blog = Blog::find($id)->delete();
             // AFTER DELETE
            $categories = Blogcategory::WHERE('country_id','=',$shopId)->get();
             // ALL BLOGS
             $blogs = Blog::WHERE('country_id','=',$shopId)->get();

            $success = 'Daleted  Succefully .';
             //###################  PAGE NAME #########################
             $page = "all_blogs";   
                //###################  ALL SHOPS #########################
             $allShops = shop::all();
            return view('admin.blog.all_blogs',compact('categories','success','page','allShops','blogs'));

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
