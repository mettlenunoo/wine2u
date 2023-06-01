<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
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
use App\Order;
use App\Coupon;
use App\Shippingrate;
use App\Shipping;
use App\OrderProduct;
use App\paymentmethod;
use App\Blog;
use App\Blogcategory;
use App\Models\Ads;
use Validator;
use Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Paystack;

class apiController extends Controller
{

/**
 * @OA\Get(
 *      path="/api/products",
 *      operationId="getProductList",
 *      tags={"Product"},
 *      summary="Get list of products",
 *      description="Returns list of products",
 *      @OA\Parameter( 
*          name="pn",
*          description="limit records",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="integer"
*          )
*       ),
* 
*      @OA\Parameter( 
*          name="keyword",
*          description="search",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*       ),
*
*      @OA\Parameter( 
*          name="light",
*          description="light filters range from 0 to 10",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="integer"
*          )
*       ),
*      @OA\Parameter( 
*          name="smooth",
*          description="smooth filters range from 0 to 10",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="integer"
*          )
*       ),
*      @OA\Parameter( 
*          name="dry",
*          description="dry filters range from 0 to 10",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="integer"
*          )
*       ),
*      @OA\Parameter( 
*          name="soft",
*          description="soft filters range from 0 to 10",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="integer"
*          )
*       ),
* 
* 
*      @OA\Parameter( 
*          name="price",
*          description="price filter",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="decimal"
*          )
*       ),
*
*      @OA\Parameter( 
*          name="wine",
*          description="wine slug.  Example ?wine=wine1,wine2,wine3",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*       ),
*      @OA\Parameter( 
*          name="offers",
*          description="offers slug.  Example ?offers=offers1,offers2,offers3",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*       ),
*      @OA\Parameter( 
*          name="pairing",
*          description="pairing slug.  Example ?pairing=pairing1,pairing2,pairing3",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*       ),
*      @OA\Parameter( 
*          name="grapes",
*          description="grapes slug.  Example ?grapes=grapes1,grapes2,grapes3",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*       ),
*      @OA\Parameter( 
*          name="country",
*          description="country slug.  Example ?country=country1,country2,country3",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*       ),
*      @OA\Parameter( 
*          name="category",
*          description="category slug.  Example ?category=category1,category2,category3",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*       ),
*
*
*     @OA\Parameter( 
*          name="sortby",
*          description="orderby ",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string",
*              enum={"asc", "desc","a-z","z-a"}
*          )
*      ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 * 
 *  
 *     )
 *
 * Returns list of products
 * 
 *  @OA\Get(
 *      path="/api/products/{slug}",
 *      operationId="getProductSingle",
 *      tags={"Product"},
 *      summary="The /api/products/{slug} endpoint returns an Object of a specific product",
 *      description="Product Slug slug=[string]",
*        @OA\Parameter( 
*          name="slug",
*          description="slug",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="string"
*          )
*       ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *
 *     )
 *
 * Returns an Object a Specific Product.
 * 
 * @OA\Get(
 *      path="/api/categories",
 *      operationId="getProductCategoriesList",
 *      tags={"Category"},
 *      summary="Get list of Categories",
 *      description="Returns list of Categories",
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 * 
 *  
 *     )
 *
 * Returns list of Categories
 * 
 * 
 * @OA\Post(
 * path="/api/review/add",
 * summary="Add a  Review ",
 * description="Add a review",
 * operationId="add a review",
 * tags={"Review"},
 * @OA\RequestBody(
 *    required=true,
 *    description="",
 *    @OA\JsonContent(
 *       required={"user_id","product_id","rating","comment"},
 *       @OA\Property(property="user_id", type="integer", format="number", example="1"),
 *       @OA\Property(property="product_id", type="integer", format="number", example="2"),
 *       @OA\Property(property="rating", type="integer", example="2"),
 *       @OA\Property(property="comment", type="string", example="Good product!"),   
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Incorrect Data ",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong Input. Please try again")
 *        )
 *     )
 * )
 * 
 * 
 *  @OA\Delete(
 *      path="/api/review/delete/{id}",
 *      operationId="deleteReview",
 *      tags={"Review"},
 *      summary="The /api/review/delete/{id} endpoint Delete Specific Review ",
 *      description="Review id=[integer]",
*        @OA\Parameter( 
*          name="id",
*          description="id",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="integer"
*          )
*       ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *
 *     )
 * 
 * 
 * @OA\Post(
 * path="/api/wishlist/add",
 * summary="Add a wishlist ",
 * description="Add a wishlist",
 * operationId="add a wishlist",
 * tags={"WishList"},
 * @OA\RequestBody(
 *    required=true,
 *    description="",
 *    @OA\JsonContent(
 *       required={"user_id","product_id"},
 *       @OA\Property(property="user_id", type="integer", format="number", example="1"),
 *       @OA\Property(property="product_id", type="integer", format="number", example="2") 
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Incorrect Data ",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong Input. Please try again")
 *        )
 *     )
 * )
 * 
 * 
 * *  @OA\Delete(
 *      path="/api/wishlist/delete/{id}",
 *      operationId="deleteWishList",
 *      tags={"WishList"},
 *      summary="The /api/wishlist/delete/{id} endpoint Delete Specific WishList ",
 *      description=" id=[integer]",
*        @OA\Parameter( 
*          name="id",
*          description="id",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="integer"
*          )
*       ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *
 *     )
 * 
 * 
 * * @OA\Post(
 * path="/api/coupon",
 * summary="Add a Coupon ",
 * description="Add a Coupon",
 * operationId="Add a Coupon",
 * tags={"Coupon"},
 * @OA\RequestBody(
 *    required=true,
 *    description="",
 *    @OA\JsonContent(
 *       required={"coupon_code"},
 *       @OA\Property(property="coupon_code", type="integer", example="Accra2020")
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Incorrect Data ",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong Input. Please try again")
 *        )
 *     )
 * )
 * 
 * @OA\Get(
 *      path="/api/ads",
 *      operationId="getAdsList",
 *      tags={"Ads"},
 *      summary="Get list of Ads",
 *      description="The /api/ads endpoint returns a list of all Ads that belong to a specific country...",
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       )
 *     )
 *
 * Returns list of Ads
 * 
 * 
 * @OA\Get(
 *      path="/api/blogs",
 *      operationId="getBlogList",
 *      tags={"Blog"},
 *      summary="Get list of Blog",
 *      description="The /api/blogs endpoint returns a list of all Blog that belong to a specific country...",
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       )
 *     )
 *
 * Returns list of Blog
 * 
 * @OA\Get(
 *      path="/api/blog/category",
 *      operationId="getBlogCategoryList",
 *      tags={"Blog"},
 *      summary="Get list of BlogCategory",
 *      description="The /api/blog/category endpoint returns a list of all Blog category that belong to a specific country...",
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       )
 *     )
 *
 * Returns list of Blog Category
 * 
 *  @OA\Get(
 *      path="/api/blogs/{slug}",
 *      operationId="getBlogSingle",
 *      tags={"Blog"},
 *      summary="The /api/blogs/{slug} endpoint returns an Object of a specific Blog",
 *      description="Blog Slug slug=[string]",
*        @OA\Parameter( 
*          name="slug",
*          description="slug",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="string"
*          )
*       ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *
 *     )
 * 
 *  Returns list of Single Product
 * 
 * 
 * @OA\Get(
 *      path="/api/shop_settings",
 *      operationId="getSettingsObject",
 *      tags={"Settings"},
 *      summary="Get  Settings, payment_gateways and shipping_addresses Objects",
 *      description="The /api/shop_settings endpoint returns an Object for a specific country...",
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       )
 *     )
 *
 * Returns  Settings, payment_gateways and shipping_addresses Objects
 * 
 * 
 * 
 *  @OA\Get(
 *      path="/api/shipping/price/{zone}/{weight}",
 *      operationId="getShippingRate",
 *      tags={"Shipping"},
 *      summary="The /api/shipping/price/{zone}/{weight} endpoint returns an Object of a specific Shpping Rate",
 *      description="Shipping Rate zone=[integer], weight=[integer]",
*        @OA\Parameter( 
*          name="zone",
*          description="zone",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="integer"
*          )
*       ),
*        @OA\Parameter( 
*          name="weight",
*          description="weight",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="integer"
*          )
*       ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *
 *   )
 * 
 * @OA\Get(
 *      path="/api/shipping",
 *      operationId="getShippingList",
 *      tags={"Shipping"},
 *      security={ {"apiAuth": {} }},
 *      summary="Get list of Shipping Addresses",
 *      description="The /api/shipping endpoint returns a list of all Shipping Addresses For a User",
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       )
 *     )
 *
 * Returns list of Shipping Addresses
 * 
 * 
 * @OA\Post(
 * path="/api/add/shipping",
 * summary="Add a New Shipping Address",
 * description="Add a New Shipping Address",
 * operationId="authAddShipping",
 * tags={"Shipping"},
 * security={ {"apiAuth": {} }},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass Shipping Addresses",
 *    @OA\JsonContent(
 *       required={"fname","sname","email","state","address"},
 *       @OA\Property(property="fname", type="string",  example="First Name"),
 *       @OA\Property(property="sname", type="string", example="Second Name"),
 *       @OA\Property(property="email", type="string", format="string", example="user1@mail.com"),
 *       @OA\Property(property="pnumber", type="string",  example="000 0000 000"),
 *       @OA\Property(property="address", type="string", example="Awudome-Estate"),
 *       @OA\Property(property="street", type="string", format="string", example="Awudome-Estate"),
 *       @OA\Property(property="apartment", type="string",  example=""),
 *       @OA\Property(property="city", type="string", example="Accra"),
 *       @OA\Property(property="state", type="string", format="string", example="Greater Accra"),
 *       @OA\Property(property="zipcode", type="string", example="00233"),
 *       @OA\Property(property="digitaladdress", type="string", example="GA-202929"),
 *       @OA\Property(property="country", type="string", example="Ghana"),
 *       @OA\Property(property="primary_address", type="string", example="false"),
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address. Please try again")
 *        )
 *     )
 * )
 * 
 * @OA\Put(
 * path="/api/shipping/{id}",
 * summary="Edit a  Shipping Address",
 * description="Edit a  Shipping Address",
 * operationId="authEditShipping",
 * tags={"Shipping"},
 * security={ {"apiAuth": {} }},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass Shipping Addresses",
 *    @OA\JsonContent(
 *       required={"fname","sname","email","state","address"},
 *       @OA\Property(property="fname", type="string",  example="First Name"),
 *       @OA\Property(property="sname", type="string", example="Second Name"),
 *       @OA\Property(property="email", type="string", format="string", example="user1@mail.com"),
 *       @OA\Property(property="pnumber", type="string",  example="000 0000 000"),
 *       @OA\Property(property="address", type="string", example="Awudome-Estate"),
 *       @OA\Property(property="street", type="string", format="string", example="Awudome-Estate"),
 *       @OA\Property(property="apartment", type="string",  example=""),
 *       @OA\Property(property="city", type="string", example="Accra"),
 *       @OA\Property(property="state", type="string", format="string", example="Greater Accra"),
 *       @OA\Property(property="zipcode", type="string", example="00233"),
 *       @OA\Property(property="digitaladdress", type="string", example="GA-202929"),
 *       @OA\Property(property="country", type="string", example="Ghana"),
 *       @OA\Property(property="primary_address", type="string", example="false"),
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address. Please try again")
 *        )
 *     )
 * )
 * 
 * 
 *  @OA\Get(
 *      path="/api/shipping/{id}",
 *      operationId="getShippingInfo",
 *      tags={"Shipping"},
 *      security={ {"apiAuth": {} }},
 *      summary="The /api/shipping/{id} endpoint returns an Object of a specific Shpping Address",
 *      description="The /api/shipping/{id} endpoint returns an Object of a specific Shpping Address",
*        @OA\Parameter( 
*          name="id",
*          description="id",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="integer"
*          )
*       ),
*       
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *
 *   )
 * 
 * 
 * @OA\Delete(
 *      path="/api/shipping/{id}",
 *      operationId="deleteShippingAddress",
 *      tags={"Shipping"},
 *      security={ {"apiAuth": {} }},
 *      summary="The /api/shipping/{id} endpoint Delete Specific Shipping Address ",
 *      description="Review id=[integer]",
*        @OA\Parameter( 
*          name="id",
*          description="id",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="integer"
*          )
*       ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *
 *  )
 * 
 * 
 * @OA\Post(
 * path="/api/user/login",
 * summary="Sign in",
 * description="Login by email, password",
 * operationId="authLogin",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"email","password"},
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord@12345"),
 *       @OA\Property(property="persistent", type="boolean", example="true"),
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
 * 
 * 
 * 
 * @OA\Post(
 * path="/api/user/register",
 * summary="Sign up",
 * description="Sign Up by fname, lname, email, password",
 * operationId="authSignUp",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"fname","lname","email","password"},
 *       @OA\Property(property="fname", type="string",  example="First Name"),
 *       @OA\Property(property="lname", type="string", example="Second Name"),
 *       @OA\Property(property="email", type="email", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="password", format="password", example="PassWord@12345"),
 *       @OA\Property(property="referral", type="string", example=""),
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
 * 
 * 
 * @OA\Get(
 * path="/api/logout",
 * summary="Logout",
 * description="Logout user and invalidate token",
 * operationId="authLogout",
 * tags={"auth"},
 * security={ {"apiAuth": {} }},
 * @OA\Response(
 *    response=200,
 *    description="Success"
 *     ),
 * @OA\Response(
 *    response=401,
 *    description="Returns when user is not authenticated",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Not authorized"),
 *    )
 * )
 * )
 * 
 * 
 * 
 * @OA\Post(
 * path="/api/user/changepassword",
 * summary="Change Password",
 * description="change User Password",
 * operationId="authChangePassword",
 * tags={"auth"},
 * security={ {"apiAuth": {} }},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"currentpassword","password"},
 *       @OA\Property(property="currentpassword", type="string",  example="PassWord@12345"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord@12345New"),
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
 * 
 * 
 * @OA\Post(
 * path="/api/user/update",
 * summary="Update User Profile",
 * description="Update User Profile",
 * operationId="authUpdateProfile",
 * tags={"auth"},
 * security={ {"apiAuth": {} }},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user Info",
 *    @OA\JsonContent(
 *       required={"fname","lname","email","gender","dob","nationality"},
 *       @OA\Property(property="fname", type="string",  example="First Name"),
 *       @OA\Property(property="lname", type="string", example="Second Name"),
 *       @OA\Property(property="email", type="string", format="string", example="user1@mail.com"),
 *       @OA\Property(property="phonenumber", type="string",  example="000 0000 000"),
 *       @OA\Property(property="country", type="string", example="GH"),
 *       @OA\Property(property="street", type="string", format="string", example="Awudome-Estate"),
 *       @OA\Property(property="apartment", type="string",  example=""),
 *       @OA\Property(property="city", type="string", example="Accra"),
 *       @OA\Property(property="state", type="string", format="string", example="Greater Accra"),
 *       @OA\Property(property="zip", type="string", example="00233"),
 *       @OA\Property(property="nationality", type="string", format="string", example="Ghanaian"),
 *       @OA\Property(property="gender", type="string",  example="Male"),
 *       @OA\Property(property="dob", type="string", example="1997-05-07"),
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
 * 
 * 
 * 
 * @OA\Get(
 * path="/api/user",
 * summary="Get User information",
 * description="Returns User data",
 * operationId="authUserProfile",
 * tags={"auth"},
 * security={ {"apiAuth": {} }},
 * @OA\Response(
 *    response=200,
 *    description="Success"
 *     ),
 * @OA\Response(
 *    response=401,
 *    description="Returns when user is not authenticated",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Not authorized"),
 *    )
 * )
 * )
 * 
 * 
 * @OA\Get(
 * path="/api/user/wishlist",
 * summary="Get User WishList information",
 * description="Returns User WishList data",
 * operationId="authUserWishList",
 * tags={"auth"},
 * security={ {"apiAuth": {} }},
 * @OA\Response(
 *    response=200,
 *    description="Success"
 *     ),
 * @OA\Response(
 *    response=401,
 *    description="Returns when user is not authenticated",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Not authorized"),
 *    )
 * )
 * )
 * 
 * 
 * @OA\Get(
 * path="/api/user/orders",
 * summary="Get User Orders information",
 * description="Returns User Orders data",
 * operationId="authUserOrder",
 * tags={"auth"},
 * security={ {"apiAuth": {} }},
 * @OA\Response(
 *    response=200,
 *    description="Success"
 *     ),
 * @OA\Response(
 *    response=401,
 *    description="Returns when user is not authenticated",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Not authorized"),
 *    )
 * )
 * )
 * 
 * 
 * 
 * @OA\Post(
 * path="/api/user/referralcode",
 * summary="Change or Add Referral Code",
 * description="Change or Add Referral Code",
 * operationId="authChangeAddReferral",
 * tags={"auth"},
 * security={ {"apiAuth": {} }},
 * @OA\RequestBody(
 *    required=true,
 *    description="Referral Code",
 *    @OA\JsonContent(
 *       required={"referral_code"},
 *       @OA\Property(property="referral_code", type="string",  example="12345667"),
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
 * 
 * 
 * 
 * @OA\Post(
 * path="/api/checkout",
 * summary="checkout Endpoint",
 * description="Returns  billing info and selected payment gateway object ",
 * operationId="checkout",
 * tags={"Checkout"},
 * security={ {"apiAuth": {} }},
 * @OA\RequestBody(
 *    required=true,
 *    description="Checkout",
 *    @OA\JsonContent(
 *       required={"billingfname","billingsname","billingemail","billingpnumber","billingaddress","payment_method","shipping_amt"},
 * 
 *       @OA\Property(property="billingfname", type="string",  example="First Name"),
 *       @OA\Property(property="billingsname", type="string", example="Second Name"),
 *       @OA\Property(property="billingemail", type="string", format="string", example="user1@mail.com"),
 *       @OA\Property(property="billingpnumber", type="string",  example="000 0000 000"),
 *       @OA\Property(property="billingcountry", type="string", example="Ghana"),
 *       @OA\Property(property="billingaddress", type="string", format="string", example="Awudome-Estate"),
 *       @OA\Property(property="billingapartment", type="string",  example=""),
 *       @OA\Property(property="billingcity", type="string", example="Accra"),
 *       @OA\Property(property="billingstate", type="string", format="string", example="Greater Accra"),
 *       @OA\Property(property="billingzipcode", type="string", example="00233"),
 *       @OA\Property(property="shippingfname", type="string",  example="First Name"),
 *       @OA\Property(property="shippingsname", type="string", example="Second Name"),
 *       @OA\Property(property="shippingpaddress", type="string", format="string", example="Estate Legon"),
 *       @OA\Property(property="shippingemail", type="string",  example="user1@mail.com"),
 *       @OA\Property(property="shippingapartment", type="string", example=""),
 *       @OA\Property(property="shippingcity", type="string", format="string", example=""),
 *       @OA\Property(property="shippingstate", type="string",  example="Greater Accra"),
 *       @OA\Property(property="shippingdigitaladdress", type="string", example=""),
 *       @OA\Property(property="shippingcountry", type="string", format="string", example="Ghana"),
 *       @OA\Property(property="payment_method", type="string", example="paystack"),
 *       @OA\Property(property="shipping_amt", type="string", example="30"),
 * 
 * 
 * 
 *       @OA\Property(
 * 
*           property="cart",
*           type="array",
 *          collectionFormat="multi",
*            @OA\Items(
*                  type="object",
*                  @OA\Property(property="productId", type="integer", example="30"),
*                  @OA\Property(property="quantity", type="integer", example="3"),
*                  @OA\Property(property="productAttribute", type="integer", example="2"),
*                  @OA\Property(property="productPrice", type="interger", example="100.00"),
*                  @OA\Property(property="productWeight", type="interger", example="0.1"),
*              ),
*
*         ),
*
*          @OA\Property(
* 
*           property="coupon",
*           type="object",
*        
*                  @OA\Property(property="code", type="string", example="Accra2020"),
*                  @OA\Property(property="type", type="string", example="percentage"),
*                  @OA\Property(property="discount", type="integer", example="20"),
*         ),
 *    ),
 * ),
 * 
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong input. Please try again")
 *        )
 *     )
 * )
 * 
 * @OA\Post(
 *   path="/api/image-upload",
 *   tags={"auth"},
 *   security={ {"apiAuth": {} }},
 *   summary="Upload Profile Picture",
 *   description="Return user Object",
 *   @OA\RequestBody(
 *     required=true,
 *     description="upload Profile Picture",
 *     @OA\MediaType(
 *       mediaType="multipart/form-data",
 *       @OA\Schema(
 *         @OA\Property(
 *           property="profile_pic",
 *           type="string",
 *           format="binary"
 *         )
 *       )
 *     )
 *   ),
 *   @OA\Response(
 *    response=422,
 *    description="Incorrect Image Format",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong input. Please try again")
 *        )
 *     )
 * )
 * 
 * 
 * @OA\Post(
 * path="/api/paystack/pay",
 * summary="Paystack Payment",
 * description="Paystack Payment",
 * operationId="paystack",
 * tags={"Paystack"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user Info",
 *    @OA\JsonContent(
 *       required={"amount","orderID","email","quantity","currency"},
 *       @OA\Property(property="email", type="string", format="string", example="user1@mail.com"),
 *       @OA\Property(property="orderID", type="string",  example="00001"),
 *       @OA\Property(property="amount", type="string", example="200"),
 *       @OA\Property(property="quantity", type="string", format="string", example="1"),
 *       @OA\Property(property="currency", type="string",  example="GHS"),
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong input. Please try again")
 *        )
 *     )
 * )
 * 
 * 
 *  * 
 *  @OA\Get(
 *      path="/api/paystack-verify-transaction?trxref=xxxxx",
 *      operationId="paystack-verify",
 *      tags={"Paystack"},
 *      summary="The /api/paystack-verify-transaction?trxref=xxxx endpoint returns payment obj from Paystack",
 *      description="Transaction reference trxref=[string]",
*        @OA\Parameter( 
*          name="trxref",
*          description="trxref",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="string"
*          )
*       ),
 *      @OA\Response(
 *          response=200,
 *          description=""
 *       ),
 *
 * )
 *
 * 
 * 
 */
 

