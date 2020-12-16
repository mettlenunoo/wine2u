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

		.product-titile {
			font-weight: 600;
			font-size: 16px;
			color: #000000;
		}

		.mb-3 {
			padding-bottom: 2rem;
		}

		.mb-0, .my-0 {
			margin-bottom: 0 !important;
		}

		.editpro {
			padding: 4rem;
			background: #efeeee;
			border-radius: 0.01px;
			border: 1px solid #efeeee;
		}

		.text-mid-sgm {
			font-weight: 600;
			font-size: 24px;
			line-height: 48px;
			color: #000000;
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
											<div class="col-7 col-md-7">
												<h3 class="text-mid-sgm">Hi <span> {{ auth('customer')->user()->fname }}</span>, here’s your dashboard</h3>
											</div>

											<div class="col-5 col-md-5 text-right">
												<ul class="list-inline  ">
													<li class="list-inline-item "><a href="/{{ strtolower($shop->country) }}/account" class="editfonttop active">Your details</a> | </li>
													<li class="list-inline-item "><a href="/{{ strtolower( $shop->country) }}/account/orders" class="editfonttop">Orders</a> | </li>

													<li class="list-inline-item">

														<a href="{{ route('/account/logout') }}"><span onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </span> </a>
														<form id="logout-form" action="{{ route('/account/logout') }}" method="GET" style="display: none;">
															@csrf
														</form>

													</li>

												</ul>
											</div>
										</div>



										<div class="card editpro">
											<div class="card-body">
												<div class="row">
													<div class="col-7 col-md-7">
														<p class="text-mid-sgm">Personal details</p>
													</div>

													<div class="col-5 col-md-5 text-right">
														<p class="bc"><a href="/{{ strtolower($shop->country)}}/account/profile/edit" class="bc">Edit</a></p>
													</div>
												</div>

												<div class="row">
													<div class="col-12 col-md-6 mb-3"> 
														<p class=" product-titile mb-0"><strong>First name</strong> </p>
														<p>{{ auth('customer')->user()->fname }}</p>
													</div>

													<div class="col-12 col-md-6 mb-3"> 
														<p class=" product-titile mb-0">Last name</p>
														<p>{{ auth('customer')->user()->lname }}</p>
													</div>

													<div class="col-12 col-md-6 mb-3"> 
														<p class=" product-titile mb-0">Email</p>
														<p>{{ auth('customer')->user()->email }}</p>
													</div>  


													<div class="col-12 col-md-6 mb-3"> 
														<p class=" product-titile mb-0">Phone Number</p>
														<p>{{ auth('customer')->user()->phone }}</p>
													</div>

													<div class="col-12 col-md-6 mb-3"> 
														<p class=" product-titile mb-0">Country</p>
														<p>{{ auth('customer')->user()->country }}</p>
													</div>


													<div class="col-12 col-md-6 mb-3"> 
														<p class=" product-titile mb-0">Region/State</p>
														<p>{{ auth('customer')->user()->state }}</p>
													</div>


													<div class="col-12 col-md-6 mb-3"> 
														<p class=" product-titile mb-0">City</p>
														<p>{{ auth('customer')->user()->city }}</p>
													</div>

													<div class="col-12 col-md-6 mb-3"> 
														<p class=" product-titile mb-0">Street Address</p>
														<p>{{ auth('customer')->user()->street }}</p>
													</div>

													<div class="col-12 col-md-6 mb-3"> 
														<p class=" product-titile mb-0">Apartment</p>
														<p>{{ auth('customer')->user()->apartment }}</p>
													</div>


													<div class="col-12 col-md-6 mb-3"> 
														<p class=" product-titile mb-0">Zip</p>
														<p>{{ auth('customer')->user()->zip }}</p>
													</div>


												</div>


											</div>
										</div>




									</div>


								</div>
							</div>
						</div>
					</section>
					<!-- main category -->

				</div>
			</div>
		</div>
	</div>
	
	@include('frontend.inc.footer')

</body>
</html>

