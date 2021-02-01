<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Newsletter;
use Carbon\Carbon;
use App\Category;
use App\Product;
use App\Customer;
use Session;
use App\Attribute;
use App\ProductGallery;
use App\VariableProduct;
use App\shop;
use App\WishList;
use App\Wine;
use App\Offer;
use App\Pairing;
use App\Grape;
use App\Country;
use App\Slider;
use App\Order;
use App\Coupon;
use App\Shippingrate;
use App\Shipping;
use App\OrderProduct;
use App\Shippingcountry;
use App\Paymentmethod;
use App\Blog;
use App\Blogcategory;
use Validator;
use Auth;
use Cookie;
use DB;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use App\Mail\TestEmail;
use App\Review;
use Paystack;

class publicController extends Controller
{
     
     public $shopId = 1 ;
     public $shop_currency ;
    

     public function __construct()
     {
       
        //if(Cookie::get('age') == false){

        	//redirect()->route('age-verification')->send();
        	// return redirect('/age-verification');
        //}
        
     }
     
    public function index()
    {

        $curDateTime = now();

        $sliders = Slider::WHERE('publish',"Yes")
                    ->WHERE('country_id', '=', $this->shopId)
                    ->orderby('id','ASC')
                    ->get();

        $newArrivals = Product::WHERE('products.country_id', '=', $this->shopId)
                    ->WHERE('visibility',  "Public")
                    ->WHERE('publish', '<=', $curDateTime)
                    ->with(['variableProductAttributes'])
                    ->latest()
                    ->take(6)
                    ->get();

        $bestSales = DB::table('products')
                    ->leftJoin('order_products','products.id','=','order_products.product_id')
                    ->leftJoin('reviews','products.id','=','reviews.product_id')
                    ->selectRaw('products.*, reviews.*, COALESCE(sum(order_products.quantity),0) total, COALESCE(avg(reviews.rating),0) avgrating ')
                    ->groupBy('products.id')
                    //->WHERE('visibility',  "Public")
                    ->WHERE('publish', '<=', $curDateTime)
                    ->orderBy('total','desc')
                    ->take(8)
                    ->get();

        $topRatedProducts = DB::table('products')
                    ->leftJoin('reviews','products.id','=','reviews.product_id')
                    ->join('country_product', 'products.id', '=', 'country_product.product_id')
                    ->selectRaw('products.*, reviews.*, COALESCE(avg(reviews.rating),0) total')
                    ->groupBy('products.id')
                   // ->WHERE('visibility',  "Public")
                    ->WHERE('publish', '<=', $curDateTime)
                    ->orderBy('total','desc')
                    ->take(8)
                    ->get();

        $featuredProducts = Product::WHERE('visibility',  "Public")
                    ->WHERE('featured',  "Home")
                    ->WHERE('publish', '<=', $curDateTime)
                    ->WHERE('country_id', '=', $this->shopId)
                    ->orderBy('publish', 'ASC')
                    ->take(8)
                    ->get();

        $cat_id = Category::where('slug', '=', 'champagne')->pluck('id')->first();
        $featuredCategory = Product::WHERE('visibility',  "Public")
                            ->WHERE('featured',  "Home")
                            ->WHERE('publish', '<=', $curDateTime)
                            ->WHERE('country_id', '=', $this->shopId)
                            ->whereHas('categories', function ($query) use ($cat_id) {
                                $query->where('category_id', $cat_id);
                            })
                            ->orderBy('publish', 'ASC')
                            ->take(8)
                            ->get();
      // dd($bestSales);
      return view('pages.index',compact('newArrivals','bestSales','topRatedProducts','featuredProducts','featuredCategory'));

    }

    
    public function products()
    {

        $products = Product::WHERE('products.country_id', '=', $this->shopId)
        ->with(['variableProductAttributes','categories','pairing','country','reviews', 'gallery']);
        
        // PAGINATION
        if(isset($_GET['pn'])){

            $pn = $_GET['pn'];
            $this->SearchPagination("pn");
        } else{

            $pn = 5;
        }


        if(isset($_GET['fetch_data']) ||isset($_GET['wine']) || isset($_GET['offers']) || isset($_GET['country']) || isset($_GET['pairing']) || isset($_GET['grapes']) || isset($_GET['category'])){

            if(isset($_GET['wine'])){

               // $getWinesID = explode(",",$_GET['wine']);
                $getWinesID[] = $_GET['wine'];
                $wines = Wine::whereIN('slug',$getWinesID)->with('subWines')->get();
                $wineIDs = filterIds($wines,'subWines');

                //dd($getWinesID);

                $products = $products->whereHas('wines', function ($query) use ($wineIDs) {
                    $query->whereIN('wine_id', $wineIDs);
                 });
                
                $this->SearchPagination("wine");

            }

            if(isset($_GET['offers'])){

                $getOffersID[] = $_GET['offers'];
                $offers = Offer::whereIN('slug',$getOffersID)->with('subOffers')->get();
                $offerIDs = filterIds($offers,'subOffers');

                $products = $products->whereHas('offers', function ($query) use ($offerIDs) {
                    $query->whereIN('offer_id', $offerIDs);
                 });

                $this->SearchPagination("offers");


            }

            if(isset($_GET['pairing'])){

                $getPairingID[] = $_GET['pairing'];
                $pairings = Pairing::whereIN('slug',$getPairingID)->with('subPairing')->get();
                $pairIDs = filterIds($pairings,'subPairing');

                $products = $products->whereHas('pairing', function ($query) use ($pairIDs) {
                    $query->whereIN('pairing_id', $pairIDs);
                 });

                $this->SearchPagination("pairing");

            }


            if(isset($_GET['grapes'])){

                $getGrapesID[] = $_GET['grapes'];
                $grapes = Grape::whereIN('slug',$getGrapesID)->with('subGrapes')->get();
                $grapeIDs = filterIds($grapes,'subGrapes');

                $products = $products->whereHas('grapes', function ($query) use ($grapeIDs) {
                    $query->whereIN('grape_id', $grapeIDs);
                });

                $this->SearchPagination("grapes");

            }


            if(isset($_GET['country'])){

                $getSlugs[] = $_GET['country'];
                // dd($getSlugs);
                $countries = Country::whereIN('slug',$getSlugs)->with('regions')->get();
                $ids = filterIds($countries,'regions');
               // dd($ids);
                $products = $products->whereHas('country', function ($query) use ($ids) {
                    $query->whereIN('country_product.country_id', $ids);
                });

                $this->SearchPagination("country");

            }


            if(isset($_GET['category'])){

                $getSlugs[] = $_GET['category'];
                $categories = Category::whereIN('slug',$getSlugs)->with('subCategories')->get();
                $ids = filterIds($categories,'subCategories');
                //dd($idss);
                $products = $products->whereHas('categories', function ($query) use ($ids) {
                    $query->whereIN('category_id', $ids);
                });

                $this->SearchPagination("category");

            }

        }

        $products = $products->latest()
        ->paginate($pn)
        ->setPath('/products');
        !empty($this->link) ? $products = $products->appends($this->link) : "";

        return view('pages.products',compact('products'));

        //return response()->json($products, 200);

       // dd($products);

        
    }

