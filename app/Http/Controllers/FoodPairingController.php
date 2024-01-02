<?php

namespace App\Http\Controllers;

use Session;
use App\Blog;
use App\shop;
use App\Pairing;
use App\Models\FoodPairings;
use Illuminate\Http\Request;

class FoodPairingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // SHOP ID
        $shopId = Session::get('shopId');
        $pairs = FoodPairings::WHERE('country_id','=',$shopId)->get();
        $today = now();
        $allShops = shop::all();
        $page = "food_pairing";

        return view('admin.food_pairing.food_pairing',compact('pairs','page','allShops'));
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
            $results = FoodPairings::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
            $slug = $this->checker_slug($request->input('title'), $results , $old_slug = null);
        // END OF SLUG


        // IMAGE PROCESSOR
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = $slug.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/food_pairings_images');
            $image->move($destinationPath, $image_name);

        }else{

            $image_name = "";
        }


        //BING PARAM

            $pair = new FoodPairings;
            $pair->title = $request->input('title');
            $pair->slug =  $slug;
            $pair->position = $request->input('position');
            $pair->publish = $request->input('publish');
            $pair->content = $request->input('content');
            $pair->image = $image_name;
            $pair->country_id =  $shopId;

        //END BING PARAM

        // SAVE
            $pair->save();
            $success = 'You Have Added a New Pair Successfully .';
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
                             // SHOP ID
        $shopId = Session::get('shopId');
        $pairs = FoodPairings::WHERE('country_id','=',$shopId)->get();
        $pair = FoodPairings::find($id);
        $today = now();
        $allShops = shop::all();
        $page = "food_pairing";


        return view('admin.food_pairing.edit_food_pairing',compact('pairs','pair','page','allShops'));
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

                  $pair = FoodPairings::find($id);
                  // SLUG
                  // To check whether two pieces of content with the same title.
                      $results = FoodPairings::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
                      $slug = $this->checker_slug($request->input('title'),$results, $pair->slug);

                      // IMAGE PROCESSOR
                      if ($request->hasFile('image')) {

                        $image = $request->file('image');
                        $image_name = $slug.time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/food_pairings_images');
                        $image->move($destinationPath, $image_name);

                        $pair->image = $image_name;
                      }

                      $pair->title = $request->input('title');
                      $pair->slug =  $slug;
                      $pair->position = $request->input('position');
                      $pair->publish = $request->input('publish');
                      $pair->content = $request->input('content');
                      $pair->country_id =  $shopId;

                  // SAVE
                     $pair->save();
                     $success = 'You Have Added a New Pair Successfully .';
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
        $pair = FoodPairings::find($id)->delete();
        return redirect('/admin/food/pairing')->with(['success' => "Deleted Successfully"]);
    }

    public function checker_slug($name, $results ,$old_slug = null){
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
