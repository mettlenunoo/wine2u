
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
       <div class="col-12 col-md-3">
       <a href="/"><img src="/page_assets/img/wine2ulogo.svg" class="navbar-band" alt="" width="70"></a>
       
       </div>

       <div class="col-12 col-md-6 justify-content-center">
       <div class="form-group has-search">
          <span class=" form-control-feedback"><img src="/page_assets/img/searchicon.svg" alt=""></span>
          <form action="/search" method="GET">
            <input type="text" class="form-control form-control-wine2u" name="keyword" placeholder="" value="{{ $keyword }}" >
          </form>
        </div>
       </div>

       <div class="col-12 col-md-3">
       <ul class="nav justify-content-end">
       
          <li class="nav-item ">
          <a class="nav-link navbar-wholsome pointer" onclick="openNav()"><img src="/page_assets/img/cart.svg" width="24" alt=""> 
              <small class="">
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
  </div>
</div>
  <div class="row centerit">
    <div class="col-4">
    <a href="/"><img src="/page_assets/img/wine2ulogo.svg" class="navbar-band" alt="" width="70"></a>
    </div>
    
    <div class="col-8 text-right">
    <ul class="nav justify-content-end">
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

    
    <div class="col-12">
    <div class="form-group has-search">
          <span class=" form-control-feedback"><img src="/page_assets/img/searchicon.svg" alt=""></span>
          <form action="/search" method="GET">
            <input type="text" class="form-control form-control-wine2u" name="keyword" placeholder="" value="{{ $keyword }}" >
          </form>
          {{-- <input type="text" class="form-control form-control-wine2u" placeholder=""> --}}
        </div>
    </div>

  </div>
</div>
</nav>







