<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Thankyou</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

   

   <!-- include navigation -->
    @include("pages.includes.nav-links")
    @include("pages.includes.navigation")
  <!-- include navigation -->
    @php

        session()->forget(['cart', 'coupon']);

    @endphp

<section class="errorpage centerit">
  <div class="container  ">
    <div class="row">
       <div class="col-12 col-md-7 mx-auto text-center ">
        
            <h2>HI, {{ session()->get('paymentinfo')['fullname'] }}</h2>
            <img src="{{ asset('images/summary.png')}}" class="img-responsive">
            <p>Your order has now been confirmed.</p>
            <p>We will send you some inbox love when your order leaves our warehouse.</p>
            <a href="\index"><button>CONTINUE SHOPPING <span class="pl-2 text-right"><img src="{{ asset('img/icons/arrorright.svg')}}" width="8" alt=""></span></button></a>
        
       </div>
    </div>
  </div>

  <img src="/page_assets/img/Wine2U404.svg" class="lefteffect404"  alt="">
</section>


<!-- footer includes -->
 @include("pages.includes.footer-links")
 <!-- footer includes -->

  </body>
</html>