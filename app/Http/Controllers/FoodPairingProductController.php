<?php

namespace App\Http\Controllers;

use Session;
use App\shop;
use App\Product;
use App\Models\FoodPairings;
use Illuminate\Http\Request;
use App\Models\FoodPairingProduct;

class FoodPairingProductController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $shopId = Session::get('shopId');
        $pairs = FoodPairings::WHERE('country_id','=',$shopId)->get();
        $foodPairing = FoodPairingProduct::all();
        $today = now();
        $allShops = shop::all();
        $pairings = FoodPairingProduct::with('product')->get();
        $page = "food_pairing";

        $products = Product::WHERE('products.country_id', '=', $shopId)->get();

        $testing = FoodPairingProduct::with('product')->get();
        $foodPair = FoodPairingProduct::with('foodpairing')->get();
        $foodPairs = $foodPair->pluck('foodpairing');
        $testings = $testing->pluck('product');


        $pName = [];
        $fPair = [];
        $collection = [];

            foreach ($testings as $test){
                foreach ($test as $item){
                array_push($pName, $item->product_name);

                }


            }



            foreach ($foodPairs as $test){
                foreach ($test as $item){
                array_push($fPair, $item->title);

                }
            }



        $collectId = $foodPairing->pluck('id');


        for ($i = 0; $i < count($fPair); $i++) {
            $collection[] = [
                'id' => $collectId[$i % count($collectId)], // Cycling through the quantities array
                'name' => $pName[$i % count($pName)], // Cycling through the names array
                'category' => $fPair[$i]

            ];


        }

        //Convert the resulting array into a collection
        // $mainPairings = collect($collection);
        if(empty($collection)){
            $mainPairings = null;
        }else{
            $mainPairings = collect($collection);
        }



        return view('admin.product_food_pairing.product_food_pairing',compact('pairs','page','allShops','mainPairings','products' ));
        // dd($testing);

        // return response()->json([
        //     'stores' => $testing
        // ], 200);





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
    // public function store(Request $request)
    // {
    //     $pairing_array = $request->food_pairing_id;
    //     $products = $request->product_id;

    //     foreach ($pairing_array as $item) {
    //         foreach($products as $itemTwo){
    //             $pairing = new FoodPairingProduct();
    //             $pairing->food_pairing_id = $item;
    //             $pairing->product_id = $itemTwo;
    //             $pairing->save();
    //         }


    //     }


    //     $success = 'You Have Added New Pairs Successfully.';
    //     return back()->with(['success' => $success]);


    // }
    public function store(Request $request)
{
    $pairing_array = $request->food_pairing_id;
    $products = $request->product_id;

    foreach ($pairing_array as $pairingId) {
        $foodPairing = FoodPairings::find($pairingId);

        if ($foodPairing) {
            // Sync the products for the current food pairing ID
            $foodPairing->product()->attach($products);
        }
    }

    $success = 'You Have Added New Pairs Successfully.';
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
        $pairs = FoodPairings::WHERE('country_id','=',$shopId)->get();
        $today = now();
        $allShops = shop::all();
        $page = "food_pairing";

        $products = Product::WHERE('products.country_id', '=', $shopId)->get();

        return view('admin.product_food_pairing.product_food_pairing',compact('pairs','page','allShops','products'));
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
        $pairing_id = FoodPairingProduct::find($id);




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
    }
}
