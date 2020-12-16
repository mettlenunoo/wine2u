<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Page;
use App\shop;

USE DB;

class pageController extends Controller
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

         $pages = Page::WHERE('country_id','=',$shopId)->get();
         //###################  PAGE NAME #########################
          $page = "all_pages";
             //###################  ALL SHOPS #########################
         $allShops = shop::all();
         return view('admin.page.all_pages',compact('pages','page','allShops'));
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

         //###################  PAGE NAME #########################
         $page = "add_page";

        //###################  ALL SHOPS #########################
         $allShops = shop::all();
        
         return view('admin.page.add_page',compact('page','allShops'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            // SHOP ID
            $shopId = Session::get('shopId');

            // SLUG
            // To check whether two pieces of content with the same title.
                $results = Page::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();

                $slug = $this->checker_slug($request->input('title'), $old_slug = null,$results);
            // END OF SLUG
            
            
            //BING PARAM

                $pg = new Page;
                $pg->title = $request->input('title');
                $pg->slug =  $slug;
                $pg->content = $request->input('content');
                $pg->tag = $request->input('tag');
                $pg->visibility = $request->input('visibility');
                $pg->publish = $request->input('publish');
                $pg->country_id = $shopId;

            //END BING PARAM

            // SAVE
              $pg->save();

            // SUCCESS
            $success = 'You Have Added a New Page Successfully .';
             //###################  PAGE NAME #########################
             $page = "add_page";
                //###################  ALL SHOPS #########################
             $allShops = shop::all();

            return view('admin.page.add_page',compact('success','page','allShops'));
        
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
         $pg = Page::find($id);

        //###################  PAGE NAME #########################
          $page = "edit_page";

         //###################  ALL SHOPS #########################
         $allShops = shop::all();

         return view('admin.page.edit_page',compact('pg','page','allShops'));

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
         $pg = Page::find($id);

        //###################  PAGE NAME #########################
          $page = "edit_page";

         //###################  ALL SHOPS #########################
         $allShops = shop::all();

         return view('admin.page.edit_page',compact('pg','page','allShops'));
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
                $results = Page::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();

                $slug = $this->checker_slug($request->input('title'), $old_slug = null,$results);
            // END OF SLUG
            
            
            //BING PARAM

                $pg = Page::find($id);
                $pg->title = $request->input('title');
                $pg->slug =  $slug;
                $pg->content = $request->input('content');
                $pg->tag = $request->input('tag');
                $pg->visibility = $request->input('visibility');
                $pg->publish = $request->input('publish');
                $pg->country_id = $shopId;

            //END BING PARAM

            // SAVE
              $pg->save();

            // SUCCESS
            $success = 'You Have Updated a Page Successfully .';
             //###################  PAGE NAME #########################
             $page = "edit_page";
                //###################  ALL SHOPS #########################
             $allShops = shop::all();

            return view('admin.page.edit_page',compact('success','page','allShops','pg'));
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

            $pg = Page::find($id)->delete();
             // AFTER DELETE
            
             // ALL BLOGS
             $pages = Page::WHERE('country_id','=',$shopId)->get();

            $success = 'Daleted  Succefully .';
             //###################  PAGE NAME #########################
             $page = "all_pages";   
                //###################  ALL SHOPS #########################
             $allShops = shop::all();

            return view('admin.page.all_pages',compact('success','page','allShops','pages'));
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
