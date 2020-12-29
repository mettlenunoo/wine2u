{{-- <nav class=" d-none d-md-none d-lg-block d-xl-block fixed-top bg-white pt-3">
 <div class="container-fluid container-w2u ">
    <div class="row">
       <div class="col-12 col-md-5">
       <ul class="nav">
       <li class="nav-item">
            <a class="nav-link navbar-wholsome " href="#">
             <img src="/page_assets//page_assets/img/facebookicon.svg" width="24" alt="">
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link navbar-wholsome " href="#">
             <img src="/page_assets//page_assets/img/twittericon.svg" width="29" alt="">
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link navbar-wholsome " href="#">
             <img src="/page_assets//page_assets/img/instagramicon.svg" width="29" alt="">
            </a>
          </li>
        
        </ul>
       </div>

       <div class="col-12 col-md-2 text-center">
       <a href="/index"><img src="/page_assets//page_assets/img/wine2ulogo.svg" class="navbar-band" alt="" width="70"></a>
       </div>

       <div class="col-12 col-md-5">
       <ul class="nav justify-content-end">
       <li class="nav-item">
            <a class="nav-link navbar-wholsome " href="#">
             <img src="/page_assets//page_assets/img/search.svg" width="24" alt="">
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link navbar-wholsome " href="#"><img src="/page_assets//page_assets/img/cart.svg" width="24" alt=""> </a>
          </li>
          <li class="nav-item ">
           <a href="" class="nav-link navbar-wholsome"><small class="" id="totalItems">0</small></a>
          </li>
          @if(!auth('customer')->user())
              <li class="nav-item ">
                <a class="nav-link navbar-wholsome " href="/signup">
                  <span> <strong>Register </strong> </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link navbar-wholsome " href="/sign-in">
                  <span>Login</span>
                </a>
              </li>
          @else

            <li class="nav-item ">
              <a class="nav-link navbar-wholsome " href="/account">
              <img src="/page_assets//page_assets/img/review1.png" width="29" alt="">
              </a>
            </li>

          @endif

          


        </ul>
       </div>

       <div class="col-12 mt-1 mb-3">
       <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" href="#">Wines</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Champagnes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Cognacs</a>
          </li>


          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pairings</a>
          <div class="dropdown-menu dropdown-menu2">
            <a class="dropdown-item " href="#">Southern Italy Red</a>
            <a class="dropdown-item " href="#">Tuscan Red</a>
            <a class="dropdown-item " href="#">Spanish Rioja Red</a>
            <a class="dropdown-item " href="#">Italian Amarone</a>
          </div>
        </li>

          <li class="nav-item">
            <a class="nav-link " href="#" >Grapes</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="#" >Regions</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="blog.php" >Our Blog</a>
          </li>


        </ul>
       </div>
    </div>
 </div>
</nav>


<nav class="mobinav fixed-top d-sm-block d-lg-none  bg-white py-3">
<div class="container">
<div id="myNavwhole" class="overlaywhole">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNavwhole()">&times;</a>
  <div class="overlay-contentwhole">
    <p> <a href="#">Wines</a></p>
    <p> <a href="#">Champagnes</a></p>
    <p> <a href="#">Cognacs</a></p>
    <p><a href="#">Pairings</a></p>
    <p>   <a href="#">Grapes</a></p>
    <p>   <a href="#">Regions</a></p>
    <p>   <a href="#">Our Blog</a></p>
    <p> <a href="#" class="btn btn-wine3up px-4">Account</a></p>  
  </div>
</div>
  <div class="row centerit">
    <div class="col-4">
    <a href="index.php"><img src="/page_assets//page_assets/img/wine2ulogo.svg" class="navbar-band" alt="" width="70"></a>
    </div>
    
    <div class="col-8 text-right">
    <ul class="nav justify-content-end">
       <li class="nav-item px-3">
            <a class=" navbar-wholsome " href="#">
             <img src="/page_assets//page_assets/img/search.svg" width="20" alt="">
            </a>
          </li>
          <li class="nav-item px-2 ">
            <a class=" navbar-wholsome " href="#">
             <img src="/page_assets//page_assets/img/cart.svg" width="20" alt=""> <span id="mTotalItems">0</span>
            </a>
          </li>
         <li class="nav-item px-3 ">
          <span style="cursor:pointer" onclick="openNavwhole()">
      <img src="/page_assets//page_assets/img/navmenuicon.svg" width="25" alt="MENU">
      </span>
          </li>
        </ul>
     
    </div>
  </div>
</div>
</nav> --}}