    public $shop = "";
    public $shopId = 1;
    public $currency = "";

    public function __construct()
    {
       
    }

    public function shop_settings(): JsonResponse
    {

        $shop = shop::WHERE('id', '=', $this->shopId)
                ->WHERE('status', '=', 'Approved')
                ->with('payment_gateways')
                ->with('shipping_addresses')
                ->first();
        return response()->json(['shop_settings' => $shop], 200);

    }

    public function products(): JsonResponse
    {

        $products = Product::WHERE('products.country_id', '=', $this->shopId)
        ->with(['variableProductAttributes','categories','pairing','country','reviews', 'gallery']);
        
        
        // PAGINATION
        if(isset($_GET['pn'])){

            $pn = $_GET['pn'];
            $this->SearchPagination("pn");
        } else{

            $pn = 12;
        }

         //  Search
         if (isset($_GET['keyword'])) {

            $keyword = $_GET['keyword'];
            $products = $products->WHERE('products.product_name', '<=', $keyword );
            $this->SearchPagination("keyword");
        }

        if(isset($_GET['price'])){

            $price = $_GET['price'];
            $products = $products->WHERE('products.base_price', '<=', $price );
            $this->SearchPagination("price");

        }


        if(isset($_GET['light'])){

            $light = $_GET['light'];
            $products = $products->WHERE('products.light', '<=', $light );
            $this->SearchPagination("light");

        }


        if(isset($_GET['smooth'])){

            $smooth = $_GET['smooth'];
            $products = $products->WHERE('products.smooth', '<=', $smooth );
            $this->SearchPagination("smooth");

        }

        if(isset($_GET['dry'])){

            $light = $_GET['dry'];
            $products = $products->WHERE('products.dry', '<=', $light );
            $this->SearchPagination("dry");

        }


        if(isset($_GET['soft'])){

            $smooth = $_GET['soft'];
            $products = $products->WHERE('products.soft', '<=', $smooth );
            $this->SearchPagination("soft");

        }


        if(isset($_GET['wine']) || isset($_GET['offers']) || isset($_GET['country']) || isset($_GET['pairing']) || isset($_GET['grapes']) || isset($_GET['category'])){

            if(isset($_GET['wine'])){

                $getWinesID = explode(",",$_GET['wine']);
                $wines = Wine::whereIN('slug',$getWinesID)->with('subWines')->get();
                $wineIDs = $this->filterIds($wines,'subWines');

                $products = $products->whereHas('wines', function ($query) use ($wineIDs) {
                    $query->whereIN('wine_id', $wineIDs);
                 });
                
                $this->SearchPagination("wine");

            }

            if(isset($_GET['offers'])){

                $getOffersID = explode(",",$_GET['offers']);
                $offers = Offer::whereIN('slug',$getOffersID)->with('subOffers')->get();
                $offerIDs = $this->filterIds($offers,'subOffers');

                $products = $products->whereHas('offers', function ($query) use ($offerIDs) {
                    $query->whereIN('offer_id', $offerIDs);
                 });

                $this->SearchPagination("offers");


            }

            if(isset($_GET['pairing'])){

                $getPairingID = explode(",",$_GET['pairing']);
                $pairings = Pairing::whereIN('slug',$getPairingID)->with('subPairing')->get();
                $pairIDs = $this->filterIds($pairings,'subPairing');

                $products = $products->whereHas('pairing', function ($query) use ($pairIDs) {
                    $query->whereIN('pairing_id', $pairIDs);
                 });

                $this->SearchPagination("pairing");

            }


            if(isset($_GET['grapes'])){

                $getGrapesID = explode(",",$_GET['grapes']);
                $grapes = Grape::whereIN('slug',$getGrapesID)->with('subGrapes')->get();
                $grapeIDs = $this->filterIds($grapes,'subGrapes');

                $products = $products->whereHas('grapes', function ($query) use ($grapeIDs) {
                    $query->whereIN('grape_id', $grapeIDs);
                });

                $this->SearchPagination("grapes");

            }


            if(isset($_GET['country'])){

                $getSlugs = explode(",",$_GET['country']);
                // dd($getSlugs);
                $countries = Country::whereIN('slug',$getSlugs)->with('regions')->get();
                $ids = $this->filterIds($countries,'regions');
               // dd($ids);
                $products = $products->whereHas('country', function ($query) use ($ids) {
                    $query->whereIN('country_product.country_id', $ids);
                });

                $this->SearchPagination("country");

            }


            if(isset($_GET['category'])){

                $getSlugs = explode(",",$_GET['category']);
                $categories = Category::whereIN('slug',$getSlugs)->with('subCategories')->get();
                $ids = $this->filterIds($categories,'subCategories');
                //dd($idss);
                $products = $products->whereHas('categories', function ($query) use ($ids) {
                    $query->whereIN('category_id', $ids);
                });

                $this->SearchPagination("category");

            }

        }

        if (isset($_GET['sortby'])) {

            if(strtolower($_GET['sortby']) == "a-z" || strtolower($_GET['sortby']) == "z-a"){

                $products = $_GET['sortby']  == 'a-z' ?
                    $products->orderBy('product_name', 'asc') :
                    $products->orderBy('product_name', 'desc');

            } else {

                $products = $_GET['sortby']  == 'asc' ?
                    $products->orderBy('created_at', 'asc') :
                    $products->orderBy('created_at', 'desc');

            }
           
            $this->SearchPagination("sortby");
        }


        $products = $products->paginate($pn)
        ->setPath('/api/products');
        !empty($this->link) ? $products = $products->appends($this->link) : "";

        return response()->json($products, 200);

        //dd($products);

    }

