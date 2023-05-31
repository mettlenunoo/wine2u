<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Str;
use Hash;
use Auth;
use App\Customer;
use Carbon\Carbon;

class socialiteController extends Controller
{
       
    public function facebook_Callback(){

        return Socialite::driver('facebook')->redirect();
    }

    public function facebook_redirect(){

      $user = Socialite::driver('facebook')->user();
     return response()->json($user);
        // $user = Customer::firstorCreate([

        //     'email' => $user->email

        // ],[
        //     'fname' => $user->name,
        //     'password' => Hash::make(Str::random(24))

        // ]);

       // Auth::login($user, true);

        // Auth::guard('customer')->login($user, true);
        // return redirect()->intended('/account');

    }


        /**
        *  @OA\Post(
        * path="/api/sign-in/socials",
        * summary="Sign in / Sign-up",
        * description="Login / Sign-up by facebook/google ",
        * operationId="authLoginSocials",
        * tags={"auth"},
        * @OA\RequestBody(
        *    required=true,
        *    description="Pass user credentials",
        *    @OA\JsonContent(
        *       required={"provider","token"},
        *       @OA\Property(property="provider", type="string", enum={"facebook","google"},  example="facebook"),
        *       @OA\Property(property="token", type="string", example="tzUJKxXDdOWMlddTswBIGZgEoRC3OgQ1FJHeuscR")
        *    ),
        * ),
        * @OA\Response(
        *    response=422,
        *    description="Wrong credentials response",
        *    @OA\JsonContent(
        *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
        *        )
        *     )
        * )

        */

    public function socials_redirect_api(Request $request){

        $token = $request->token;
        $provider = $request->provider;

        $user = Socialite::driver($provider)->userFromToken($token);
        $user = Customer::firstorCreate([

            'email' => $user->email

        ],[
            'fname' => $user->name,
            'password' => Hash::make(Str::random(24))

        ]);

       // Auth::login($user, true);

       $user =  Auth::guard('customer')->login($user, true);

        // Auth::guard('customer')->user();
        // $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        
        $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        $profile = $user->load(['shipping','wishListProduct','orders']);
       // $shipping = Shipping::WHERE('customer_id', $user->id)->get();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'apiAuth',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'profile' => $profile,
            //'shipping' => $shipping
        ],200);

        // return redirect()->intended('/account');
    }



    public function google_Callback(){

        return Socialite::driver('google')->redirect();
    }

    public function google_redirect(){

      $user = Socialite::driver('google')->user();
        $user = Customer::firstorCreate([

            'email' => $user->email

        ],[
            'fname' => $user->name,
            'password' => Hash::make(Str::random(24))

        ]);

       // Auth::login($user, true);

        Auth::guard('customer')->login($user, true);
        return redirect()->intended('/account');

    }
}
