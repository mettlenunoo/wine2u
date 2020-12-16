<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class comingSoonController extends Controller
{
    
    public function coming_soon()
    {

      return view('pages.coming-soon');

    }

    public function subscribe(Request $request)
    {
        if ( !Newsletter::isSubscribed($request->email) ) {
            Newsletter::subscribe($request->email);
        }
    }


}