    public function menu() : JsonResponse
    {   
          // category
        $categories = Category::WHERE('parent', 0)->WHERE('country_id','=',$this->shopId)->with('subCategories')->get();
        $wines = Wine::WHERE('country_id','=',$this->shopId)->WHERE('parent', 0)->with('subWines')->get();
        $offers = Offer::WHERE('country_id','=',$this->shopId)->WHERE('parent', 0)->with('subOffers')->get();
        $grapes = Grape::WHERE('country_id','=',$this->shopId)->WHERE('parent', 0)->with('subGrapes')->get();
        $pairs = Pairing::WHERE('country_id','=',$this->shopId)->WHERE('parent', 0)->with('subPairing')->get();
        $countries = Country::WHERE('country_id','=',$this->shopId)->WHERE('parent', 0)->with('regions')->get();
        
        $menu = [
            "categories" => $categories,
            "wines" => $wines,
            "offers" => $offers,
            "grapes" => $grapes,
            "pairs" => $pairs,
            "countries" => $countries
        ];

        return response()->json($menu, 200);

    }


    public function all_products_old() : JsonResponse
    {

        $products = Product::WHERE('products.country_id', '=', $this->shopId)
                    ->with(['variableProductAttributes', 'categories','reviews', 'blogs'])
                    ->latest()
                    ->paginate(10);
        return response()->json($products, 200);

    }