    public function search()
    {

       // if(isset($_GET['keyword'])){

                if(isset($_GET['keyword'])){

                    $keyword = $_GET['keyword'];
                    $this->SearchPagination("keyword");
                } else{

                    $keyword = "";
                }

             $products = Product::WHERE('country_id', '=', $this->shopId)
             ->search($keyword)
             // ->with(['variableProductAttributes','categories','pairing','country','reviews', 'gallery'])
             ->latest()
            ->paginate(12)
            ->setPath('/search');
            !empty($this->link) ? $products = $products->appends($this->link) : "";
          
            //  dd($products);
            return view('pages.search',compact('products','keyword'));

        // }
      
      
    }


    public function filter_products()
    {

        $products = Product::WHERE('products.country_id', '=', $this->shopId)
        ->with(['variableProductAttributes','categories','pairing','country','reviews', 'gallery']);
        
        // PAGINATION
        if(isset($_GET['pn'])){

            $pn = $_GET['pn'];
            $this->SearchPagination("pn");
        } else{

            $pn = 5;
        }


        if(isset($_GET['fetch_data']) ||isset($_GET['wine']) || isset($_GET['offers']) || isset($_GET['country']) || isset($_GET['pairing']) || isset($_GET['grapes']) || isset($_GET['category'])){

            if(isset($_GET['wine'])){

               // $getWinesID = explode(",",$_GET['wine']);
                $getWinesID[] = $_GET['wine'];
                $wines = Wine::whereIN('slug',$getWinesID)->with('subWines')->get();
                $wineIDs = filterIds($wines,'subWines');

                //dd($getWinesID);

                $products = $products->whereHas('wines', function ($query) use ($wineIDs) {
                    $query->whereIN('wine_id', $wineIDs);
                 });
                
                $this->SearchPagination("wine");

            }

            if(isset($_GET['offers'])){

                $getOffersID[] = $_GET['offers'];
                $offers = Offer::whereIN('slug',$getOffersID)->with('subOffers')->get();
                $offerIDs = filterIds($offers,'subOffers');

                $products = $products->whereHas('offers', function ($query) use ($offerIDs) {
                    $query->whereIN('offer_id', $offerIDs);
                 });

                $this->SearchPagination("offers");


            }

            if(isset($_GET['pairing'])){

                $getPairingID[] = $_GET['pairing'];
                $pairings = Pairing::whereIN('slug',$getPairingID)->with('subPairing')->get();
                $pairIDs = filterIds($pairings,'subPairing');

                $products = $products->whereHas('pairing', function ($query) use ($pairIDs) {
                    $query->whereIN('pairing_id', $pairIDs);
                 });

                $this->SearchPagination("pairing");

            }


            if(isset($_GET['grapes'])){

                $getGrapesID[] = $_GET['grapes'];
                $grapes = Grape::whereIN('slug',$getGrapesID)->with('subGrapes')->get();
                $grapeIDs = filterIds($grapes,'subGrapes');

                $products = $products->whereHas('grapes', function ($query) use ($grapeIDs) {
                    $query->whereIN('grape_id', $grapeIDs);
                });

                $this->SearchPagination("grapes");

            }


            if(isset($_GET['country'])){

                $getSlugs[] = $_GET['country'];
                // dd($getSlugs);
                $countries = Country::whereIN('slug',$getSlugs)->with('regions')->get();
                $ids = filterIds($countries,'regions');
               // dd($ids);
                $products = $products->whereHas('country', function ($query) use ($ids) {
                    $query->whereIN('country_product.country_id', $ids);
                });

                $this->SearchPagination("country");

            }


            if(isset($_GET['category'])){

                $getSlugs[] = $_GET['category'];
                $categories = Category::whereIN('slug',$getSlugs)->with('subCategories')->get();
                $ids = filterIds($categories,'subCategories');
                //dd($idss);
                $products = $products->whereHas('categories', function ($query) use ($ids) {
                    $query->whereIN('category_id', $ids);
                });

                $this->SearchPagination("category");

            }

        }

        $products = $products->latest()
        ->paginate($pn)
        ->setPath('/products');
        !empty($this->link) ? $products = $products->appends($this->link) : "";
        $items = "";

        foreach ($products as $product){

        $items .= '<div class="col-6 col-md-6 mb-4 col-lg-4">
          <div class="productmain">
			<a href="/products/'.$product->slug.'" class="product-img"> 
				<img src="/product_images/'.$product->img1.'"  class="as-background" alt="'.ucwords($product->product_name).'" height="100%">
			</a>

              <div class="bd-highlight px-2 pt-2">
				<p class="mb-0 product-small prd-brand">'. ucwords($product->product_name) .'</p>
				<div class="rating"> 
					<input type="radio" name="rating-'.$product->id.'" value="5" id="5-'.$product->id.'"'; if($product->review_summary->average_rating == 5 ){ $items .= 'checked'; } $items .= '>'.
					'<label for="5-'. $product->id .'">☆</label>
					<input type="radio" name="rating-{{ $product->id }}" value="4" id="4-'.$product->id .'"'; if($product->review_summary->average_rating >= 4 && $product->review_summary->average_rating < 5){ $items .= 'checked'; } $items .= '>'.
					'<label for="4-'. $product->id .'">☆</label>
					<input type="radio" name="rating-{{ $product->id }}" value="3" id="3-'.$product->id .'"'; if($product->review_summary->average_rating >= 3 && $product->review_summary->average_rating < 4 ){ $items .= 'checked'; } $items .= '>'.
					'<label for="3-{{ $product->id }}">☆</label>
					<input type="radio" name="rating-{{ $product->id }}" value="2" id="2-'. $product->id .'"'; if($product->review_summary->average_rating >= 2 && $product->review_summary->average_rating < 3){ $items .= 'checked'; } $items .= '>'.
					'<label for="2-'.$product->id .'">☆</label>
					<input type="radio" name="rating-'. $product->id .'" value="1" id="1-'.$product->id .'"'; if($product->review_summary->average_rating >= 1 && $product->review_summary->average_rating < 2){ $items .= 'checked'; } $items .= '>'.
					'<label for="1-'. $product->id .'">☆</label>
				</div>
			  </div>

              <div class="d-md-flex mb-2 align-items-end">
				<div class="mr-auto pl-2">
					<p class="product-small mb-0">Paris</p>
					<a href="/products/'.$product->slug.'" class="font-weight-bold"> '. ucwords($product->product_name) .'</a> 
				</div>
                <div class="px-2 font-weight-bold ">
                  <a href="/products/'. $product->slug .'" class="product-price">GhS '. number_format($product->base_price,2) .'</a>
                </div>
              </div>
              </div>
        </div>';
    
      }

    //   $items .= '<div class="col-12 text-center"><ul class="pagination pagination-md text-center">'.
    //   htmlspecialchars($products->links());
    //   '</ul></div>';

      $items .= $products->links('pages.includes.paginate_style');

      //dd($products);

        return $items;
        //return view('pages.products',compact('products'));

        //return response()->json($products, 200);

       // dd($products);

        
    }

