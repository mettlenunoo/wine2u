<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth;

class CustomerResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/account';

     /** @OA\Post(
     * path="/api/v1/user/password/reset",
     * summary="Customer Password Reset",
     * description="Customer Password Reset",
     * operationId="authCustomerPasswordReset",
     * tags={"Forgot Password(Customer)"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass Your Email and New passwword Address",
     *    @OA\JsonContent(
     *       required={"email"},
     *       @OA\Property(property="email", type="email",  example="example@mail.com"),
     *       @OA\Property(property="token", type="string",  example="token"),
     *       @OA\Property(property="password", type="password",  example="yoursecret"),
     *       @OA\Property(property="password_confirmation", type="password",  example="yoursecret"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong input response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address. Please try again")
     *        )
     *     )
     * )
     *
     * 
     */

  
    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    protected function guard()
    {
      return Auth::guard('customer');
    }

    protected function broker(){
        return Password::broker('customers');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('pages.passwords.reset-customer')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
