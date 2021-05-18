<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Offer;
use App\shop;

class offerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
          // SHOP ID
          $shopId = Session::get('shopId');
          $offers = Offer::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->with('subOffers')->get();
          $totalOffers = Offer::WHERE('country_id','=',$shopId)->count();
          $allShops = shop::all();
          $page = "offer";

          return view('admin.offer.offers',compact('offers','totalOffers','page','allShops'));
    }

  
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
           // SHOP ID
           $shopId = Session::get('shopId');

           // SLUG
           // To check whether two pieces of content with the same title.
               $results = Offer::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
               $slug = $this->checker_slug($request->input('title'),$results, $old_slug = null);
           // END OF SLUG
           
           //BING PARAM
  
               $offer = new Offer;
               $offer->title = $request->input('title');
               $offer->slug =  $slug;
               $offer->parent = $request->input('parent');
               $offer->position = $request->input('position'); 
               $offer->publish = $request->input('publish');
               $offer->content = $request->input('content');
               $offer->country_id =  $shopId;
  
           //END BING PARAM
  
           // SAVE
              $offer->save();
         
            $success = 'You Have Added a New Offer Successfully .';

            return back()->with(['success' => $success]);
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
          // SHOP ID
          $shopId = Session::get('shopId');
          $offer = Offer::find($id);
          $offers = Offer::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->with('subOffers')->get();
          $totalOffers = Offer::WHERE('country_id','=',$shopId)->count();
          $allShops = shop::all();
          $page = "offer";

          return view('admin.offer.edit_offer',compact('offer','offers','totalOffers','page','allShops'));
    }

  
    public function update(Request $request, $id)
    {
           // SHOP ID
             $shopId = Session::get('shopId');

           // SLUG
           // To check whether two pieces of content with the same title.
               $results = Offer::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
               $slug = $this->checker_slug($request->input('title'),$results, $old_slug = null);
           // END OF SLUG
           
           //BING PARAM
  
               $offer = Offer::find($id);
               $offer->title = $request->input('title');
               $offer->slug =  $slug;
               $offer->parent = $request->input('parent');
               $offer->position = $request->input('position'); 
               $offer->publish = $request->input('publish');
               $offer->content = $request->input('content');
               $offer->country_id =  $shopId;
  
           // SAVE
              $offer->save();
         
          //
            $success = 'Updated Successfully.';

            return back()->with(['success' => $success]);
    }

  
    public function destroy($id)
    {
        $offer = Offer::find($id)->delete();
        $subOffer = Offer::WHERE('parent', $id)->delete();
        return redirect('/admin/offer')->with(['success' => "Deleted Successfully"]);
    }

    public function checker_slug($name,$results, $old_slug = null){
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