    public function single_products($slug) 
    {
        $wishList = [];
        $review  = "";
        $product = Product::WHERE('products.country_id', '=', $this->shopId)
                    ->searchSlug($slug)
                    ->with(['variableProductAttributes','categories','pairing','countryRegion', 'gallery','wines'])
                    ->firstorfail();
        if(auth('customer')->user()){

            $wishList = WishList::WHERE('product_id','=', $product->id)->WHERE('customer_id','=',auth('customer')->user()->id)->get();

            $review = Review::WHERE('product_id','=', $product->id)->WHERE('customer_id','=',auth('customer')->user()->id)->first();

            if(!$review){

                $review = (object) [
                    "rating" => "0",
                    "comment" => ""
                ];
            }

        }
       

        $winesIds = $product->wines->pluck('id')->toArray();

        $similarProducts = Product::whereHas('wines', function ($query) use ($winesIds) {
            return $query->whereIn('id', $winesIds);
        })->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

           // dd($product);
                    
        return view('pages.single_product',compact('product','review','wishList','similarProducts'));


    }

    public function wishList(Request $request)
    {

        $customer = Customer::find(auth('customer')->user()->id);

        if(auth('customer')->user()->id){

            if($request->input('toggle') == 0){

                $customer->wishListProduct()->syncWithoutDetaching([ 
                    $request->input('productId')
                ]);
    
            }else{

                $wishList = WishList::WHERE('product_id','=', $request->input('productId'))->WHERE('customer_id','=',auth('customer')->user()->id)->delete();

            }
           
            return 'success';

        }else{

            return 'user cannot be found, please try again';
        }
    }

    public function menu($view) 
    {   
        $shop = shop::WHERE('id','=',$this->shopId)->first();
        $categories = Category::WHERE('parent', 0)->WHERE('country_id','=',$this->shopId)->with('subCategories')->get();
        $wines = Wine::WHERE('country_id','=',$this->shopId)->WHERE('parent', 0)->with('subWines')->get();
        $offers = Offer::WHERE('country_id','=',$this->shopId)->WHERE('parent', 0)->with('subOffers')->get();
        $grapes = Grape::WHERE('country_id','=',$this->shopId)->WHERE('parent', 0)->with('subGrapes')->get();
        $pairs = Pairing::WHERE('country_id','=',$this->shopId)->WHERE('parent', 0)->with('subPairing')->get();
        $countries = Country::WHERE('country_id','=',$this->shopId)->WHERE('parent', 0)->with('regions')->get();

        
        $menu = (object) [
            "shop" => $shop,
            "categories" => $categories,
            "wines" => $wines,
            "offers" => $offers,
            "grapes" => $grapes,
            "pairs" => $pairs,
            "countries" => $countries
        ];

        $view->with('menu', $menu);
        // return response()->json($menu, 200);

    }

    public function landing()
    {
        
        return view('pages.landing');

    }

    public function about()
    {
        
        return view('pages.about');

    }

    public function user_signup()
    {
        
        return view('pages.signup');

    }

    public function user_sign_in()
    {
        
        return view('pages.login');

    }

