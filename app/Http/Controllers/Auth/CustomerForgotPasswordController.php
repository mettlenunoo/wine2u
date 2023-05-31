<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class CustomerForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;



    /** @OA\Post(
     * path="/api/v1/user/forgotten-password/email",
     * summary="Forgot Password",
     * description="Forgot Password",
     * operationId="authCustomerForgotPassword",
     * tags={"Forgot Password(Customer)"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass Your Email Address",
     *    @OA\JsonContent(
     *       required={"email"},
     *       @OA\Property(property="email", type="email",  example="example@mail.com"),
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
     */

    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    protected function broker(){
        return Password::broker('customers');
    }



    public function showLinkRequestForm()
    {
        return view('pages.passwords.email-customer');
    }
}
