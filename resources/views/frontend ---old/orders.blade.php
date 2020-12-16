<!DOCTYPE html>
<html lang="en">
	<head>
		
		<title>Haute Vie - Terms</title>

		<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png')}}">
		
		<meta name="description" content="">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{ asset('css/bootstrap-glyphicons.css')}}" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="{{ asset('css/global-styles.css')}}" rel="stylesheet">
		<link href="{{ asset('css/index-styles.css')}}" rel="stylesheet">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">

		<!-- Animate CSS -->
		<link href="{{ asset('css/animate.css')}}" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">	
		
		<!-- Modernizer -->
		<script src="{{ asset('js/modernizr-2.6.2.min.js')}}"></script>	

		<!-- Material Icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


		<style type="text/css">
			.term {
				padding-top: 120px;
				padding-bottom: 120px;
				background: #f8f8f8;
			}

			.term h2 {
				font-weight: 400;
				margin-top: 0px;
				font-size: 30px;
				margin-bottom: 40px;
			}

			.term h4 {
				margin-top: 0px;
				font-weight: 600;
				font-size: 15px;
			}
		</style>
	</head>
	<body>

		@include('frontend.inc.header')

		<div class="term">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">

						<section class="globaltopspace">
							<div class="container-fluid container-sgm">
							 <div class="row">
					   
							   <div class="col-12 col-md-12 ">
								 <div class="my-4">
								   <div class="row">
									 <div class="col-7">
									   <p class="text-mid-sgm">Hi <span>{{ auth('customer')->user()->fname }}</span>, here’s your Orders</p>
									 </div>
					   
									 <div class="col-5 text-right">
									   <ul class="list-inline  ">
										   <li class="list-inline-item "><a href="/{{ strtolower($shop->country) }}/account" class="editfonttop active">Your details</a> | </li>
										   <li class="list-inline-item "><a href="/{{ strtolower( $shop->country) }}/account/orders" class="editfonttop">Orders</a></li>
									   </ul>
									 </div>
								   </div>
					   
							 
					   
								   <div class="card editpro">
									 <div class="card-body">
									   <div class="row">
									 @if(count($orders) > 0)
										 <div class="col-12">
											<p class="text-mid-sgm">Orders</p>
										 </div>
					   
										 
									   </div>
								  @foreach ($orders as $order)
									  
									   <div class="row mb-2">
										 <div class="col-12 col-md-6"> 
										 <p class=" product-titile mb-0">Order #{{ $order->ship_code}}</p>
										   <p class="mb-0 bc">Date placed: <span>{{ $order->created_at}}</span></p>
										   <p class="mb-0 bc">Quantity: <span>{{ $order->quantity}} item(s)</span></p>
										   <p class="bc" >Status: <span>{{ $order->complete_status}}</span></p>
					   
										 </div>
										  @php  $subTotal = $order->totalamount - ($order->taxes + $order->Shipping_amt) @endphp
										 <div class="col-12 col-md-6 mb-3 text-right"> 
											 <p class="bc">Sub Total: {{ number_format($subTotal,2)}}</p>
											 <p class="mb-0 bc">Tax: <span>{{ $order->taxes}}</span></p>
											 <p class="" >Shipping: <span>{{ $order->shipping_amt}}</span></p>
											 <p class="product-titile mb-0" >Total: <span>{{ $order->totalamount}}</span></p>
										 </div>
					   
										   <div class="col-12">
											 <hr>
										   </div>
									   </div>
					   
								   @endforeach
					   
					   
								   @else
								 
									 <div class="col-12">
										 <p class="text-mid-sgm">No Order yet</p>
								   </div>
					   
								   @endif
									 
								   </div>
								 </div>
					   
								
					   
							   </div>
					   
							 </div>
					   
						   </div>
						 </div>
					   </section>
					 	
					</div>
				</div>
			</div>
		</div>
	
		@include('frontend.inc.footer')

	</body>
</html>