    public function userRegister(Request $request)
    {
      
        $this->validate($request, [

                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
                'password' => [
                    'required',
                    'string',
                    'confirmed',
                    'min:8',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                    
                ],
            ],

            [   
                'password.regex' => 'Your password must contain at least one uppercase,one number and one special character -for example: $, #, @, !,%,^,&,*,(,) ',
            ]
    
        );

        if($request->input('referral') == ""){


        }else{

            $customer = Customer::WHERE('referral_code', "=", $request->input('referral'))->first();
            if(!$customer){

                $success = 'Incorrect Referral Code, Please try again';
                return view('pages.signup',compact('success'));

            }
        }

        $password = Hash::make($request->input('password'));

        $customer = new Customer;
        $customer->fname = $request->input('fname');
        $customer->lname = $request->input('lname');
        $customer->email = $request->input('email');
        $customer->password = $password;
        $customer->referral = $request->input('referral');
        $customer->referral_code  = $request->input('lname')."-". str_random(3);
        $customer->shop_id =  $this->shopId;
        $customer->remember_token =  str_slug(Hash::make($request->input('password')).time());
        $customer->save();

        if( $customer ){

            if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password ])) {
                return redirect()->intended('/account');
            }

            // $success = 'Login';
            // return view('pages.signup',compact('success'));


        }else{

            $error = 'Check your form and Please try again';
            return view('pages.signup',compact('success'));

        }

    }

    public function userUpdate(Request $request)
    {

        $this->validate($request, [

                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255']
            ],
        );

        $customer = Customer::find(auth('customer')->user()->id);
        //$customer = Customer::find($request->id);
        $customer->fname = $request->input('fname');
        $customer->lname = $request->input('lname');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phonenumber');
        $customer->country = $request->input('country');
        $customer->address = $request->input('street');
        $customer->apartment = $request->input('apartment');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');
        $customer->zip = $request->input('zip');
        $customer->gender = $request->input('gender');
        $customer->dob = $request->input('dob');
    
        // SAVE
        $customer->save();
        
        if( $customer ){

            return ['message' => 'Success'];

        }else{

            return ['message' => 'Error '];

        }


    }

    public function image_upload(Request $request)
    {
 
        $validator = Validator::make($request->all(), [ 
              //'user_id' => 'required',
              'file'  => 'required|mimes:png,jpg|max:2048',
        ]);   
 
        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  
 
  
        if ($files = $request->file('file')) {
             
            //store file into document folder
            $file = $request->file->store('public/user_pic');
 
            //store your file into database
            $document = Customer::find(auth()->user()->id);
            $document->user_profile_image = $file;
            $document->save();
              
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
  
        }
 
  
    }

    public function changepassword(Request $request)
    {
        $this->validate($request, [
            'currentpassword' => ['required', 'min:8', 'max:255'],
            'password' => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            [   
                'password.regex' => 'Your password must contain at least one uppercase,one number and one special character -for example: $, #, @, !,%,^,&,*,(,) ',
            ],
        ]);

       $email = auth("customer")->user()->email;

        if (Auth::guard('customer')->attempt(['email' => $email, 'password' => $request->currentpassword], $request->get('remember'))) {
            
            $id = auth("customer")->user()->id;
            $customer = Customer::find($id);
            $customer->password = Hash::make($request->input('password'));
            $customer->save();

            return 'success';

        }else{
            
            return 'Incorrect Current Password';
        }

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if(!Auth::guard('customer')->attempt($credentials)){

            $request->flashOnly('email');
            $error = 'Incorrect Email or Password, Please try again';
            return view('pages.login',compact('error'));
        }

        return redirect()->intended('/account');
        
    }

    // cart
    public function changevarproduct($id)
    {
        $price = "";
        $quantities = "";
        $VariableProd = VariableProduct::find($id);
        $regularPrice = $VariableProd->regular_price;
        $salesPrice = $VariableProd->sale_price;
        $sku = $VariableProd->sku;
        if($salesPrice == 0){

            $price = "GHS ".number_format($regularPrice,2). '<br>';

        }else{

            $price =  "GHS ".number_format($salesPrice,2). '<br>'.
            '<strike> GHS '.number_format($regularPrice,2).'</strike>';
        }
     
       for ($i = 1; $i <= $VariableProd['quantity']; $i++){
        $quantities = $quantities.'<option value="'.$i.'" >'.$i.'</option>';
       }
      
       return array($price,$quantities,$sku);
      
    }


    public function AddToCart($id,$qty)
    {

        $VariableProduct = VariableProduct::find($id);
        $productId = $VariableProduct->product_id; 
        $attributeId = $VariableProduct->attribute_id;
        if($VariableProduct->sale_price > 0){
            $price = $VariableProduct->sale_price;
        } else {
            $price = $VariableProduct->regular_price;
        }
        $product = Product::find($productId);
        $attributeName = Attribute::find($attributeId);
       
        // for cart page
        $productPrice = 0;
        
        $i = 0;
        //$oldCart = Session::has('cart') ? Session::get('cart') : null;
        
        if(session()->get('cart')){
        
    
            $wasFound = false;
            $cartProducts =  session()->get('cart');
    
              // RUN IF THE CART AT LEAST ONE ITEM IN IT
            foreach($cartProducts as $each_item){
                $i++;
                
                if($each_item['productAttrId'] == $attributeId && $each_item['productId'] == $product->id && $each_item['variableProductId'] == $id  ){
    
                   
               array_splice($cartProducts, $i-1,1,array(array("productId" => $product->id, "productImage" => $product->img1, "productName" => $product->product_name, "productAttribute" => $attributeName->title, "productAttrId" => $attributeId,"productPrice" => $price, "productWeight" => $VariableProduct->weight,"variableProductId" => $VariableProduct->id, "quantity" => $qty, 'totalQty' => $VariableProduct->quantity)));
    
               Session::put('cart', $cartProducts);
    
               // FOR CART PAGE 
                
               $productPrice = $qty  *  $price;
    
               $wasFound = true;
                 }
             }
    
             if($wasFound == false){
    
                 session()->push('cart', array("productId" => $product->id, "productImage" => $product->img1, "productName" => $product->product_name, "productAttribute" => $attributeName->title, "productAttrId" => $attributeId,"productPrice" => $price, "productWeight" => $VariableProduct->weight,"variableProductId" => $VariableProduct->id,"quantity" => $qty, 'totalQty' => $VariableProduct->quantity));
          
             }
             
      // return var_dump(session()->get('cart'));
    
       }else{
          
        session()->put('cart', array(0 => array("productId" => $product->id, "productImage" => $product->img1, "productName" => $product->product_name, "productAttribute" => $attributeName->title, "productAttrId" => $attributeId,"productPrice" => $price, "productWeight" => $VariableProduct->weight,"variableProductId" => $VariableProduct->id, "quantity" => $qty, 'totalQty' => $VariableProduct->quantity)));
         
       }
    
            $items = "";
          //  $totalQty = count(session()->get('cart'));
            $totalQty = 0.0;
            $totalAmount = 0.0;
    
            foreach (session()->get('cart') as $key => $item){
    
                $url = url("product_images/".$item['productImage']);
                $totalPrice = $item['productPrice'] * $item['quantity'];
                $totalQty = $totalQty + $item['quantity'];
                $totalAmount = $totalAmount + $totalPrice;


                $items = $items.' 
                <div class="row" id="'.$key.'_cartPage">
                    <div class="col-3">
                    <img src="'.$url.'" class="img-fluid cartimage" alt="">
                    </div>
                    <div class="col-7">
                    <p class="mb-0 fot-titile">'.ucwords($item["productName"]).'</p>
                    <small class="">Quantity:<span>'.$item["quantity"].' </span></small> <br>
                    <small class="">Size:<span>'.$item["productAttribute"].'</span></small>
                    </div>
                    <div class="col-2 text-right">
                    <p class="fot-titile"> GHS <span>'.number_format($totalPrice,2).'</span></p>
                    
                    <small style="cursor: pointer;" onclick="deleteCartPage('.$key.')">Remove</small>
                    
                    </div>
                    <div class="col-12">
                    <hr>
                    </div>
                </div>';
                
            }

            $subTotal = $totalAmount;
            $discount = 0.0;
            $discountAmt = 0.0;

            if(session()->has('coupon')){

            
                if(session()->get('coupon')['type'] == "percentage"){

                    $discount = (session()->get('coupon')['discount'] / 100);
                    $discountAmt = $discount * $totalAmount;

                }elseif (session()->get('coupon')['type'] == "fixed") {

                    $discount = session()->get('coupon')['discount'];
        
                }

                $totalAmount = $totalAmount - $discountAmt;

            }
    
        return array($totalQty, number_format($subTotal,2), number_format($totalAmount,2), number_format($productPrice,2), number_format($discountAmt,2),$items);
       
    }

    public function blog()
    {       
            $today = now();

            // Featured Blog
            $featured = Blog::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('featured', '=', 'Yes')->WHERE('country_id', '=',  $this->shopId)
            ->with('categories')->latest()->first();

            $blogs = Blog::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shopId);

            if($featured){
                $blogs->WHERE('id', '!=', $featured->id);
            }

            $blogs->with('categories');

            // SEARCH
            isset($_GET['search']) ? $blogs = $blogs->search($_GET['search']) : "";
            
            // PAGINATION
            if(isset($_GET['pn'])){

                $pn = $_GET['pn'];
                $this->SearchPagination("pn");

            } else {

                $pn = 12;
            }

            if(isset($_GET['category'])){

                $getSlugs = explode(",",$_GET['category']);
                $categories = Blogcategory::whereIN('slug',$getSlugs)->with('subCategories')->get();
                $ids = $this->filterIds($categories,'subCategories');
                //dd($idss);
                $blogs = $blogs->whereHas('categories', function ($query) use ($ids) {
                    $query->whereIN('id', $ids);
                });

                $this->SearchPagination("category");

            }


            $blogs = $blogs->latest()
            ->paginate($pn)
            ->setPath('/blog');
            !empty($this->link) ? $blogs = $blogs->appends($this->link) : "";

         
            //dd($blogs);
            return view('pages.blog',compact('blogs','featured'));
           // return response()->json($blogs, 200);

    }

    public function all_blog_categories()
    {

        $categories = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$this->shopId)->with('subCategories')->paginate("15");
    
        return response()->json($categories, 200);

    }

    public function single_blog($slug)
    {

        $blog = Blog::WHERE('slug', $slug)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shopId)->with('categories')->orWHERE('id',$slug)->firstOrFail();
        $relatatedBlog = Blog::WHERE('slug','!=', $slug)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shopId)->orderBy('created_at', 'DESC')->with('categories')->take(3)->get();

        if($blog->type == "Video" || $blog->video != "" ){

            return view('pages.single-blog2',compact('blog','relatatedBlog'));
            
        }else{

            return view('pages.single-blog',compact('blog','relatatedBlog'));

        }

    }

    public function single_pairing($id)
    {

        $blog = Blog::WHERE('id', $id)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shopId)->with('categories')->firstOrFail();
        $relatatedBlog = Blog::WHERE('id','!=', $id)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shopId)->orderBy('created_at', 'DESC')->with('categories')->take(3)->get();

        return view('pages.single-blog',compact('blog','relatatedBlog'));
     
    }


    public function single_country($slug){

        $country = Country::WHERE('slug', $slug)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shopId)->with(['countryRegion','regions'])->firstOrFail();


        $topRatedProducts = DB::table('products')
                            ->leftJoin('reviews','products.id','=','reviews.product_id')
                            ->join('country_product', 'products.id', '=', 'country_product.product_id')
                            ->selectRaw('products.*, COALESCE(avg(reviews.rating),0) total')
                            ->groupBy('products.id');

                            if($country->type == "Country"){

                                $topRatedProducts = $topRatedProducts->WHEREIN('country_product.country_id',$country->regions->pluck('id')->toArray());

                            }else{

                                $topRatedProducts = $topRatedProducts->WHERE('country_product.country_id','=',$country->id);
                            }

                            $topRatedProducts = $topRatedProducts
                            ->orderBy('total','desc')
                            ->take(4)
                            ->get();

        // Product::whereHas('country', function ($query) use ($country) {

        //             return $query->whereIn('id', $winesIds);

        //         })->where('id', '!=', $product->id)
        //         ->limit(4)
        //         ->get();



      //  dd($topRatedProducts);
        // $relatatedBlog = Blog::WHERE('slug','!=', $slug)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shopId)->orderBy('created_at', 'DESC')->with('categories')->take(3)->get();
        //dd($country);
        return view('pages.single-country',compact('country','topRatedProducts'));
        // return response()->json(
        //     ['blog' => $blog, 'relatatedblog' => $relatatedBlog ]
        //     , 200);

	}
	
	// Videos
	public function allVideos() {
		return view('pages.videos');
	}

	public function singleVideo() {
		return view('pages.video');
	}

    // pagination filter
    private function SearchPagination($parms)
    { 
        if($_GET[$parms]){

            empty($this->link) ? $this->link = array($parms => $_GET[$parms]) : array_push($this->link, [$parms => $_GET[$parms]]);
            return $_GET[$parms];
            
        } else {

            return "";

        }
    }

    public function deleteCartPage($key_to_remove)
    {

        if($key_to_remove != ""){

            $cartProducts =  session()->get('cart');
            if(count($cartProducts) < 1){

                unset($cartProducts);
                Session::put('cart', '');

            }else{

                unset($cartProducts[$key_to_remove]);
                sort($cartProducts);
                Session::put('cart', $cartProducts);
            }

              $items = "";
              $totalQty = 0;
              $totalAmount = 0;
            foreach (session()->get('cart') as $key => $item){
                
                $url = url("product_images/".$item['productImage']);
                $totalPrice = $item['productPrice'] * $item['quantity'];
                $totalQty = $totalQty + $item['quantity'];
                $totalAmount = $totalAmount + $totalPrice;
    
                $items = $items.'
                <div class="row" id="'.$key.'_cartPage">
                    <div class="col-3">
                    <img src="'.$url.'" class="img-fluid cartimage" alt="">
                    </div>
                    <div class="col-7">
                    <p class="mb-0 fot-titile">'.ucwords($item["productName"]).'</p>
                    <small class="">Quantity:<span>'.$item["quantity"].' </span></small> <br>
                    <small class="">Size:<span>'.$item["productAttribute"].'</span></small>
                    </div>
                    <div class="col-2 text-right">
                    <p class="fot-titile"> GHS <span>'.number_format($totalPrice,2).'</span></p>
                    
                    <small style="cursor: pointer;" onclick="deleteCartPage('.$key.')">Remove</small>
                    
                    </div>
                    <div class="col-12">
                    <hr>
                    </div>
                </div>
                ';
            }

            return array($items,$totalQty,number_format($totalAmount,2));

            // return  array($totalQty,number_format($totalAmount,2));
        }

    }

    public function rating(Request $request){

        $customer = Customer::find(auth('customer')->user()->id);

        if($customer){

            $customer->product()->syncWithoutDetaching([ 
                $request->input('product_id') => ['rating' => $request->input('rating'), 'comment' => $request->input('comment')],
            ]);
            
            $message = "Success";
            return  $message;

        }else{

            $message = "Error";
            return  $message;
        }
    
    }

    public function reviews(){

            if(isset($_GET['productId'])){

                $id  = 1;
                $productId = $_GET['productId'];
                $reviews = Review::WHERE('product_id',$productId)->with('review_customer');
                if(auth('customer')->user()){
                    $reviews = $reviews->orderByRaw("(customer_id = ".auth('customer')->user()->id.") DESC");
                }
                $reviews = $reviews->paginate(2);
                $output = "";
                foreach ($reviews as $review){

                $output .=' 
                <div class="col-12 col-md-6 pr-md-5 mb-4">
                <div class="row centerit mb-3">
                    <div class="col-9">
                        <div class="media centerit">';
                            if($review->review_customer->user_profile_image == null){
                            $output .='<img src="/page_assets/img/review1.png" class=" reviewimage" alt="...">';
                            }else{
                            $output .='<img src="/user_pic/'.$review->review_customer->user_profile_image.'" class=" reviewimage" alt="'.$review->review_customer->fname.'" "'.$review->review_customer->lname.'">';
                            }
                            $output .='<div class="media-body pl-2">
                            <p class="mb-0"><strong>'.$review->review_customer->fname." ".$review->review_customer->lname.' </strong> </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">'.number_format($review->rating,1).' </li>
                                <li class="list-inline-item">
                                    <div class="rating"> 

                                        <input type="radio" name="rating-'.$review->customer_id .'" value="5" id="5-'. $review->customer_id .'"'; if($review->rating == 5){ $output .='checked'; } $output .='>
                                        <label for="5-'. $review->customer_id .'">☆</label>
                                        <input type="radio" name="rating-'.$review->customer_id .'" value="4" id="4-'. $review->customer_id .'"'; if($review->rating >= 4 && $review->rating < 5  ){ $output .=' checked'; } $output .='>
                                        <label for="4-'.$review->customer_id .'">☆</label>
                                        <input type="radio" name="rating-'. $review->customer_id .'" value="3" id="3-'. $review->customer_id .'"'; if($review->rating >= 3 && $review->rating < 4){ $output .='checked'; } $output .='>
                                        <label for="3-'. $review->customer_id .'">☆</label>
                                        <input type="radio" name="rating-'. $review->customer_id .'" value="2" id="2-'.$review->customer_id .'"'; if($review->rating >= 2 && $review->rating < 3){ $output .='checked';  } $output .=' >
                                        <label for="2-'. $review->customer_id .'">☆</label>
                                        <input type="radio" name="rating-'. $review->customer_id .'" value="1" id="1-{'.$review->customer_id .'"'; if($review->rating > 0  && $review->rating < 2){ $output .='checked'; } $output .='>
                                        <label for="1-'.$review->customer_id .'">☆</label>

                                    </div>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 text-right">
                        '. date('d M, Y', strtotime($review->created_at)) .'
                        
                    </div>
                </div>
                <p> '.$review->comment .' </p>
                </div>';
            
                
                }
                $btn = "";
                $btn .= $reviews->links('pages.includes.loadmore');

                return array($output,$btn);
            // dd($output);
        }else{

            return "Error";
        }
    }

    public function checkout()
    {

        $countries = Shippingcountry::WHERE('country_id','=',$this->shopId)->get();
        $paymentmethods = Paymentmethod::WHERE('shop_id', '=',$this->shopId)->firstorfail();
        $customer =  "";

       if(!auth('customer')->user()){
            $customer = (object) [

            "fname" => "",
            "lname" => "",
            "email" => "",
            "phone" => "",
            "country" => "",
            "address" => "",
            "apartment" => "",
            "city" => "",
            "state" => "",
            "zip" => ""

        ];

       }else{

            $customer = auth('customer')->user();
       }

       $calculation = $this->cart_calculation();

      return view('pages.checkout',compact('customer','calculation','countries'));

    }
          // ADD COUPON
    public function addcoupon(Request $request)
    {
              $tips_value = 0.0;
              $today = date("Y-m-d");
              $code = $request->input('coupon_code');
              $coupon = Coupon::WHERE('code',$code)->WHERE('valid_date','<=',$today)->WHERE('end_date','>=',$today)->WHERE('status','=','Yes')->WHERE('usage','>',0)->first();

              if(!$coupon){
      
                return [
                    'type' => 'error',
                    'message' => 'Invalid Coupon Code. Please try again.'.$code
                ];
      
              }else{
                   
                  if($coupon->usage > $coupon->total_used){
                        // check coupon Type
                        if($coupon->type == "fixed"){
                           $discountAmt = $coupon->value;
                           $type = "coupon";
                        }elseif($coupon->type == "percentage"){
                           $discountAmt = $coupon->percent_off;
                           $type = "coupon";
                        }elseif($coupon->type == "free shipping"){
                          $type = "shipping";
                          $discountAmt = 0.0;
                        }
      
                          // check coupon Type
                          if($coupon->t_type == "fixed"){
                              $tips_value = $coupon->t_amt;
                             
                          }elseif($coupon->t_type == "percentage"){
                              $tips_value = $coupon->t_percent_off;
                             
                          }
                          
                          $couponObj = (object) [
                            'id' => $coupon->id,
                            'code' => $coupon->code,
                            'type' => $coupon->type,
                            'discount' => $discountAmt,
                            // 'fullname' => $coupon->f_fullname,
                            // 'tips_type' => $coupon->t_type,
                            // 'tips_value' => $tips_value,
                            // 'f_email' =>  $coupon->f_email
                          ];
                          session()->put($type, $couponObj);
                
                        return [

                            'type' => 'success',
                            'message' => 'Coupon has been applied.',
                            'discount' => $discountAmt
                        ];
          
      
                  }else{
                        
                        return [
                            'type' => 'error',
                            'message' => 'Coupon Code has Exhausted. Please try again.'
                        ];
      
                  }
              }
    }

    public function checkoutrate($zone)
    {

         // RATE
         $rate = 0;

         if(session()->has('weight')){

            $weight = session()->get('weight');
            $rates = Shippingrate::WHERE('country_id','=', $this->shopId)->WHERE('kg','>=',$weight)->first();
            
            if(!empty($rates)){

                if($zone == 1){
                    $rate =  $rates->zone1;
                }elseif ($zone == 2) {
                    $rate =  $rates->zone2;
                }elseif ($zone == 3) {
                    $rate =  $rates->zone3;
                }elseif ($zone == 4) {
                    $rate =  $rates->zone4;
                }elseif ($zone == 5) {
                    $rate =  $rates->zone5;
                }elseif ($zone == 6) {
                    $rate =  $rates->zone6;
                }elseif ($zone == 7) {
                    $rate =  $rates->zone7;
                }elseif ($zone == 8) {
                    $rate = $rates->zone8;
                }
            }
        }

         Session::put('rate', $rate);

         return $rate;

    }

    private function cart_calculation()
    {
            
            $totalAmount = 00;
            $weight = 0.00;
            $tax  = 0.0;
            $qty = 0;
            $totalQty = 0;
            $subTotal = 0;
            $itemSubTotal = 0;
            $totalPrice = 0.0;
            $taxAmt = 0.0;
            $shipping = 0.0;
            $discount = 0.0;
            $couponCode = "";

            if(session()->has('cart')){

                foreach (session()->get('cart') as $key => $item){

                    $totalPrice = $item['productPrice'] * $item['quantity'];
                    $totalQty = $totalQty + $item['quantity'];
                    $weight = $weight + $item['productWeight'];
                    $subTotal = $subTotal + $totalPrice;

                }

                if(session()->has('coupon')){

                    $discount = session()->get('coupon')->discount;
                    $couponCode = session()->get('coupon')->code;

                }

                if(session()->has('rate')){

                    $shipping = session()->get('rate');

                }

                $taxAmt = ($tax / 100) * $totalAmount;
                $totalAmount = ($subTotal + $taxAmt + $shipping) - $discount;
            }

            $shop = shop::WHERE('id', '=', $this->shopId)
            ->WHERE('status', '=', 'Approved')
            ->with('payment_gateways')
            ->with('shipping_address')
            ->first();

            $calculation = (object)[

                "totalAmount" => $totalAmount,
                "weight" =>  $weight,
                "tax"  => $tax,
                "qty" => $qty,
                "totalQty" => $totalQty,
                "subTotal" => $subTotal,
                "itemSubTotal" => $itemSubTotal,
                "totalPrice" => $totalPrice,
                "taxAmt" => $taxAmt,
                "shipping" => $shipping,
                "discount" => $discount,
                "couponCode" => $couponCode,
                "shop" => $shop
            ];

            session()->put('weight',$weight);

            return $calculation;
    }
    
    public function checkout_store(Request $request)
    {               
                // cart calculation
                $calculation = $this->cart_calculation();

                $customer = \App\Customer::updateOrCreate(
                    ['email' => $request->input('billingemail')],
                    [
                        'fname' => $request->input('billingfname'), 
                        'lname' => $request->input('billingsname'),
                        'phone' => $request->input('billingpnumber'), 
                        'country' => $request->input('billingcountry'),
                        'address' => $request->input('billingaddress'), 
                        'apartment' => $request->input('billingapartment'), 
                        'city' => $request->input('billingcity'),
                        'state' => $request->input('billingstate'), 
                        'zip' => $request->input('billingzipcode'),
                        'remembertoken' => str_slug(Hash::make($request->input('billingemail'))).time(), 
                        'shop_id' => $this->shopId,
                    ]
                );

                $shipping = \App\Shipping::updateOrCreate(
                    ['ship_email' => $request->input('shippingemail')],
                    [
                        'fname' => $request->input('shippingfname'), 
                        'sname' => $request->input('shippingsname'),
                        'ship_address' => $request->input('shippingpaddress'), 
                        'ship_apartment' => $request->input('shippingapartment'),
                        'ship_phone' => $request->input('shippingpnumber'), 
                        'ship_city' => $request->input('shippingcity'), 
                        'ship_state' => $request->input('shippingstate'),
                        'ship_zip' => $request->input('shippingzip'), 
                        'ship_digital_address' => $request->input('shippingdigitaladdress'),
                        'country' => $request->input('shippingcountry'), 
                        'customer_id' => $customer->id,
                    ]
                );

                // variable
                $customerID = $customer->id;
                $customer_name = $customer->fname. " " .$customer->lname;
                $phone_number = $customer->phone;
                $email = $customer->email;
                $country = $customer->country;
                $shippingFullname  = $request->input('shippingfname')." ".$request->input('shippingsname');
                $ship_to = $shippingFullname. " ".$request->input('shippingpaddress')." ".$request->input('shippingemail')." ".$request->input('shippingapartment')." ".$request->input('shippingpnumber')." ".$request->input('shippingcity')." ".$request->input('shippingstate')." ".$request->input('shippingdigitaladdress')." ".$request->input('shippingcountry');

                // ORDERS
                $order = new Order;
                $order->customer_id = $customerID;
                $order->customer_name = $customer_name;
                $order->phone_number = $phone_number;
                $order->email = $email;
                $order->country = $country;
                $order->ship_to = $ship_to;
                $order->ship_code = time();
                $order->quantity = $calculation->qty;
                $order->totalamount = $calculation->totalAmount;
                $order->payment_method = $request->input('payment_method');
                $order->shipping_amt =  $calculation->shipping;
                $order->taxes = $calculation->taxAmt;

                // OTHERS
                $order->complete_status = "pending";
                $order->tracking_code = time();
                $order->country_id = $this->shopId;
    
                // COUPON SECTION
                $order->coupon_code = $calculation->couponCode;
                $order->coupon_amount = $calculation->discount;

                // FAST DELIVERY
                $order->priority_delivery = 0.0;

                // SAVE
                $order->save();

                // GET ORDER  ID
                $orderID = $order->id;

                // Global order id for the current order
                Session::put('orderID', $orderID);

                foreach (session()->get('cart') as $item){
                
                    $orderpro = new OrderProduct;
                    $orderpro->quantity = $item['quantity'];
                    $orderpro->product_id = $item['productId'];
                    $orderpro->client_id = $customerID;
                    $orderpro->order_id = $orderID;
                    $orderpro->attribute = $item['productAttribute'];
                    $orderpro->price = $item['productPrice'];
                    // SAVE
                    $orderpro->save();
                }

                // Accept Payment Gateways for The Selected Shop.
                $paymentGateWays = $calculation->shop->payment_gateways;

                // Payment Param for Gateway API's
                $paymentParam = array('email' => $email,'amt' => number_format($calculation->totalAmount,2),'phone' => $phone_number, 'desc' => $calculation->shop->shop_name, 'fullname' => $customer_name, 'trans_id' => $orderID, 'country' => strtolower($calculation->shop->country), 'currency' => $calculation->shop->currency);
                
                
                if($request->input('payment_method') == "Rave" || $request->input('payment_method') == "Ravevisa" ){
                    
                
                    $paymentParam['api'] = $paymentGateWays->rave_api;
                    // session
                    Session::put('paymentinfo', $paymentParam);

                     // Send Email
                     $this->sendEmail($order->id);

                    // return rave
                    return redirect("/checkout/payment/ravepay");
                   
                }elseif($request->input('payment_method') == "Paypal"){

                    $paymentParam['api'] = $paymentGateWays->paypal_api;
                    // session
                    Session::put('paymentinfo', $paymentParam);

                     // Send Email
                     $this->sendEmail($order->id);

                    // return paypal
                    return redirect("/checkout/payment/paypal");

       
                }elseif($request->input('payment_method') == "Paystack"){

                    $paymentParam['api'] = $paymentGateWays->paystack_api;
                    // session
                    Session::put('paymentinfo', $paymentParam);

                     // Send Email
                     $this->sendEmail($order->id);

                    // return paypal
                    return redirect("/checkout/payment/paystack");
       
                }elseif($request->input('payment_method') == "express-pay"){
                    
                    $paymentParam['api'] = $paymentGateWays->expresspay_api;
                    // session
                    Session::put('paymentinfo', $paymentParam);

                     // Send Email
                     $this->sendEmail($order->id);

                    // return Express-Pay
                    return redirect("/checkout/payment/expresspay");
       
       
                }elseif($request->input('payment_method') == "hubtel"){
                    
                    $paymentParam['api'] = $paymentGateWays->hubtel_api;
                    // session
                    Session::put('paymentinfo', $paymentParam);

                     // Send Email
                     $this->sendEmail($order->id);

                    // return Hutel
                    return redirect("/checkout/payment/mpower");
       
       
                }elseif($request->input('payment_method') == "pay_on_delivery"){
                    
                    // session
                    Session::put('paymentinfo', $paymentParam);

                     // Send Email
                     $this->sendEmail($order->id);

                    // return Thank you page
                    return redirect("/thankyou");
               
                }else{
                    
                    // session
                    Session::put('paymentinfo', $paymentParam);

                     // Send Email
                     $this->sendEmail($order->id);
                     
                  // return Thank you page
                   return redirect("/thankyou");
       
                }
       
    }

    public function mpower(){

        $email = session()->get('paymentinfo')['email'];
        $amt = session()->get('paymentinfo')['amt'];
        $phone = session()->get('paymentinfo')['phone'];
        $desc = session()->get('paymentinfo')['desc'];
        $fullname = session()->get('paymentinfo')['fullname'];
        $trans_id = session()->get('paymentinfo')['trans_id'];
        $country = session()->get('paymentinfo')['country'];
        $currency =  session()->get('paymentinfo')['currency'];
        $api =  session()->get('paymentinfo')['api'];
        $item_name = "Item(s) bought From hvafrica";


        $invoice = array(
            'items' => ""
            /*array(
                array (
                    'name' => 'The Beautiful Ones Are Not Yet Born',
                    'quantity' => 1,
                    'unitPrice' => 50,
                ),
            )*/
            ,
            'totalAmount' => number_format($amt,2),
            'description' => 'Product Checkout',
            'callbackUrl' => 'http://hvafrica.com/callback',
            'returnUrl' => 'https://hvafrica.com/'.strtolower($country).'/thankyou',
            'merchantBusinessLogoUrl' => 'https://hvafrica.com/images/black-logo.png',
            'merchantAccountNumber' => $api, //'',
            'cancellationUrl' => 'https://hvafrica.com/'.strtolower($country).'/checkout',    
            //'clientReference' => 'MI6TPQ3XK',
            'clientReference' =>  $trans_id,
            );

        $clientId = 'uhbvznty';
        $clientSecret = 'smpfjyqd';
        $basic_auth_key =  'Basic ' . base64_encode($clientId . ':' . $clientSecret);
        $request_url = 'https://api.hubtel.com/v2/pos/onlinecheckout/items/initiate';
        // $request_url = 'https://api.hubtel.com/v1/merchantaccount/onlinecheckout/invoice/create';
        $create_invoice = json_encode($invoice);

        $ch =  curl_init($request_url);  
                curl_setopt( $ch, CURLOPT_POST, true );  
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $create_invoice);  
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );  
                curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
                    'Authorization: '.$basic_auth_key,
                    'Cache-Control: no-cache',
                    'Content-Type: application/json',
                ));

        $result = curl_exec($ch); 
        $error = curl_error($ch);
        curl_close($ch);

        if($error){
            echo $error;
        }else{
       
        $response = json_decode($result, true);
        $redirect_url = $response["data"]["checkoutUrl"];
        return redirect($redirect_url);
        }

    }

    public function ravepay(){

        if(session()->get('paymentinfo')){
            return view('pages.payment_gateway.rave');
        }
    
    }

    public function paypal(){

        if(session()->get('paymentinfo')){
            return view('pages.payment_gateway.paypal');
        }
    
    }

    public function paystack(){

        if(session()->get('paymentinfo')){
            return view('pages.payment_gateway.paystack');
        }
    
    }

    public function expresspay(){

        if(session()->get('paymentinfo')){
            return view('pages.payment_gateway.expresspay');
        }
    
    }

    public function expresspay_processor(){

        if(session()->get('paymentinfo')){

            $expresspay_url = "https://expresspaygh.com/api/submit.php";
        // $expresspay_url = "https://sandbox.expresspaygh.com/api/submit.php";

            // $expresspay_checkout = "https://sandbox.expresspaygh.com/api/checkout.php?token=";
            //$expresspay_checkout = "https://expresspaygh.com/api/checkout.php";

            $email = session()->get('paymentinfo')['email'];
            $amt = session()->get('paymentinfo')['amt'];
            $phone = session()->get('paymentinfo')['phone'];
            $desc = session()->get('paymentinfo')['desc'];
            $fullname = session()->get('paymentinfo')['fullname'];
            $trans_id = session()->get('paymentinfo')['trans_id'];
            $country = session()->get('paymentinfo')['country'];
            $currency =  session()->get('paymentinfo')['currency'];
            $api =  session()->get('paymentinfo')['api'];
            $item_name = "Item(s) bought From hvafrica";

        // dd($currency,$amt );

        // $myBody['merchant-id'] = "18465df0c3636f11c5df";
            $myBody['merchant-id'] = "45825cd5415f2b00c5cd";
            $myBody['api-key'] =  $api;
            $myBody['firstname'] = ucwords($fullname);
            $myBody['lastname'] = "- Order";
            $myBody['email'] = $email;
            $myBody['phonenumber'] = $phone;
            $myBody['currency'] =  $currency;
            $myBody['amount'] = $amt;
            $myBody['order-id'] = $trans_id;
            $myBody['redirect-url'] = "/thankyou";
            $myBody['post-url'] = "/checkout";
            $myBody['username'] = "";
            $myBody['accountnumber'] = "";
            $myBody['order-desc'] =  $item_name;
            $myBody['order-img-url'] = "";

            // GuzzleHtt

            $client = new Client();
        // $client->setDefaultOption(['verify' => false]);
            $res = $client->request('POST',  $expresspay_url, ['form_params'=> $myBody]);
            $res = $res->getBody();
        // $res = json_decode($res);
            return  $res;
    }
    
    }

     /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    public function sendEmail($order_id){

        
            $order = Order::find($order_id);
            $orderProduct =  OrderProduct::WHERE('order_id', $order_id)->get();
            $products =  Product::WHERE('country_id','=', $this->shopId)->get();
    
            if(session()->get('orderID') != null){
                // ####################   EMAIL ###############################
                    $toEmail = $order->email;
                    $storeOwner = "dabdulmanan@gmail.com";
                    // $storeOwner = "hello@wine2u.com";
                    \Mail::send('mail.email',array('order' => $order, 'orderProduct' => $orderProduct, 'products' => $products), function($message) use ($toEmail,$storeOwner){
                    $message->to([$toEmail,$storeOwner],'Order From wine2u.com')->subject('Order From wine2u.com')->from('hello@wine2u.com','wine2u.com - Order');
                    });
    
            }
    
       
        // // EMAIL 
        // $toEmail = $request->input('email');
        // \Mail::send('email.member_email',array('Title' => 'Invitation', 'slug' => $rememberToken), function($message) use ($toEmail){
        // $message->to($toEmail,'Invitation')->subject('Welcome! Invitation From Jamjar!');

        // });

    
    }
  

}
