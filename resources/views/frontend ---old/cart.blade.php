<!DOCTYPE html>
<html>

	<head>
		<!-- Website Title & Description for Search Engine purposes -->

		<title>Haute Vie - Cart</title>

        <link rel="shortcut icon" type="image/png" src="{{ asset('images/favicon.png')}}">

        <meta charset="utf-8">

        <meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta name="description" content="">

	
		<!-- Mobile viewport optimized -->

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		
		<!-- Bootstrap CSS -->

		<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

		<link href="{{ asset('css/bootstrap-glyphicons.css')}}" rel="stylesheet">

		

		<!-- Custom CSS -->

		<link href="{{ asset('css/global-styles.css')}}" rel="stylesheet">

		<link href="{{ asset('css/cart-styles.css')}}" rel="stylesheet">



		<!-- Google Fonts -->

		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">



		<!-- Owl Carousel CSS -->

		<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">

		<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">



		<!-- Animate CSS -->

		<link href="{{ asset('css/animate.css')}}" rel="stylesheet">

		<!-- Font Awesome -->

		<link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    
        <!-- Material Icons -->

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        

		<!-- Include Modernizr in the head, before any other Javascript -->

		<script src="{{ asset('js/modernizr-2.6.2.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('jquery.js')}}"></script> 
		
  
	</head>

	<body>

        @include('frontend.inc.header')

        <div class="bag">

            <div class="container">

                <div class="row">

                    <div class="big-description clearfix">

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <h3 class="hidden-xs">Shopping Bag</h3>

                                <div class="visible-xs clearfix flex-sm">

                                    <h6 class="pull-left sm-title">Your Shopping Bag</h6>

                                    <p class="item-sm pull-right">
                                       
                                       <span id="mobileCartTotalItems">
                                            @if(!empty(session()->get('cart')))
                                                {{ count(session()->get('cart')) }}
                                            @endif
                                       </span>

                                        Item(s) 
                                    </p>

                                </div>

                                <br>

                            </div>



                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

                                <ul class="pull-right-md">

                                    <li class="hidden-xs">

                                        <h3>  

                                            <span id="cartTotalItems">
                                                @if(!empty(session()->get('cart')))
                                                    {{ count(session()->get('cart')) }}
                                                @endif
                                           </span>
    
                                            Item(s)

                                        </h3>

                                    </li>
                            
                                    {{-- <li>

                                        <a href="checkout.php"><button class="but1">Checkout</button></a>

                                    </li> --}}

                                </ul>

                            </div>

                    </div>

                </div>

            </div>

            <div class="items-part hidden-xs">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="table-responsive">
                                @if(!empty(session()->get('cart')))
                               
                              
                                    <table class="table">

                                        <thead>

                                            <tr>

                                                <th>Item</th>

                                                <th>Quantity</th>

                                                <th>Unit Price</th>

                                                <th>Subtotal</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            @php $totalAmount = 00 @endphp

                                            
                                        
                                     @foreach (session()->get('cart') as $key => $item)
                                        @php    
                                        
                                        $totalPrice = $item['productPrice'] * $item['quantity'];
                                        // $totalQty = $totalQty + $item['quantity'];
                                        $totalAmount = $totalAmount + $totalPrice;

                                        @endphp

                                            <tr id="{{$key}}_cartPage">

                                                <td>

                                                    <ul class="cart-items clearfix">

                                                        <li>

                                                        <img src="{{ asset('product_images/'.$item['productImage']) }}" class="img-responsive">

                                                            <div class="item-descr">

                                                            <h5>{{ $item["productName"] }}</h5>

                                                            <p class="small">SIZE: {{ $item['productAttribute'] }}</p>
                                                               <br>

                                                                <p class="small">

                                                                    <span class="pull-right" style="font-weight: 600; margin-bottom: 5px; cursor:pointer;" onclick="deleteCartPage({{$key}})" > Remove <span>

                                                                </p>
        
    
                                                                {{--  <p class="small">
                                                                    
                                                                    QTY: 10 X &#36 
                                                                    
                                                                </p> --}}


                                                            </div>

                                                        </li>

                                                    </ul>

                                                

                                                </td>

                                                <td>

                                                
                                                <!--<i class="fa fa-plus"></i>-->
                        
                                                <div class="col-sm-3">

                                                    <select id="{{ $item['variableProductId'] }}_quantity" onchange="EditToCart('{{ $item['variableProductId'] }}');" style="height:40px;">

                                                        @for($x=1; $x <= $item['totalQty']; $x++)
                                                            <option @if($item['quantity'] == $x)  selected="Selected" @endif value="{{ $x }}">
                                                                {{ $x }}
                                                            </option>
                                                        @endfor

                                                    </select>

                                                    {{-- <h5>  {{ $item['quantity'] }} </h5> --}}
                                                </div>  
                

                                                </td>
            
                                                <td class="price">

                                                    {{   session()->get('currency')."  ".$item['productPrice'] }}
                                                        
                                                </td>
                                            
                                                <td class="price">
                                                    {{ session()->get('currency') }}   <span id="{{ $item['variableProductId'] }}_cartSubTotal"> {{ number_format($totalPrice,2) }} </span>
                                                </td>

                                            </tr> 

                                        @endforeach
                            
                                        </tbody>

                                    </table>


                                 @else

                                 <p>No Item </p>

                                @endif

                            </div>    

                        </div> 

                    </div>    

                </div>    

            </div>

            <div class="list-items visible-xs">

                <div class="container">

                    <div class="row">
                      @if(!empty(session()->get('cart')))

                            <table class="table">

                                    <thead>

                                        <tr>

                                            <th>Item</th>

                                            <th>Quantity</th>

                                            <th>Unit Price</th>

                                            <th>Subtotal</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @php $totalAmount = 00 @endphp

                                        
                                    
                                @foreach (session()->get('cart') as $key => $item)
                                    @php    
                                    
                                    $totalPrice = $item['productPrice'] * $item['quantity'];
                                    // $totalQty = $totalQty + $item['quantity'];
                                    $totalAmount = $totalAmount + $totalPrice;

                                    @endphp

                                        <tr id="{{$key}}_mobileCartPage">

                                            <td>

                                                <ul class="cart-items clearfix">

                                                    <li>

                                                    <img src="{{ asset('product_images/'.$item['productImage']) }}" class="img-responsive">

                                                        <div class="item-descr">

                                                        <h5>{{ $item["productName"] }}</h5>

                                                        <p class="small">SIZE: {{ $item['productAttribute'] }}</p>
                                                        <br>

                                                            <p class="small">

                                                                <span class="pull-right" style="font-weight: 600; margin-bottom: 5px; cursor:pointer;" onclick="mDeleteCartPage({{$key}})" > Remove <span>

                                                            </p>


                                                            {{--  <p class="small">
                                                                
                                                                QTY: 10 X &#36 
                                                                
                                                            </p> --}}


                                                        </div>

                                                    </li>

                                                </ul>

                                            

                                            </td>

                                            <td>

                                            
                                            <!--<i class="fa fa-plus"></i>-->
                    
                                            <div class="col-sm-3">

                                                <select id="{{ $item['variableProductId'] }}_mobileQuantity" onchange="MeditToCart('{{ $item['variableProductId'] }}');" style="height:40px;">

                                                    @for($x=1; $x <= $item['totalQty']; $x++)
                                                        <option @if($item['quantity'] == $x)  selected="Selected" @endif value="{{ $x }}">
                                                            {{ $x }}
                                                        </option>
                                                    @endfor

                                                </select>

                                                {{-- <h5>  {{ $item['quantity'] }} </h5> --}}
                                            </div>  


                                            </td>

                                            <td class="price">

                                                {{   session()->get('currency')."  ".$item['productPrice'] }}
                                                    
                                            </td>
                                        
                                            <td class="price">
                                                {{ session()->get('currency') }}   <span id="{{ $item['variableProductId'] }}_mobileCartSubTotal"> {{ number_format($totalPrice,2) }} </span>
                                            </td>

                                        </tr> 

                                    @endforeach
                        
                                    </tbody>

                            </table>

                        @else
                          @php $totalAmount = 0.0 @endphp

                           <p>No Item </p>

                       @endif

                    </div>

                </div>

            </div>

        </div>


        @if(!empty(session()->get('cart')))
        

            <div class="base-section">

                <div class="container hidden-xs">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <img src="{{ asset('images/pplans.png') }}" class="img-responsive pull-right-md">

                            <div class="clearfix"></div>

                            <hr>
                        

                            <ul class="pull-right-md">

                                <li>
                                    <h3>Total</h3>
                                </li>
                                <li>

                                    <h4 class="price">{{ session()->get('currency') }}  <span id="grossTotal"> {{  number_format($totalAmount,2) }} </span> </h4>
                                
                                </li>
                                <li>
                                <a href="/{{ strtolower($shop->country) }}/tunnel" class="but1" type="submit">Checkout</a>
                                </li>

                            </ul>
                
                        </div>

                    </div>

                </div>

                <div class="container visible-xs">

                    <div class="row">

                        <div class="col-xs-12">

                            <div class="row">
                                <div class="col-xs-12">
                                     <h3>Summary</h3>
                                </div>

                                <div class="col-xs-6">
                                    <h4 class="price">Total</h4>
                                </div>
                                <div class="col-xs-6 pull-right"> 
                                    <h4 class="price"><span>{{ session()->get('currency') }}</span><span id="mobileGrossTotal"> {{  number_format($totalAmount,2) }} </span></h4>
                                </div>
                            </div>

                           

                            <br>

                        <a href="/{{ strtolower($shop->country) }}/tunnel"><button class="but1">Checkout</button></a>

                        </div>

                    </div>

                </div>

            </div>

        @endif
        
        <!--Coupon Modal -->
        {{-- <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="material-icons" data-dismiss="modal">close</i>
                        <h2>Have a promo code?</h2>
                        <form action="cart.php" method="POST">
                            <div class="form-group">
                                <label for="promo">Promo Code</label>
                                <input type="text" name="promo" class="form-control">
                                <!--<p class="text-danger small">Promo code doesn't exist.</p>-->
                            </div>
                            <button class="btn btn-success" name="coupon">Apply</button>    
                        </form>    
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End Coupon Modal -->



        @include('frontend.inc.footer')

        <script>

            $(document).ready(function(){

                $(".coup").click(function(){

                    $(".coup-in").toggleClass("reveal-coup");

                });

                $('#reveal-it').click(function(){

                    $('#reveal-me').toggleClass("hide-me");

                })

            })

        </script>

	</body>

</html>