<!-- for  nav Drawer -->
<style>
  .expand {
      width: 40% !important;
  }
  
  
  @media (max-width: 575.98px) { 
      .expand {
      width: 100% !important;
  }
  }
  
  
  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 3000;
    top: 0;
    right: 0;
    background-color: #fff;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
  }
  
  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }
  
  .sidenav a:hover {
    color: #f1f1f1;
  }
  
  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }
  
  #main {
    transition: margin-left .5s;
     z-index: 3000;
  }
  
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  
  
  
  
  
  .spacearound {
      padding: 0rem 4rem;
  }
  
  @media (max-width: 575.98px) { 
  .spacearound {
      padding: 0rem 3rem;
  }
   }
  
  
  
  .overlay {
    height: 0%;
    width: 100%;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #fff;
    overflow-y: hidden;
    transition: 0.5s;
  }
  
  .overlay-content {
    position: relative;
    top: 2%;
    width: 100%;
    text-align: left;
    margin-top: 30px;
  }
  
  .overlay a {
      padding: 12px;
      text-decoration: none;
      font-size: 1.15rem;
      color: #000000;
      display: block;
      transition: 0.3s;
  }
  
  .overlay a:hover, .overlay a:focus {
      color: #2b2929;
  }
  
  .overlay .closebtn {
      position: absolute;
      top: 0;
      right: 11px;
      font-size: 34px;
  }
  
  @media screen and (max-height: 450px) {
    .overlay {overflow-y: auto;}
    .overlay a {font-size: 1rem}
    .overlay .closebtn {
    font-size: 1rem;
    top: 15px;
    right: 35px;
    }
  }
  
  
  .pointer  {
    cursor: pointer;
  }
  </style>
  <!-- for Nv  Drawer -->
  
  
  <nav class=" d-none d-md-none d-lg-block d-xl-block fixed-top bg-white pt-3">
   <div class="container-fluid container-w2u ">
      <div class="row">
         <div class="col-12 col-md-5">
         <ul class="nav">
         <li class="nav-item">
              <a class="nav-link navbar-wholsome " href="account.php">
               <img src="/page_assets/img/facebookicon.svg" width="24" alt="">
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link navbar-wholsome " href="cart.php">
               <img src="/page_assets/img/twittericon.svg" width="29" alt="">
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link navbar-wholsome " href="cart.php">
               <img src="/page_assets/img/instagramicon.svg" width="29" alt="">
              </a>
            </li>
           
    
          </ul>
         </div>
  
         <div class="col-12 col-md-2 text-center">
         <a href="/"><img src="/page_assets/img/wine2ulogo.svg" class="navbar-band" alt="" width="70"></a>
         </div>
  
         <div class="col-12 col-md-5">
         <ul class="nav justify-content-end">
         <li class="nav-item">
              <a class="nav-link navbar-wholsome " href="/search">
               <img src="/page_assets/img/search.svg" width="24" alt="">
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link navbar-wholsome pointer" onclick="openNav()"><img src="/page_assets/img/cart.svg" width="24" alt=""> 
                <small class="" id="totalItems">
                  @php $totalItems = 0; @endphp
                      @if(session()->has('cart'))

                          @foreach (session()->get('cart') as $key => $item)
        
                              @php 
        
                                $totalItems = $totalItems + $item['quantity'];
                
                              @endphp
                        
                          @endforeach
      
                          {{ $totalItems }}
                      @else

                          {{ $totalItems }}

                      @endif
                </small> 
              </a>
            </li>
  
            @if(!auth('customer')->user())

                  <li class="nav-item ">
                    <a class="nav-link navbar-wholsome " href="/signup">
                      <span> <strong>Register </strong> </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link navbar-wholsome " href="/sign-in">
                      <span>Login</span>
                    </a>
                  </li>

              @else

                <li class="nav-item ">
                  <a class="nav-link navbar-wholsome " href="/account">
                  <img src="/page_assets/img/review1.png" width="29" alt="">
                  </a>
                </li>

              @endif
  
          </ul>
         </div>
  
         <div class="col-12 mt-1 mb-3">
         <ul class="nav justify-content-center">
          
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">  Wines  </a>
              <div class="dropdown-menu dropdown-menu2">
                @foreach ($menu->wines as $wine)

                   <b><a class="dropdown-item " href="/products?wine={{ $wine->slug }}">{{ ucwords($wine->title) }}</a></b>

                    @foreach ($wine->subWines as $subWine)
                      <a class="dropdown-item " href="/products?wine={{ $subWine->slug }}"> -- {{ ucwords($subWine->title) }}</a>
                    @endforeach

                 @endforeach
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link " href="/products?categories=champagne" role="button" >  Champagne  </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link " href="/products?categories=prosecco" role="button" >  Prosecco   </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/products?categories=hard_liquor" role="button" aria-haspopup="true" aria-expanded="false">  Hard Liquor  </a>
              <div class="dropdown-menu dropdown-menu2">

                <a class="dropdown-item " href="/products?categories=cognac">Cognac</a>
                <a class="dropdown-item " href="/products?categories=grappa_infusions">Grappa/ Infusions</a>
                <a class="dropdown-item " href="/products?categories=rum">Rum</a>
                <a class="dropdown-item " href="/products?categories=whisky">Whisky</a>
    
              </div>
            </li>
{{-- 
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">  Grapes  </a>
              <div class="dropdown-menu dropdown-menu2">
                @foreach ($menu->grapes as $grape)

                   <b><a class="dropdown-item " href="/products?grapes={{ $grape->slug }}">{{ ucwords($grape->title) }}</a></b>

                   @foreach ($grape->subGrapes as $subGrape)
                      <a class="dropdown-item " href="/products?grapes={{ $subGrape->slug }}"> -- {{ ucwords($subGrape->title) }}</a>
                   @endforeach

                 @endforeach
              </div>
            </li> --}}

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">  Pairing  </a>
              <div class="dropdown-menu dropdown-menu2">
                @foreach ($menu->pairs as $pair)

                   {{-- <b><a class="dropdown-item " href="/products?pairing={{ $pair->slug }}">{{ ucwords($pair->title) }}</a></b> --}}

                   @foreach ($pair->subPairing as $subPairing)
                      <a class="dropdown-item " href="/products?pairing={{ $subPairing->slug }}"> -- {{ ucwords($subPairing->title) }}</a>
                   @endforeach

                 @endforeach
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Region  </a>
              <div class="dropdown-menu dropdown-menu2">
                @foreach ($menu->countries as $country)

                   <b><a class="dropdown-item " href="/products?country={{ $country->slug }}">{{ ucwords($country->name) }}</a></b>

                   @foreach ($country->regions as $country)
                      <a class="dropdown-item " href="/products?country={{ $country->slug }}"> -- {{ ucwords($country->name) }}</a>
                   @endforeach

                 @endforeach
              </div>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/blog" role="button" aria-haspopup="true" aria-expanded="false"> Our Blog  </a>
              <div class="dropdown-menu dropdown-menu2">
                <a class="dropdown-item " href="/blog?categoriess=tutorial"> Tutorials </a>
                <a class="dropdown-item " href="/blog?categoriess=discour_the_m">Discover the wineries </a>
                <a class="dropdown-item " href="/blog?categoriess=whisky">Whisky</a>
              </div>
            </li>
{{--          
            <li class="nav-item">
              <a class="nav-link " href="/blog" >Our Blog</a>
            </li> --}}
  
          </ul>
         </div>
      </div>
   </div>
  </nav>
  
  
  <!-- content for manu drawer -->
  
  
  
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn py-4" onclick="closeNav()"><img src="/page_assets/img/cross.svg" width="20" alt=""></a>
  
  
    <div class="row spacearound">
    <h1 class="checkout-titile1">Cart</h1>
      <div class="col-12 py-1 px-1 py-md-4 px-md-4">
        <div id="myCart">
              @php 
              $totalAmount = 00;
              $subAmount = 00
            @endphp

            @if(session()->has('cart'))
                  @foreach (session()->get('cart') as $key => $item)

                      @php    
                        $totalPrice = $item['productPrice'] * $item['quantity'];
                        // $totalQty = $totalQty + $item['quantity'];
                        $totalAmount = $totalAmount + $totalPrice;
                      @endphp
              

                      <div class="row" id="{{$key}}_cartPage">
                          <div class="col-3">
                            <img src="/product_images/{{ $item['productImage'] }}" class="img-fluid cartimage" alt="">
                          </div>
                          <div class="col-7">
                            <p class="mb-0 fot-titile"> {{ ucwords($item['productName']) }}</p>
                            <small class="">Quantity:<span> {{ $item['quantity'] }} </span></small> <br>
                            <small class="">Size:<span> {{ $item['productAttribute'] }}</span></small>
                          </div>
                          <div class="col-2 text-right">
                            <p class="fot-titile"> GHS <span>{{ number_format($totalPrice,2) }}</span></p>
                            
                            <small style=" cursor: pointer; " onclick="deleteCartPage({{$key}})">Remove</small>
                            
                          </div>
                          <div class="col-12">
                            <hr>
                          </div>
                      </div>

                  @endforeach
              @else

                <h2>
                  <strong>Empty Cart</strong> 
                </h2>

              @endif
        </div>

          {{-- <div class="row">
            <div class="col-3">
            <img src="/page_assets/img/wineholder.jpg" class="pr-3 cartimage  " alt="...">
            </div>
            <div class="col-7">
            <small class=""><span>Bordeaux </span> |  <span>France</span></small>
              <p class="mb-0 fot-titile"> <strong>2018 Estate Chardonnay</strong> </p>
            
              <small class="">Quantity:<span> 1</span></small> 
               
            </div>
            <div class="col-2 text-right">
              <p class="fot-titile">$<span>120</span></p>
              <small>Remove</small>
            </div>
            <div class="col-12">
               <hr>
            </div>
          </div> --}}
  
          
          <div class="form-row mt-5 pt-5">
            <div class="form-group col-md-12">
              <a href="/checkout">
                <button type="button"  class="btn btn-wine2u-deep px-5 btn-block">Checkout</button>
              </a>
            </div>
          </div>

      </div>
    </div>
  
  
  </div>
  
  
  <!-- content for manu drawer -->
  
  
  <nav class="mobinav fixed-top d-sm-block d-lg-none  bg-white py-3">
  <div class="container">
  <div id="myNavwhole" class="overlaywhole">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNavwhole()">&times;</a>
    <div class="overlay-contentwhole">
      <hr>
      @foreach ($menu->wines as $wine)
        <p><a href="/products?wine={{ $wine->slug }}">{{ ucwords($wine->title) }}</a></p>
        <hr>
      @endforeach

        <p><a href="/products?categories=champagne">Champagne</a></p>
        <hr>

        <p><a href="/products?categories=prosecco">Prosecco</a></p>
        <hr>

        <p><a href="/products?categories=sparkling_wine">Sparkling Wine</a></p>
        <hr>

        <p><a href="/products?categories=hard_liquor">Hard Liquor</a></p>
        <hr>

      @foreach ($menu->grapes as $grape)
        <p><a href="/products?grapes={{ $grape->slug }}">{{ ucwords($grape->title) }}</a></p>
        <hr>
      @endforeach

      {{-- @foreach ($menu->pairs as $pair)
        <p><a href="/products?wine={{ $pair->slug }}">{{ ucwords($pair->title) }}</a></p>
        <hr>
      @endforeach --}}

      @foreach ($menu->countries as $country)
        <p><a href="/products?country={{ $country->slug }}">{{ ucwords($country->name) }}</a></p>
        <hr>
      @endforeach

      
      <p><a  href="/blog" >Our Blog</a></p>
      
      
      {{-- <p> <a href="#">Champagnes</a></p>
      <p> <a href="#">Cognacs</a></p>
      <p><a href="#">Pairings</a></p>
      <p>   <a href="#">Grapes</a></p>
      <p>   <a href="#">Regions</a></p>
      <p>   <a href="#">Our Blog</a></p> --}}
      <p> <a href="/account" class="btn btn-wine3up px-4">Account</a></p>  
    </div>
  </div>
    <div class="row centerit">
      <div class="col-4">
      <a href="/"><img src="/page_assets/img/wine2ulogo.svg" class="navbar-band" alt="" width="70"></a>
      </div>
      
      <div class="col-8 text-right">
      <ul class="nav justify-content-end">
         <li class="nav-item px-3">
              <a class=" navbar-wholsome " href="/search">
               <img src="/page_assets/img/search.svg" width="20" alt="">
              </a>
            </li>
            
            <li class="nav-item px-2 ">
              <a class=" navbar-wholsome pointer"  onclick="openNav()">
               <img src="/page_assets/img/cart.svg" width="20" alt="">
                <span id="mTotalItems">

                  @php $totalItems = 0; @endphp
                  @if(session()->has('cart'))

                      @foreach (session()->get('cart') as $key => $item)
    
                          @php 
    
                            $totalItems = $totalItems + $item['quantity'];
            
                          @endphp
                    
                      @endforeach

                      {{ $totalItems }}
                  @else

                      {{ $totalItems }}

                  @endif

               </span>
              </a>
            </li>
          
           <li class="nav-item px-3 ">
              <span style="cursor:pointer" onclick="openNavwhole()">
                <img src="/page_assets/img/navmenuicon.svg" width="25" alt="MENU">
              </span>
            </li>
          </ul>
       
      </div>
    </div>
  </div>
  </nav>
  



