<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Grape;
use App\shop;

class grapeController extends Controller
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
         $grapes = Grape::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->with('subGrapes')->get();
         $totalGrapes = Grape::WHERE('country_id','=',$shopId)->count();
         $allShops = shop::all();
         $page = "grape";

         return view('admin.grape.grapes',compact('grapes','totalGrapes','page','allShops'));
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
               $results = Grape::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
               $slug = $this->checker_slug($request->input('title'), $old_slug = null,$results);
           // END OF SLUG
           
           //BING PARAM
  
               $grape = new Grape;
               $grape->title = $request->input('title');
               $grape->slug =  $slug;
               $grape->parent = $request->input('parent');
               $grape->position = $request->input('position'); 
               $grape->publish = $request->input('publish');
               $grape->content = $request->input('content');
               $grape->country_id =  $shopId;
  
           //END BING PARAM
  
           // SAVE
              $grape->save();
            
              $success = 'You Have Added a New Grape Successfully .';
              return back()->with(['success' => $success]);
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
       $grape = Grape::find($id);
       $grapes = Grape::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->with('subGrapes')->get();
       $totalGrapes = Grape::WHERE('country_id','=',$shopId)->count();
       $allShops = shop::all();
       $page = "grape";
       return view('admin.grape.edit_grape',compact('grapes','totalGrapes','grape','page','allShops'));
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

             $grape =  Grape::find($id);

             // SLUG
             // To check whether two pieces of content with the same title.
                 $results = Grape::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
                 $slug = $this->checker_slug($request->input('title'), $grape->slug,$results);
             // END OF SLUG
             
             //BING PARAM
    
                 $grape->title = $request->input('title');
                 $grape->slug =  $slug;
                 $grape->parent = $request->input('parent');
                 $grape->position = $request->input('position'); 
                 $grape->publish = $request->input('publish');
                 $grape->content = $request->input('content');
                 $grape->country_id =  $shopId;
    
             //END BING PARAM
    
             // SAVE
                $grape->save();
              
                $success = 'You Have Added a New Category Successfully .';
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
        $grape = Grape::find($id)->delete();
        $subGrapes = Grape::WHERE('parent', $id)->delete();
        return redirect('/admin/grape')->with(['success' => "Deleted Successfully"]);
    }

    public function checker_slug($name, $old_slug = null,$results){
        // To check whether  
      $q_count = count($results);
      $count=1;
      if($q_count > 0){
        
            foreach ($results as $key => $result) {
          //  if($q_count > 1 && $key == 0){
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
