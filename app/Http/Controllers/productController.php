<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Attribute;
use App\Category;
use App\Product;
use App\Gallery_product;
use App\VariableProduct;
use App\shop;
use App\Note;
use App\Blog;
use App\Blogcategory;
use App\Wine;
use App\Offer;
use App\Grape;
use App\Pairing;
use App\Country;
use App\Models\Brand;
use Auth;

class productController extends Controller
{

    public $link = [];
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
      // SHOP ID
    // public  $shopId ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategoryIds = [];
        // FILTER
        $search = isset($_GET['search']) ?  $this->SearchPagination("search")  : "";
        
        // PARENT CATEGORY
        if(isset($_GET['parent_category'])){

             $slug = $_GET['parent_category'];
             $this->SearchPagination("parent_category");
             $parentCategoryId = Category::where('slug','=',$slug)->first()->id;
             $subCategoryIds = Category::where('parent','=',$parentCategoryId)->pluck('id');
           //  dd($subCategoryIds);

        }

         // sub CATEGORY
         if(isset($_GET['sub_category'])){

            $slug = $_GET['sub_category'];
            $this->SearchPagination("sub_category");
            $subCategoryIds = Category::where('slug','=',$slug)->pluck('id');
          //  dd($subCategoryIds);
       }



        // $buyers = $campaign->buyers()->with('notes')->with(['emails' => function($q) use ($campaign_id){
        //     $q->where('campaign_id', $campaign_id);
        // }])->get();



        // $parentCategoryId = isset($_GET['parent_category']) ?  $this->SearchPagination("parent_category")  : "";

        // SHOP ID
         $shopId = Session::get('shopId');
         // Attribute
        // $products = Product::WHERE('country_id','=',$shopId)->get();
        //###################  PAGE NAME #########################
         $products = Product::WHERE('products.country_id', '=', $shopId)
         ->Search($search); // Search Scope
         empty($subCategoryIds) ? $products =  $products->with('variableProductAttributes', 'categories') : $products = $products->with(['variableProductAttributes','categories'])->whereHas('categories', function($query) use ($subCategoryIds) {
            $query->whereIN('category_id', $subCategoryIds);
          });



        // empty($subCategoryIds) ? $products =  $products->with('variableProductAttributes', 'categories') : $products = $products->with(['variableProductAttributes','categories' => function($q) use ($subCategoryIds){ $q->whereIn('category_id', $subCategoryIds);}]);

         
         

        //  !empty($this->link) ? $products = $products->appends($this->link) : "";

        
         
        //  ->with(['categories' => function($q) use ($subCategoryIds){ $q->whereIn('category_id', $subCategoryIds);}])
         
        $products = $products
         ->latest()
         ->paginate(12)
         ->setPath('/admin/product');

         !empty($this->link) ? $products = $products->appends($this->link) : "";

        // $products = SearchPagination

        // ->appends('search', $search);

        // $products->withPath('custom/url');
        
         // $products = $products->variableProd()->latest()->paginate(12);
  