    public function parent_cat_products($slug)
    {

            if(!empty( $slug )){

                // $category = Category::where('slug','=',$slug)->first();

                // if( $category ){
                //     $parentCategoryId = $category->id;

                //     $subCategoryIds = Category::where('parent','=',$parentCategoryId)->pluck('id');

                //     $products = Product::WHERE('products.country_id', '=', $this->shopId)
                //                 ->with(['variableProductAttributes','categories','reviews', 'blogs'])->whereHas('categories', function ($query) use ($subCategoryIds) {
                //                 $query->whereIN('category_id', $subCategoryIds);
                //                 })
                //                 ->latest()
                //                 ->paginate(10);

                //     return response()->json($products, 200);

                // }else{

                //     return response()->json("Invalid Input", 400);

                // }

                if(isset($_GET['wine']) || isset($_GET['offers']) || isset($_GET['country']) || isset($_GET['pairing']) || isset($_GET['grapes']) || isset($_GET['category'])){

                    $products = Product::WHERE('products.country_id', '=', $this->shopId)
                    ->with(['variableProductAttributes','categories','reviews', 'blogs','gallery']);

                    if(isset($_GET['wine'])){

                        $getWinesID = $_GET['wine'];
                        $wines = Wine::whereIN('slug',$getWinesID)->with('subWines')->get();
                        $wineIDs = $this->filterIds($wines,'subWines');

                       $products = $products->whereHas('wines', function ($query) use ($wineIDs) {
                            $query->whereIN('wine_id', $wineIDs);
                         });

                    }

                    if(isset($_GET['offers'])){

                        $getOffersID = $_GET['offers'];
                        $offers = Offer::whereIN('slug',$getOffersID)->with('subOffers')->get();
                        $offerIDs = $this->filterIds($offers,'subOffers');

                       $products = $products->whereHas('offers', function ($query) use ($offerIDs) {
                            $query->whereIN('offer_id', $offerIDs);
                         });

                    }

                    if(isset($_GET['pairing'])){

                        $getPairingID = $_GET['pairing'];
                        $pairings = Pairing::whereIN('slug',$getPairingID)->with('subPairing')->get();
                        $pairIDs = $this->filterIds($pairings,'subPairing');

                        $products = $products->whereHas('pairing', function ($query) use ($pairIDs) {
                            $query->whereIN('pairing_id', $pairIDs);
                         });

                        $this->SearchPagination("pairing");

                    }


                    if(isset($_GET['grapes'])){

                        $getGrapesID = $_GET['grapes'];
                        $grapes = Grape::whereIN('slug',$getGrapesID)->with('subGrapes')->get();
                        $grapeIDs = $this->filterIds($grapes,'subGrapes');

                        $products = $products->whereHas('grapes', function ($query) use ($grapeIDs) {
                            $query->whereIN('grape_id', $grapeIDs);
                        });

                        $this->SearchPagination("grapes");

                    }


                    if(isset($_GET['country'])){

                        $getSlugs = $_GET['country'];
                        $countries = Country::whereIN('slug',$getSlugs)->with('regions')->get();
                        $ids = $this->filterIds($countries,'regions');
                        //dd($idss);
                        $products = $products->whereHas('country', function ($query) use ($ids) {
                            $query->whereIN('country_product.country_id', $ids);
                        });

                        $this->SearchPagination("country");

                    }


                    if(isset($_GET['category'])){

                        $getSlugs = $_GET['category'];
                        $categories = Category::whereIN('slug',$getSlugs)->with('subCategories')->get();
                        $ids = $this->filterIds($categories,'subCategories');
                        //dd($idss);
                        $products = $products->whereHas('categories', function ($query) use ($ids) {
                            $query->whereIN('category_id', $ids);
                        });

                        $this->SearchPagination("category");

                    }


                    $products = $products->latest()
                    ->paginate(2)
                    ->setPath('/api/product');
                    !empty($this->link) ? $products = $products->appends($this->link) : "";

                    dd($products);

                }



             }else{

                return response()->json("Page Not Found", 404);

             }
    }

