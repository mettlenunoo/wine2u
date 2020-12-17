<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Wine;
use App\shop;

class wineController extends Controller
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
          $wines = Wine::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->with('subWines')->get();
          $totalWine = Wine::WHERE('country_id','=',$shopId)->count();
          $allShops = shop::all();
          $page = "wine";

          return view('admin.wine.wines',compact('wines','totalWine','page','allShops'));
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
         // SHOP ID
         $shopId = Session::get('shopId');

         // SLUG
         // To check whether two pieces of content with the same title.
             $results = Wine::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
             $slug = $this->checker_slug($request->input('title'), $old_slug = null,$results);
         // END OF SLUG
         
         //BING PARAM

             $wine = new Wine;
             $wine->title = $request->input('title');
             $wine->slug =  $slug;
             $wine->parent = $request->input('parent');
             $wine->position = $request->input('position'); 
             $wine->publish = $request->input('publish');
             $wine->content = $request->input('content');
             $wine->country_id =  $shopId;

         // SAVE
           $wine->save();
           return back()->with(['success' => "You Have Added a New Wine Type Successfully!"]);
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
       
       $shopId = Session::get('shopId');
       $wine = Wine::find($id);
       $wines = Wine::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->with('subWines')->get();
       $totalWine = Wine::WHERE('country_id','=',$shopId)->count();
       $allShops = shop::all();
       $page = "wine";
       return view('admin.wine.edit_wine',compact('wines','totalWine','wine','page','allShops'));

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
             $results = Wine::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
             $slug = $this->checker_slug($request->input('title'), $old_slug = null,$results);
         // END OF SLUG
         
         //BING PARAM

             $wine = Wine::find($id);
             $wine->title = $request->input('title');
             $wine->slug =  $slug;
             $wine->parent = $request->input('parent');
             $wine->position = $request->input('position'); 
             $wine->publish = $request->input('publish');
             $wine->content = $request->input('content');
             $wine->country_id =  $shopId;

         //END BING PARAM

         // SAVE
           $wine->save();
    
           return back()->with(['success' => "Updated Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wine = Wine::find($id)->delete();
        $subWines = Wine::WHERE('parent', $id)->delete();
        return redirect('/admin/wine')->with(['success' => "Deleted Successfully"]);

    }

    public function checker_slug($name, $old_slug = null,$results){
        // To check whether  
      $q_count = count($results);
      $count=1;
      if($q_count > 0){
        
            foreach ($results as $key => $result) {
          //  if($q_count > 1 && $key == 0){
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
