<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cookie;

class ageVerificationController extends Controller
{
    public function __construct()
    {
      
       if(Cookie::get('age') != false){

           redirect()->route('index')->send();

       }
       
    }

    public function ageVerification(){
        //1576803
         Cookie::queue("age","morethan18year",'1576803');
         return redirect("/index");
    }

    public function ageVerificationPage(){
    
         return view("pages.landing");
    }

    public function sorry(){
    
        return view("pages.sorry");
   }

}
