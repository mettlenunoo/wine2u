<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Subscriber;
use App\shop;

class subscriberController extends Controller
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
          $subscribers = Subscriber::WHERE('shop_id','=',$shopId)->get();
          //###################  PAGE NAME #########################
          $page = "subscribe";
           //###################  ALL SHOPS #########################
           $allShops = shop::all();
        return view('admin.subscribers.index',compact("subscribers",'page','allShops'));
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
        //
        $subscriber = new Subscriber;
        $subscriber->fname = $request->input('fname');
        $subscriber->sname = $request->input('sname');
        $subscriber->email =  $request->input('email');
        $subscriber->contact = $request->input('contact');
        // SAVE
        $subscriber->save();
        //###################  PAGE NAME #########################
        $page = "subscribe";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.subscribers.register')->with(['success' => 'You Have Succefully Added a New User.','page' => $page,'allShops'=>$allShops]);
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
        $slider = Subscriber::find($id)->delete();

      return  $this->index();
    }
}