         $page = "all_products";
          //###################  ALL SHOPS #########################
         $allShops = shop::all();
         //dd($products);
         return view('admin.product.all_products',compact('products','page','allShops'));
    }
     
     // pagination filter
     private function SearchPagination($parms)
     { 
         if($_GET[$parms]){

            empty($this->link) ? $this->link = array($parms => $_GET[$parms]) : array_push($this->link, [$parms => $_GET[$parms]]);
            return $_GET[$parms];
           
         }else{

            return "";

         }

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
        // category
        $attributes = Attribute::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->with('subAttributes')->get();
        $brands = Brand::WHERE('country_id','=',$shopId)->get();
        $categories = Category::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->with('subCategories')->get();
        $wines = Wine::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->with('subWines')->get();
        $offers = Offer::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->with('subOffers')->get();
        $grapes = Grape::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->with('subGrapes')->get();
        $pairs = Pairing::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->with('subPairing')->get();
        $countries = Country::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->with('regions')->get();

        $page = "add_product";
        $allShops = shop::all();
    
      //  $blogs = Blog::WHERE('publish', '<=', now())->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $shopId)->orderBy('created_at', 'DESC')->get();

         //###################  PAGE NAME #########################
         $page = "add_product";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.product.add_product',compact('categories','attributes','brands','page','allShops', 'wines', 'offers', 'grapes', 'pairs', 'countries'));
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
                $results = Product::WHERE('product_name', $request->input('product_name'))->WHERE('country_id','=',$shopId)->get();
                $slug = $this->checker_slug($request->input('product_name'), $old_slug = null,$results);
            // END OF SLUG

            $img1 = "";
            $img2 = "";
 
            // IMAGE PROCESSOR
                if ($request->hasFile('picx')) {
                    $images = $request->file('picx');
                   
                    foreach($images as $key => $pic){
                    $image_name = $slug.$key.time().'.'.$pic->getClientOriginalExtension();
                    $destinationPath = public_path('/product_images');
                    $pic->move($destinationPath, $image_name);
                        if($key == 0){
                            $img1 = $image_name;
                        }else{
                            $img2 = $image_name;
                        }
                    }
        
                }else{

                    $image_name = "";
                }
        
            // END  IMAGE PROCESSOR

            
            //BING PARAM
            $product = new Product;
            $product->product_name = $request->input('product_name');
            $product->slug =  $slug;
            $product->description = $request->input('short_description');
            $product->short_description = $request->input('description');
            $product->more_description = $request->input('more_description');
            $product->img1 = $img1;
            $product->img2 = $img2;
            $product->video = $request->input('video_link');
            $product->tag = $request->input('tag');
            $product->visibility = $request->input('visibility');
            $product->publish = $request->input('publish');
            $product->featured = $request->input('featured');
            $product->light = $request->input('light');
            $product->smooth = $request->input('smooth');
            $product->dry = $request->input('dry');
            $product->soft = $request->input('soft');
            $product->base_price = $request->input('sales')[0] == "" || $request->input('sales')[0] == "0.0" ? $request->input('regular')[0] : $request->input('sales')[0]; // default price
            $product->country_id = $shopId;

            //END BING PARAM

            // SAVE
            $product->save();

            $product->categories()->syncWithoutDetaching($request->input('category'));
            $product->brands()->syncWithoutDetaching($request->input('brand'));
            $product->wines()->syncWithoutDetaching($request->input('wines'));
            $product->offers()->syncWithoutDetaching($request->input('offers'));
            $product->grapes()->syncWithoutDetaching($request->input('grapes'));
            $product->pairing()->syncWithoutDetaching($request->input('pairs'));
            $product->country()->syncWithoutDetaching($request->input('country'));


            //VARIABLE PRODUCT
            $attrs = $request->input('attrs');
            $regular = $request->input('regular');
            $sales = $request->input('sales');
            $sku = $request->input('sku');
            $qty = $request->input('qty');
            $stock = $request->input('stock');
            $wty = $request->input('wty');
            $lengh = $request->input('lengh');
            $wth = $request->input('wth');
            $hty = $request->input('hty');

            //total
            $total = count($attrs);
            for ($i=0; $i < $total; $i++) { 
              
                $v_product = new VariableProduct;
                $v_product->attribute_id = $attrs[$i];
                $v_product->regular_price =  $regular[$i];
                $sales[$i] == '' ? '0.0' : $v_product->sale_price = $sales[$i];
                $v_product->sku =  $sku[$i];
                $v_product->quantity = $qty[$i];
                $v_product->stock =  $stock[$i];
                $wty[$i] == '' ? '' : $v_product->weight =  $wty[$i];
                $lengh[$i] == '' ? '' : $v_product->product_lenght =  $wty[$i];
                $wth[$i] == '' ? '' : $v_product->product_width =  $wty[$i];
                $hty[$i] == '' ? '' : $v_product->product_height =  $wty[$i];
                $v_product->product_id = $product->id;

                // SAVE
                $v_product->save();

            }

            // GALLERY
            if($request->hasFile('gallery')){

                $pics = $request->file('gallery');

                foreach($pics as $pic){

                    $image_name = $slug.rand().'.'.$pic->getClientOriginalExtension();
                    $destinationPath = public_path('/product_images');
                    $pic->move($destinationPath, $image_name);
                    // STORE 
                     $gallery = new Gallery_product;
                     $gallery->product_id = $product->id;
                     $gallery->img = $image_name;
                     $gallery->save();

                 }
        
            }

            // dd($product);
          
            // $success =  'success';
            // return $success;
            $success = 'You Have Added a New Product Successfully .';
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
            $product = Product::with(['variableProduct','categories','wines','offers','grapes','pairing','country','gallery','brand'])->find($id);
            $categories = Category::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->with('subCategories')->get();
            $attributes = Attribute::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->with('subAttributes')->get();
            $brands = Brand::WHERE('country_id','=',$shopId)->get();
            $wines = Wine::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->with('subWines')->get();
            $offers = Offer::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->with('subOffers')->get();
            $grapes = Grape::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->with('subGrapes')->get();
            $pairs = Pairing::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->with('subPairing')->get();
            $countries = Country::WHERE('country_id','=',$shopId)->WHERE('parent', 0)->with('regions')->get();
            $page = "add_product";
            $allShops = shop::all();
           // dd($product);
            return view('admin.product.edit_product',compact('product','categories','attributes','brands','page','allShops', 'wines', 'offers', 'grapes', 'pairs', 'countries'));
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
         $product = Product::find($id);
        
         $img1 = "";
         $img2 = "";

         // SLUG
         // To check whether two pieces of content with the same title.
             $results = Product::WHERE('product_name', $request->input('product_name'))->WHERE('country_id','=',$shopId)->get();
             $slug = $this->checker_slug($request->input('product_name'), $product->slug,$results);
         // END OF SLUG

     
         // IMAGE PROCESSOR
             if ($request->hasFile('img1')) {

                     $images = $request->file('img1');
                     $image1_name = $slug.time().'.'.$images->getClientOriginalExtension();
                     $destinationPath = public_path('/product_images');
                     $images->move($destinationPath, $image1_name);

                 // 
                 $product->img1 = $image1_name;
             }

             if ($request->hasFile('img2')) {
                 $images = $request->file('img2');
                 $image2_name = $slug.time().'.'.$images->getClientOriginalExtension();
                 $destinationPath = public_path('/product_images');
                 $images->move($destinationPath, $image2_name);
                 // 
                 $product->img2 = $image2_name;
             }
     
        // END  IMAGE PROCESSOR
        
          
             $product->product_name = $request->input('product_name');
             $product->slug =  $slug;
             $product->description = $request->input('short_description');
            $product->short_description = $request->input('description');
            $product->more_description = $request->input('more_description');
             $product->video = $request->input('video_link');
             $product->tag = $request->input('tag');
             $product->visibility = $request->input('visibility');
             $product->publish = $request->input('publish');
             $product->featured = $request->input('featured');
             $product->light = $request->input('light');
             $product->smooth = $request->input('smooth');
             $product->dry = $request->input('dry');
             $product->soft = $request->input('soft');
             $product->base_price = $request->input('sales')[0] == "" || $request->input('sales')[0] == "0.0" ? $request->input('regular')[0] : $request->input('sales')[0]; // default price
             $product->country_id = $shopId;
 
             //END BING PARAM
 
             // SAVE
             $product->save();
 
             $product->categories()->syncWithoutDetaching($request->input('category'));
             $product->brands()->syncWithoutDetaching($request->input('brand'));
             $product->wines()->syncWithoutDetaching($request->input('wines'));
             $product->offers()->syncWithoutDetaching($request->input('offers'));
             $product->grapes()->syncWithoutDetaching($request->input('grapes'));
             $product->pairing()->syncWithoutDetaching($request->input('pairs'));
             $product->country()->syncWithoutDetaching($request->input('country'));
 
 
             //VARIABLE PRODUCT
             $ids = $request->input('ids');
             $attrs = $request->input('attrs');
             $regular = $request->input('regular');
             $sales = $request->input('sales');
             $sku = $request->input('sku');
             $qty = $request->input('qty');
             $stock = $request->input('stock');
             $wty = $request->input('wty');
             $lengh = $request->input('lengh');
             $wth = $request->input('wth');
             $hty = $request->input('hty');
 
             //total
             
             foreach ( $attrs as $key => $attr ) {

                if(count($ids) > $key && $ids[$key] != "" ){
                    
                        $v_product = VariableProduct::find($ids[$key]);
                        $v_product->attribute_id = $attr;
                        $v_product->regular_price =  $regular[$key];
                        $sales[$key] == '' ? '0.0' : $v_product->sale_price = $sales[$key];
                        $v_product->sku =  $sku[$key];
                        $v_product->quantity = $qty[$key];
                        $v_product->stock =  $stock[$key];
                        $wty[$key] == '' ? '' : $v_product->weight =  $wty[$key];
                        $lengh[$key] == '' ? '' : $v_product->product_lenght =  $wty[$key];
                        $wth[$key] == '' ? '' : $v_product->product_width =  $wty[$key];
                        $hty[$key] == '' ? '' : $v_product->product_height =  $wty[$key];
                        $v_product->product_id = $product->id;
        
                        // SAVE
                        $v_product->save();
        
                }else{

                        $v_product = New VariableProduct;
                        $v_product->attribute_id = $attr;
                        $v_product->regular_price =  $regular[$key];
                        $sales[$key] == '' ? '0.0' : $v_product->sale_price = $sales[$key];
                        $v_product->sku =  $sku[$key];
                        $v_product->quantity = $qty[$key];
                        $v_product->stock =  $stock[$key];
                        $wty[$key] == '' ? '' : $v_product->weight =  $wty[$key];
                        $lengh[$key] == '' ? '' : $v_product->product_lenght =  $wty[$key];
                        $wth[$key] == '' ? '' : $v_product->product_width =  $wty[$key];
                        $hty[$key] == '' ? '' : $v_product->product_height =  $wty[$key];
                        $v_product->product_id = $product->id;
        
                        // SAVE
                        $v_product->save();

                }
             }
 
             // GALLERY
             if($request->hasFile('gallery')){
 
                 $pics = $request->file('gallery');
 
                 foreach($pics as $pic){
 
                     $image_name = $slug.rand().'.'.$pic->getClientOriginalExtension();
                     $destinationPath = public_path('/product_images');
                     $pic->move($destinationPath, $image_name);
                     // STORE 
                      $gallery = new Gallery_product;
                      $gallery->product_id = $product->id;
                      $gallery->img = $image_name;
                      $gallery->save();
 
                  }
         
             }
 
            //  dd($product);
           
            //  $success =  'success';
            //  return $success;

            $success = 'You Have Updated a Product Successfully .';
            return back()->with(['success' => $success]);
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_product(Request $request)
    {
        try{
             // SHOP ID
             $shopId = Session::get('shopId');

            //Selected
            $product_id = $request->input('id');
            $product = Product::find($product_id);
           
            $img1 = "";
            $img2 = "";

            // SLUG
            // To check whether two pieces of content with the same title.
                $results = Product::WHERE('product_name', $request->input('product_name'))->WHERE('country_id','=',$shopId)->get();
                $slug = $this->checker_slug($request->input('product_name'), $product->slug,$results);
            // END OF SLUG

        
            // IMAGE PROCESSOR
                if ($request->hasFile('image1')) {

                        $images = $request->file('image1');
                        $image1_name = $slug.time().'.'.$images->getClientOriginalExtension();
                        $destinationPath = public_path('/product_images');
                        $images->move($destinationPath, $image1_name);

                    // 
                    $product->img1 = $image1_name;
                }

                if ($request->hasFile('image2')) {
                    $images = $request->file('image2');
                    $image2_name = $slug.time().'.'.$images->getClientOriginalExtension();
                    $destinationPath = public_path('/product_images');
                    $images->move($destinationPath, $image2_name);
                    // 
                    $product->img2 = $image2_name;
                }
        
           // END  IMAGE PROCESSOR

              
            
            //BING PARAM
                $product->product_name = $request->input('product_name');
                $product->slug =  $slug;
                $product->description = $request->input('description');
                $product->short_description = $request->input('short_description');
                $product->more_description = $request->input('more_description');
                $product->category = $request->input('category');
                $product->tag = $request->input('tag');
                $product->visibility = $request->input('visibility');
                $product->publish = $request->input('publish');
                $product->featured = $request->input('featured');
                $product->country_id = $shopId;
            //END BING PARAM

            // SAVE
              $product->save();


            // GET PRODUCT ID
            // $product = Product::WHERE('slug', $slug)->get();
            // foreach ($product as $key => $value) {
            //      // current product id
            //      $product_id = $value['id'];
            // }
           

            // GALLERY
            if($request->hasFile('gallerypicx')){

                $pics = $request->file('gallerypicx');
                foreach($pics as $key => $pic){
                    $image_name = $slug.$key.time().'.'.$pic->getClientOriginalExtension();
                    $destinationPath = public_path('/product_images');
                    $pic->move($destinationPath, $image_name);
                    // STORE 
                     $gallery = new ProductGallery;
                     $gallery->product_id = $product_id;
                     $gallery->img = $image_name;
                     $gallery->save();

                 }
        
            }

            //VARIABLE PRODUCT
        if($request->input('attrs') != null){
            
            $attrs = explode(",",$request->input('attrs'));
            $regular = explode(",",$request->input('regular'));
            $sales = explode(",",$request->input('sales'));
            $sku = explode(",",$request->input('sku'));
            $qty = explode(",",$request->input('qty'));
            $stock = explode(",",$request->input('stock'));
            $wty = explode(",",$request->input('wty'));
            $lengh = explode(",",$request->input('lengh'));
            $wth = explode(",",$request->input('wth'));
            $hty = explode(",",$request->input('hty'));

            //Total
            $total = count($regular);
         
            for ($i=0; $i < $total; $i++) { 
              
                $v_product = new VariableProduct;
                $v_product->attribute_id = $attrs[$i];
                $v_product->regular_price =  $regular[$i];
                $v_product->sale_price = $sales[$i];
                $v_product->sku =  $sku[$i];
                $v_product->quantity = $qty[$i];
                $v_product->stock =  $stock[$i];
                $v_product->weight =  $wty[$i];
                $v_product->product_lenght = $lengh[$i];
                $v_product->product_width = $wth[$i];
                $v_product->product_height =  $hty[$i];
                $v_product->product_id = $product_id;

                // SAVE
                $v_product->save();

            }
        }

              //VARIABLE PRODUCT
              $ids = explode(",",$request->input('ids'));
              $attrs1 = explode(",",$request->input('attrs1'));
              $regular1 = explode(",",$request->input('regular1'));
              $sales1 = explode(",",$request->input('sales1'));
              $sku1 = explode(",",$request->input('sku1'));
              $qty1 = explode(",",$request->input('qty1'));
              $stock1 = explode(",",$request->input('stock1'));
              $wty1 = explode(",",$request->input('wty1'));
              $lengh1 = explode(",",$request->input('lengh1'));
              $wth1 = explode(",",$request->input('wth1'));
              $hty1 = explode(",",$request->input('hty1'));
  
              //Total
              $totals = count($ids);
  
              for ($i=0; $i < $totals; $i++) { 
                
                  $v_product = VariableProduct::find($ids[$i]);
                  $v_product->attribute_id = $attrs1[$i];
                  $v_product->regular_price =  $regular1[$i];
                  $v_product->sale_price = $sales1[$i];
                  $v_product->sku =  $sku1[$i];
                  $v_product->quantity = $qty1[$i];
                  $v_product->stock =  $stock1[$i];
                  $v_product->weight =  $wty1[$i];
                  $v_product->product_lenght = $lengh1[$i];
                  $v_product->product_width = $wth1[$i];
                  $v_product->product_height =  $hty1[$i];

                  // SAVE
                  $v_product->save();
  
              }

             //NOTE 
             $note = Note::WHERE('product_id', $product_id)->first();

             if($note){

                    // IMAGE PROCESSOR
                    if ($request->hasFile('short_note_img')) {

                        $images = $request->file('short_note_img');
                        $note_img = $slug.time().'.'.$images->getClientOriginalExtension();
                        $destinationPath = public_path('/product_images');
                        $images->move($destinationPath, $note_img);
                        $note->img = $note_img;
                    }
                    // END  IMAGE PROCESSOR
                
                    $note->details = $request->input('short_note');;
                    $note->save();
            }
          
            $success =  'success';
            return $success;
            //return view('admin.blog.add_blog',compact('categories','parent','success'));
        
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

            $product = Product::find($id)->delete();
            $gallary = Gallery_product::WHERE('product_id', $id)->delete();
            $v_product = VariableProduct::WHERE('product_id', $id)->delete();
            
            $success = 'Deleted Successfully .';
            return redirect('/admin/product')->with(['success' => $success]);

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_v_product(Request $request)
    {
        //
        try{

             $v_product = VariableProduct::WHERE('id', $request->input('id'))->delete();
             // AFTER DELETE
             return "success";

            }catch(\Exception $e) {
            return $e->getMessage();
            }


    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_gallery(Request $request)
    {
        //
        try{

             $p_gallery = Gallery_product::WHERE('id', $request->input('id'))->delete();
             // AFTER DELETE
             return "success";
             
        }catch(\Exception $e) {
            return $e->getMessage();
        }


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addproduct(Request $request)
    {
         // SHOP ID
     $shopId = Session::get('shopId');

     $parent = Attribute::WHERE('parent', 0)->WHERE('country_id','=',$shopId)->get();
     $attributes = Attribute::WHERE('country_id','=',$shopId)->get();
     $id = $request->input('id');
     $product = ' <div class="block"  id="'.$id.'">
                         
        <div class="block-content">
           <div class="form-horizontal">
                                           
                <div class="form-group">
                        <label class="col-xs-2" for="example-select">Select Attribute(s)</label>
                        <div class="col-sm-8">
                          <select  class="form-control" name="attr[]" style="width: 100%;" required >

                            <option >None</option>';
                            foreach($parent as $key => $row) {
                                $product .= ' <option  disabled >' .$row['title'] .'</option>';
                                    foreach ($attributes as $key => $value) {
                                        if($value['parent'] == $row['id']){
                                           $product .= '  <option value="'.$value['id'].'"> <span aria-hidden="true">—</span>' .$value['title'] .'</option>';
                                        }
                                    }
                            }
                            $product .=  '</select>
                        </div>
                </div>
                    
                 <div class="form-group">
                        <label class="col-xs-2" for="example-text-input">Regular Price </label>
                       <div class="col-sm-8">
                         <input class="form-control" type="text" value="0" id="example-text-input" name="regular[]" >
                        </div>
                 </div>
       
               <div class="form-group">
                 <label class="col-xs-2" for="example-text-input">Sale Price</label>
                       <div class="col-sm-8">
                       <input class="form-control" value="0" type="text" id="example-text-input" name="sales[]" >
                      </div>
                </div>
    
            <div class="form-group">
            <label class="col-xs-2" for="example-text-input">SKU</label>
                        <div class="col-sm-8">
                        <input class="form-control" type="text" id="example-text-input" name="sku[]" >
        
                </div>
            </div>
        
            <div class="form-group">
            <label class="col-xs-2" for="example-text-input">Stock quantity</label>
                        <div class="col-sm-8">
                    <input class="form-control" type="number" id="example-text-input" name="qty[]" value="0" >
        
                </div>
            </div>
            <div class="form-group">
            <label class="col-xs-2" for="example-select">Select Category</label>
                <div class="col-sm-8">
                <select class="form-control" id="example-select" name="stock[]" size="1">
                        <option value="In stock">In stock</option>
                        <option value="Out of Stock">Out of Stock </option>
                    </select>
                </div>
            </div>
    
            <div class="form-group">
                    <label class="col-xs-2" for="example-text-input">Weight (kg) </label>
                          <div class="col-sm-8">
                  <input class="form-control" type="number" id="example-text-input" name="wty[]" step="0.01" value="0" >
          
                    </div>
             </div>
          
             <div class="form-group">
                 <label class="col-xs-2" for="example-text-input">Dimensions </label>
                          <div class="col-sm-3">
                  <input class="form-control" type="number" id="example-text-input" step="0.01" name="lengh[]" placeholder="Lengh"  value="0" >
          
                    </div>
          
                    <div class="col-sm-3">
                  <input class="form-control" type="number" id="example-text-input" step="0.01" name="wth[]" placeholder="Width" value="0" >
          
                    </div>
          
                    <div class="col-sm-2">
                  <input class="form-control" type="number" id="example-text-input" step="0.01"  name="hty[]" placeholder="Height" value="0" >
          
                    </div>
             </div>

         <div class="form-group">   
             <div class="col-sm-10 text-right">
                <a href="javascript:void(0);" onclick="deleteProduct('.$id.')"> Remove </a>
             </div>
         </div>
                     
        </div>
       </div>
    </div>';

    return $product;
    }


    public function checker_slug($name, $old_slug = null,$results){
        // To check whether  
      $q_count = count($results);
      $count=1;
      if($q_count > 0){
        
            foreach ($results as $key => $result) {
            if($q_count > 0  && $key == 0 &&  $old_slug != null ){
            $slug_name = $result['product_name'];
            }else{
             $slug_name = $result['product_name']."-".$count++;
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
