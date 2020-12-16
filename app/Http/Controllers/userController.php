<?php

namespace App\Http\Controllers;
//use App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\shop;

class userController extends Controller
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
        //
        $users = User::all();
        //###################  PAGE NAME #########################
        $page = "all_users";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.users.all_users',compact("users",'page','allShops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = shop::WHERE('status', "Approved")->get();
        //###################  PAGE NAME #########################
        $page = "register";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.users.register',compact('shops','page','allShops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        
        if ($request->hasFile('pic')) {
            
            $image = $request->file('pic');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/user_pic');
            $image->move($destinationPath, $image_name);

        }else{

           $image_name = "";

        }

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->bio = $request->input('bio');
        $user->pic = $image_name;
        $user->phone = $request->input('phone');
        $user->type = $request->input('type');
        $user->status = $request->input('status');
        $user->shop_id = $request->input('shop');
        // SAVE
        $user->save();
        $shops = Shop::WHERE('status', "Approved")->get();
         //###################  PAGE NAME #########################
        $page = "register";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.users.register')->with(['success' => 'You Have Successfully Added a New User.',"shops" => $shops,'page' => $page, 'allShops' => $allShops]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $shops = Shop::WHERE('status', "Approved")->get();
         //###################  PAGE NAME #########################
        $page = "edit_user";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.users.edit_user',compact("user","shops",'page','allShops'));
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
        $user = User::find($id);
        $shops = Shop::WHERE('status', "Approved")->get();
        //###################  PAGE NAME #########################
        $page = "edit_user";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.users.edit_user',compact("user","shops",'page','allShops'));
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
        $user =  User::find($id);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
           // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        
        if ($request->hasFile('pic')) {
            
            $image = $request->file('pic');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/user_pic');
            $image->move($destinationPath, $image_name);
            $user->pic = $image_name;
        }

        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
       // $user->password = Hash::make($request->input('password'));
        $user->bio = $request->input('bio');
        $user->phone = $request->input('phone');
        $user->type = $request->input('type');
        $user->status = $request->input('status');
        $user->shop_id = $request->input('shop');
        // SAVE
        $user->save();

        $user =  User::find($id);
        $shops = Shop::WHERE('status', "Approved")->get();
         //###################  PAGE NAME #########################
        $page = "edit_user";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view('admin.users.edit_user')->with(['success' => 'Updated Successfully.','user' => $user, "shops" => $shops,'page' => $page, 'allShops' => $allShops]);
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
        try{

            $user = User::find($id)->delete();
            // AFTER DELETE
            $users = User::all();
            $success = 'Deleted Successfully';
             //###################  PAGE NAME #########################
            $page = "all_users";
             //###################  ALL SHOPS #########################
             $allShops = shop::all();
            return view('admin.users.all_users',compact('success','users','page','allShops'));

       }catch(\Exception $e) {
           return $e->getMessage();
       }

    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changepassword()
    {
        //###################  PAGE NAME #########################
        $page = "all_users";
         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        return view("admin.users.changepassword",compact('page','allShops'));
      
    }


    public function updatepassword(Request $request)
    {
        $this->validate($request, [
          //  'email'   => 'required|email',
            //'password' => 'required|min:6',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'currentpassword' => 'required|min:6',
        ]);

         //###################  ALL SHOPS #########################
         $allShops = shop::all();
        
        $email = auth()->user()->email;

        if (Auth::guard()->attempt(['email' => $email, 'password' => $request->currentpassword], $request->get('remember'))) {
            
            $id = auth()->user()->id;
            $user = User::find($id);
            $user->password = Hash::make($request->input('password'));
            // SAVE
            $user->save();
            //###################  PAGE NAME #########################
            $page = "changepassword";
            return view('admin.users.changepassword')->with(['success' => 'success','page' => $page,'allShops' => $allShops]);

               }else{
             //###################  PAGE NAME #########################
             $page = "changepassword";
            return view('admin.users.changepassword')->with(['error' => 'error','page' => $page, 'allShops' => $allShops]);          
        }
      
        //  return view('admin.changepassword');
        // return back()->withInput($request->only('email', 'remember'));
    }
}
