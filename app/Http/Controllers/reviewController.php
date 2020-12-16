<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\Review;

class reviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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
      
            $customer = Customer::find($request->input('user_id'));

            if($customer){

                $customer->product()->syncWithoutDetaching([ 
                    $request->input('product_id') => ['rating' => $request->input('rating'), 'comment' => $request->input('comment')],
                ]);

                $products = Product::WHERE('products.id', '=',  $request->input('product_id') )
                    ->with(['variableProductAttributes','categories','pairing','country','reviews', 'gallery'])
                    ->first();
                    
                return response()->json($products, 200);
            
            }else{

                return response()->json(['message' => 'user cannot be found, please try again'] , 500);
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);

        if($review){

            $review->delete(); 
            return response()->json(['message' => 'Success'] , 202);

        }else{

            return response()->json(['message' => 'Error, Invalid id '] , 500);

        }


    }
}
