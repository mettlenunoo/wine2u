<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Pairing;
use App\Blog;
use App\shop;

class pairingController extends Controller
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
             $parent = Pairing::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
             $pairs = Pairing::WHERE('country_id','=',$shopId)->get();
             $today = now();
             $blogs = Blog::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $shopId)->orderBy('created_at', 'DESC')->get();
             $allShops = shop::all();
             $page = "pair";

             return view('admin.pair.pairs',compact('pairs','blogs','parent','page','allShops'));
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


    public function store(Request $request)
    {
              // SHOP ID
                 $shopId = Session::get('shopId');

              // SLUG
              // To check whether two pieces of content with the same title.
                  $results = Pairing::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
                  $slug = $this->checker_slug($request->input('title'), $results , $old_slug = null);
              // END OF SLUG


               // IMAGE PROCESSOR
                if ($request->hasFile('image')) {

                    $image = $request->file('image');
                    $image_name = $slug.time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $image_name);

                }else{

                    $image_name = "";
                }


              //BING PARAM

                  $pair = new Pairing;
                  $pair->title = $request->input('title');
                  $pair->slug =  $slug;
                  $pair->parent = $request->input('parent');
                  $pair->position = $request->input('position');
                  $pair->publish = $request->input('publish');
                  $pair->content = $request->input('content');
                  $pair->image = $image_name;
                  $pair->blog_id = $request->input('blog_id');
                  $pair->show_on_page = $request->input('show_on_page');
                  $pair->country_id =  $shopId;

              //END BING PARAM

              // SAVE
                 $pair->save();
                 $success = 'You Have Added a New Pair Successfully .';
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
         $parent = Pairing::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
         $pair = Pairing::find($id);
         $pairs = Pairing::WHERE('country_id','=',$shopId)->get();
         $today = now();
         $blogs = Blog::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $shopId)->orderBy('created_at', 'DESC')->get();
         $allShops = shop::all();
         $page = "pair";

         return view('admin.pair.edit_pair',compact('pairs','pair','blogs','parent','page','allShops'));
    }


    public function update(Request $request, $id)
    {
          // SHOP ID
          $shopId = Session::get('shopId');

          $pair = Pairing::find($id);
          // SLUG
          // To check whether two pieces of content with the same title.
              $results = Pairing::WHERE('title', $request->input('title'))->WHERE('country_id','=',$shopId)->get();
              $slug = $this->checker_slug($request->input('title'),$results, $pair->slug);

              // IMAGE PROCESSOR
              if ($request->hasFile('image')) {

                $image = $request->file('image');
                $image_name = $slug.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $image_name);

                $pair->image = $image_name;
              }

              $pair->title = $request->input('title');
              $pair->slug =  $slug;
              $pair->parent = $request->input('parent');
              $pair->position = $request->input('position');
              $pair->publish = $request->input('publish');
              $pair->content = $request->input('content');
              $pair->blog_id = $request->input('blog_id');
              $pair->show_on_page = $request->input('show_on_page');
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
        $pair = Pairing::find($id)->delete();
        $subPair = Pairing::WHERE('parent', $id)->delete();
        return redirect('/admin/pair')->with(['success' => "Deleted Successfully"]);
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