    private function filterIds($obj, $sub){

        $ids = [];

        foreach($obj as $id){
            $ids[] = $id->id;
            foreach($id->$sub as $row){
                $ids[] = $row->id;
            }
        }

        return $ids;
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


    public function sub_cat_products($parent,$slug): JsonResponse
    {

        if(!empty( $slug )){

            $category = Category::where('slug','=',$slug)->first();

            if( $category ){

                $subCategoryId = $category->id;

                $products = Product::WHERE('products.country_id', '=', $this->shopId)
                            ->with(['variableProductAttributes','categories','reviews'])->whereHas('categories', function ($query) use ($subCategoryId) {
                            $query->where('category_id', $subCategoryId);
                            })
                            ->latest()
                            ->paginate(10);

                return response()->json($products, 200);

            }else{

                return response()->json("Invalid Input", 400);

            }

         }else{

            return response()->json("Page Not Found", 404);

         }
    }

    public function single_products($slug) : JsonResponse
    {

        $products = Product::WHERE('products.country_id', '=', $this->shopId)
                    ->searchSlug($slug)
                    ->with(['variableProductAttributes','categories','pairing','country','reviews', 'gallery'])
                    ->first();
                    
        return response()->json($products, 200);

    }

    public function all_categories() : JsonResponse
    {

        $categories = Category::WHERE('parent', 0)->WHERE('country_id','=',$this->shopId)->with('subCategories')->get();
    
        return response()->json($categories, 200);

    }


    public function wishList(Request $request): JsonResponse
    {

        $customer = Customer::find($request->input('user_id'));

        if($customer){

            $customer->wishListProduct()->syncWithoutDetaching([ 
                $request->input('product_id')
            ]);

            return response()->json(['message' => 'success'] , 201);

        }else{

            return response()->json(['message' => 'user cannot be found, please try again'] , 500);
        }
    }


    public function removeWishList($id)
    {
        $wishList = WishList::find($id);

        if($wishList){

            $wishList->delete(); 
            return response()->json(['message' => 'Success'] , 202);

        }else{

            return response()->json(['message' => 'Error, Invalid id '] , 500);

        }


    }

    public function userRegister(Request $request)
    {
        $shop_id = 1;
        $this->validate($request, [

                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
                'password' => [
                    'required',
                    'string',
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

                return response()->json(['message' => 'Incorrect Referral Code, Please try again'] , 201);
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
        $customer->shop_id =  $shop_id;
        $customer->remember_token =  str_slug(Hash::make($request->input('email')).time());
        $customer->save();


        if( $customer ){

            return response()->json(['message' => 'Success'] , 201);

        }else{

            return response()->json(['message' => 'Error '] , 500);

        }

    }

    public function userUpdate(Request $request)
    {

        $this->validate($request, [

                'id' => ['required'],
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255']
            ],
        );

        $customer = Customer::find(auth()->user()->id);
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
        $customer->nationality = $request->input('nationality');
        $customer->gender = $request->input('gender');
        $customer->dob = $request->input('dob');
        //$customer->dob = Carbon::parse($request->input('dob'));
        //$customer->dob = date('Y-m-d\TH:i:s.Z\Z', $request->input('dob'));
        // SAVE
        $customer->save();
        
        if( $customer ){

            return response()->json(['message' => 'Success'] , 202);

        }else{

            return response()->json(['message' => 'Error '] , 500);

        }


    }

    public function image_upload(Request $request)
    {
 
        $validator = Validator::make($request->all(), [ 
              //'user_id' => 'required',
              'profile_pic'  => 'required|mimes:png,jpg|max:2048',
        ]);   
 
        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  


         $profile_pic = "";
         $customer = "";

         if ($request->hasFile('profile_pic')) {

            $images = $request->file('profile_pic');
            $profile_pic = rand().time().'.'.$images->getClientOriginalExtension();
            $destinationPath = public_path('/user_pic');
            $images->move($destinationPath, $profile_pic);

            //store your file into database
            $customer = Customer::find(auth()->user()->id);
            $customer->user_profile_image = $profile_pic;
            $customer->save();

        }


        return response()->json([
            "success" => true,
            "message" => "File successfully uploaded",
            "file" => $profile_pic,
            "profile" => $customer,
        ]);
 
  
        // if ($file = $request->file('profile_pic')) {
             
        //     //store file into document folder
        //     $profile_pic = $file->store('/public/user_pic');
 
        //     //store your file into database
        //     $customer = Customer::find(auth()->user()->id);
        //     $customer->user_profile_image = $profile_pic;
        //     $customer->save();
              
           
  
        // }
 
  
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

       $email = auth()->user()->email;

        if (Auth::guard('customer')->attempt(['email' => $email, 'password' => $request->currentpassword], $request->get('remember'))) {
            
            $id = auth()->user()->id;
            $customer = Customer::find($id);
            $customer->password = Hash::make($request->input('password'));
            $customer->save();

            return response()->json(['message' => 'Success'] , 202);

        }else{
            
            return response()->json(['message' => 'Error: Incorrect Current Password'] , 500);
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
        if(!Auth::guard('customer')->attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        
        $user = Auth::guard('customer')->user();
        // $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
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
        ]);
    }

    public function profile() : JsonResponse
    {
        $profile =  auth()->user();
        $profile = $profile->load(['shipping','wishListProduct','orders']);
        return response()->json(['profile' => $profile], 200);
    }

    public function getWishList() : JsonResponse
    {
        $profile =  auth()->user();
        $profile = $profile->load(['wishListProduct']);
        $data = [
            "wishListProduct" => $profile->wishListProduct
        ];
        return response()->json($data, 200);
    }

    public function getOrders() : JsonResponse
    {
        $profile =  auth()->user();
        $profile = $profile->load(['orders']);
        $data = [
            "orders" => $profile->orders
        ];
        return response()->json($data, 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function addEditReferralCode(Request $request){

        $this->validate($request, [

                'referral_code' => ['required', 'string', 'max:255']
            ],
        );

        $customer = Customer::find(auth()->user()->id);
        $customer->referral_code = $request->input('referral_code');
        // SAVE
        $customer->save();
        
        if( $customer ){

            return response()->json(['message' => 'Success'] , 202);

        }else{

            return response()->json(['message' => 'Error '] , 500);

        }


    }

     // ADD COUPON
     public function setCoupon(Request $request)
     {
         $this->validate($request, [

            'coupon_code' => ['required', 'string', 'max:255']
            ],
         );

         $today = date("Y-m-d");
         $code = $request->input('coupon_code');
         $coupon = Coupon::WHERE('code',$code)->WHERE('valid_date','<=',$today)->WHERE('end_date','>=',$today)->WHERE('status','=','Yes')->WHERE('usage','>',0)->first();
         if(!$coupon){

            return response()->json(['Error' =>  'Invalid Coupon Code. Please try again.'] , 404);

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
 
                    $data = [
                        'id' => $coupon->id,
                        'code' => $coupon->code,
                        'type' => $coupon->type,
                        'discount' => $discountAmt,
                        'message' => "Coupon has been applied."
                    ];
                
                return response()->json(['coupon' =>  $data] , 200);
 
             }else{

                return response()->json([ 'Error' =>  'Coupon Code has Exhausted. Please try again.'] , 200);
                   
             }
         }
      
 
     }


     public function shippingPrice($zone,$weight)
     {
        
          $shop_id = 1;
          // RATE
          $rates = Shippingrate::WHERE('country_id','=', $shop_id)->WHERE('kg','>=',$weight)->first();
          $rate = 0;
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
         
         return response()->json(['price' =>  number_format($rate,2)] , 200);
     }

    


    public function checkout_store(Request $request)
    {               

                $this->validate($request, [

                        'billingfname' => ['required', 'string', 'max:255'],
                        'billingsname' => ['required', 'string', 'max:255'],
                        'billingemail' => ['required', 'string', 'max:255'],
                        'billingpnumber' => ['required', 'string', 'max:255'],
                        // 'shippingfname' => ['required', 'string', 'max:255'],
                        // 'shippingsname' => ['required', 'string', 'max:255'],
                        // 'shippingpnumber' => ['required', 'string', 'max:255'],
                        // 'shippingemail' => ['required', 'string', 'max:255'],
                        'payment_method' => ['required', 'string', 'max:255']
                    ],
                );

              
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

                if(count($request->input('cart')) > 0){

                    foreach ($request->input('cart') as $key => $item){

                        $totalPrice = $item['productPrice'] * $item['quantity'];
                        $totalQty = $totalQty + $item['quantity'];
                        $weight = $weight + $item['productWeight'];
                        $subTotal = $subTotal + $totalPrice;

                    }

                    if($request->input('coupon') != ""){

                        $discount = $request->input('coupon')['discount'];
                        $couponCode = $request->input('coupon')['code'];

                    }

                
                    $shipping = $request->input('shipping_amt');

                    $taxAmt = ($tax / 100) * $totalAmount;
                    $totalAmount = ($subTotal + $taxAmt + $shipping) - $discount;
                }

                $shop = shop::WHERE('id', '=', $this->shopId)
                ->WHERE('status', '=', 'Approved')
                ->with('payment_gateways')
                ->with('shipping_addresses')
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
                        'ship_zip' => $request->input('billingzipcode'), 
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
                $order->tracking_code = Paystack::genTranxRef();
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

                foreach ($request->input('cart') as $item){
                
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
                $paymentParam = array('email' => $email,'amt' => number_format($calculation->totalAmount,2),'phone' => $phone_number, 'desc' => $calculation->shop->shop_name, 'fullname' => $customer_name, 'trans_id' => $orderID, 'country' => strtolower($calculation->shop->country), 'currency' => $calculation->shop->currency, 'reference' => $order->tracking_code);
                
                
                if($request->input('payment_method') == "Rave" || $request->input('payment_method') == "Ravevisa" ){
                    
                
                    $paymentParam['api'] = $paymentGateWays->rave_api;

                     // Send Email
                     //$this->sendEmail($order->id);

                     return response()->json(['message' =>  'success','payment_method' => $request->input('payment_method'), 'paymentinfo' => $paymentParam ], 200);
                   
                }elseif($request->input('payment_method') == "Paypal"){

                    $paymentParam['api'] = $paymentGateWays->paypal_api;
                   
                     // Send Email
                    // $this->sendEmail($order->id);

                     return response()->json(['message' =>  'success', 'payment_method' => $request->input('payment_method'), 'paymentinfo' => $paymentParam ], 200);
                     
       
                }elseif($request->input('payment_method') == "Paystack"){

                    $paymentParam['api'] = $paymentGateWays->paystack_api;
                 
                    // Send Email
                     //$this->sendEmail($order->id);

                     return response()->json(['message' =>  'success', 'payment_method' => $request->input('payment_method'),'paymentinfo' => $paymentParam ], 200);
       
                }elseif($request->input('payment_method') == "express-pay"){
                    
                    $paymentParam['api'] = $paymentGateWays->expresspay_api;
                     // Send Email
                     //$this->sendEmail($order->id);

                     return response()->json(['message' =>  'success', 'payment_method' => $request->input('payment_method'),'paymentinfo' => $paymentParam ], 200);
       
       
                }elseif($request->input('payment_method') == "hubtel"){
                    
                    $paymentParam['api'] = $paymentGateWays->hubtel_api;
                    // Send Email
                    //$this->sendEmail($order->id);

                    return response()->json(['message' =>  'success', 'payment_method' => $request->input('payment_method'), 'paymentinfo' => $paymentParam ], 200);
       
                }elseif($request->input('payment_method') == "pay_on_delivery"){
                    
                    // Send Email
                   // $this->sendEmail($order->id);

                    return response()->json(['message' =>  'success', 'payment_method' => $request->input('payment_method'), 'paymentinfo' => $paymentParam ], 200);
               
                }else{
                    
                  // Send Email
                  //$this->sendEmail($order->id);

                  return response()->json(['message' =>  'success', 'payment_method' => $request->input('payment_method'), 'paymentinfo' => $paymentParam ], 200);
       
                }
       
    }

    public function all_shipping_address()
    {
        $shippingAddress = Shipping::WHERE('customer_id', auth()->user()->id)->paginate(10);
        
        return response()->json(['shipping' => $shippingAddress], 200);
    }

    public function store_shipping_address(Request $request){

        $validator = Validator::make($request->all(), [ 
            // 'user_id' => 'required',
            'fname' => 'required',
            'sname' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);   

        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
        }  

        $shipping = new Shipping;
        $shipping->fname = $request->input('fname');
        $shipping->sname = $request->input('sname');
        $shipping->ship_address = $request->input('address');
        $shipping->ship_email = $request->input('email');
        $shipping->ship_apartment = $request->input('apartment');
        $shipping->ship_phone = $request->input('pnumber');
        $shipping->ship_city = $request->input('city');
        $shipping->ship_state = $request->input('state');
        $shipping->ship_zip = $request->input('zipcode');
        $shipping->ship_digital_address = $request->input('digitaladdress');
        $shipping->country = $request->input('country');
        $shipping->primary_address = $request->input('primary_address');
       // $shipping->customer_id = $request->input('user_id');
        $shipping->customer_id = auth()->user()->id;
        $shipping->save();

        return response()->json(['message' => 'Success'] , 202);

    }

    public function update_shipping_address(Request $request,$id){

        $validator = Validator::make($request->all(), [ 
            //'user_id' => 'required',
            'fname' => 'required',
            'sname' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);   

        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
        }  
       
        $shipping = Shipping::findorfail($id);
        $shipping->fname = $request->input('fname');
        $shipping->sname = $request->input('sname');
        $shipping->ship_address = $request->input('address');
        $shipping->ship_email = $request->input('email');
        $shipping->ship_apartment = $request->input('apartment');
        $shipping->ship_phone = $request->input('pnumber');
        $shipping->ship_city = $request->input('city');
        $shipping->ship_state = $request->input('state');
        $shipping->ship_zip = $request->input('zipcode');
        $shipping->ship_digital_address = $request->input('digitaladdress');
        $shipping->country = $request->input('country');
        $shipping->primary_address = $request->input('primary_address');
        $shipping->customer_id = auth()->user()->id;
        // $shipping->customer_id = $request->input('user_id');
        $shipping->save();

        return response()->json(['message' => 'Success'] , 202);

    }


    public function delete_shipping($id)
    {
        $shipping = Shipping::find($id);

        if($shipping){

            $shipping->delete(); 
            return response()->json(['message' => 'Success'] , 204);

        }else{

            return response()->json(['message' => 'Error, Invalid id '] , 500);

        }
    }

    public function show_shipping_address($id){

        $shippingAddress = Shipping::find($id);
        return response()->json(['shipping' => $shippingAddress], 200);

    }


    public function blog(): JsonResponse
    {       
            $today = now();

            $blogs = Blog::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shopId)
            ->with('categories');

            // SEARCH
            isset($_GET['search']) ? $blogs = $blogs->search($_GET['search']) : "";
            
            // PAGINATION
            if(isset($_GET['pn'])){

                $pn = $_GET['pn'];
                $this->SearchPagination("pn");

            } else {

                $pn = 2;
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
            ->setPath('/api/blogs');
            !empty($this->link) ? $blogs = $blogs->appends($this->link) : "";

            return response()->json($blogs, 200);

    }

    public function all_blog_categories() : JsonResponse
    {

        $categories = Blogcategory::WHERE('parent', 0)->WHERE('country_id','=',$this->shopId)->with('subCategories')->paginate("15");
    
        return response()->json($categories, 200);

    }

  
    public function single_blog($slug){

        $blog = Blog::WHERE('slug', $slug)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shopId)->with('categories')->firstOrFail();
        $relatatedBlog = Blog::WHERE('slug','!=', $slug)->WHERE('visibility', '=', 'Public')->WHERE('country_id', '=',  $this->shopId)->orderBy('created_at', 'DESC')->with('categories')->take(4)->get();

        return response()->json(
            ['blog' => $blog, 'relatatedblog' => $relatatedBlog ]
            , 200);

    } 


    public function mpower(Request $request){


        $validator = Validator::make($request->all(), [ 
            'email' => 'required',
            'amt' => 'required',
            'phone' => 'required',
            'fullname' => 'required',
            'currency' => 'required',
            'api' => 'required',
            'order_id' => 'required',

        ]);   

        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
        }  

        $email = $request->input('email');
        $amt = $request->input('amt');
        $phone = $request->input('phone');
        $desc = $request->input('desc');
        $fullname = $request->input('fullname');
        $trans_id = $request->input('order_id');
        $country = $request->input('country');
        $currency =  $request->input('currency');
        $api = $request->input('api');
        $item_name = "Item(s) bought From Wine2u";


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
            'callbackUrl' => 'http://wine2u.com/callback',
            'returnUrl' => 'https://wine2u.com/m/thankyou',
            'merchantBusinessLogoUrl' => 'https://wine2u.com/images/black-logo.png',
            'merchantAccountNumber' => $api, //'',
            'cancellationUrl' => 'https://wine2u.com/'.strtolower($country).'/checkout',    
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

    public function ravepay(Request $request){

        $validator = Validator::make($request->all(), [ 
            'email' => 'required',
            'amt' => 'required',
            'phone' => 'required',
            'fullname' => 'required',
            'currency' => 'required',
            'api' => 'required',
            'order_id' => 'required',

        ]);   

        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
        }  

        $paymentinfo = (object) [

        "email" => $request->input('email'),
        "amt" => $request->input('amt'),
        "phone" => $request->input('phone'),
        "desc" => $request->input('desc'),
        "fullname" => $request->input('fullname'),
        "trans_id" => $request->input('order_id'),
        "country" => $request->input('country'),
        "currency" =>  $request->input('currency'),
        "api" => $request->input('api')

        ];

        return view('pages.payment_gateway_mobile.rave',compact('paymentinfo'));
    
    }

    public function paypal(Request $request){

        $validator = Validator::make($request->all(), [ 
            'email' => 'required',
            'amt' => 'required',
            'phone' => 'required',
            'fullname' => 'required',
            'currency' => 'required',
            'api' => 'required',
            'order_id' => 'required',

        ]);   

        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
        }  

        $paymentinfo = (object) [

        "email" => $request->input('email'),
        "amt" => $request->input('amt'),
        "phone" => $request->input('phone'),
        "desc" => $request->input('desc'),
        "fullname" => $request->input('fullname'),
        "trans_id" => $request->input('order_id'),
        "country" => $request->input('country'),
        "currency" =>  $request->input('currency'),
        "api" => $request->input('api')

        ];
        
        return view('pages.payment_gateway_mobile.paypal',compact('paymentinfo'));

    
    }

    public function expresspay(){

            return view('pages.payment_gateway.expresspay');

    
    }

    public function expresspay_processor($paymentinfo){



            $expresspay_url = "https://expresspaygh.com/api/submit.php";
        // $expresspay_url = "https://sandbox.expresspaygh.com/api/submit.php";

            // $expresspay_checkout = "https://sandbox.expresspaygh.com/api/checkout.php?token=";
            //$expresspay_checkout = "https://expresspaygh.com/api/checkout.php";

            $email = $paymentinfo->email;
            $amt = $paymentinfo->amt;
            $phone = $paymentinfo->phone;
            $desc = $paymentinfo->desc;
            $fullname = $paymentinfo->fullname;
            $trans_id = $paymentinfo->trans_id;
            $country = $paymentinfo->country;
            $currency =  $paymentinfo->currency;
            $api =  $paymentinfo->api;
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

    public function ads(): JsonResponse
    {

        $ads = Ads::WHERE('country_id', '=', $this->shopId)
                ->WHERE('publish', '=', 'Yes')
                ->get();
        return response()->json(['ads' => $ads], 200);

    }

    public function sendEmail($order_id){

        
        $order = Order::find($order_id);
        $orderProduct =  OrderProduct::WHERE('order_id', $order_id)->get();
        $products =  Product::WHERE('country_id','=', $this->shopId)->get();

        if($order_id != ""){
            // ####################   EMAIL ###############################
                $toEmail = $order->email;
                $storeOwner = "dabdulmanan@gmail.com";
                // $storeOwner = "hello@wine2u.com";
                \Mail::send('mail.email',array('order' => $order, 'orderProduct' => $orderProduct, 'products' => $products), function($message) use ($toEmail,$storeOwner){
                $message->to([$toEmail,$storeOwner],'Order From wine2u.com')->subject('Order From wine2u.com')->from('hello@wine2u.com','wine2u.com - Order');
                });

        }

    }


    public function paystack_verify()
    {

       // return request()->query('trxref');
        return Paystack::getPaymentData();

        // $response = Http::accept('application/json')
        //             ->withToken('sk_live_51a104460001630932353d46331c06c946341ad6')
        //             ->get('https://api.paystack.co/transaction/verify/'.$trx);
        // return $response;
    }

    public function paystack(Request $request){

            return Paystack::getAuthorizationResponse($request->all());
    }

    
}