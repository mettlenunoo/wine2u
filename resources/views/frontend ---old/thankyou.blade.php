<!DOCTYPE html>
<html lang="en">
	<head>

		<title>Haute Vie - Completed Order</title>
		<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png')}}">
		
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{ asset('css/bootstrap-glyphicons.css')}}" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="{{ asset('css/global-styles.css')}}" rel="stylesheet">

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
			.has-background {
				background-size: cover;
				background-position: center;
				background-repeat: no-repeat;
				background-image: url('images/1.jpg');
				min-height: 500px;
			}

			.has-text {
				padding:10vh 20px 20vh 20px;
				background: #f8f8f8;
			}

			.has-text img {
				margin-left: auto;
				margin-right: auto;
				max-height: 100px;
				margin-bottom: 40px;
				margin-top: 40px;
			}

			.has-text button {
				padding: 15px 40px;
				background: transparent;
				border: 1px solid #333;
				color: #333;
				outline: none;
				letter-spacing: 1px;
				margin-top: 40px;
			}

			@media(min-width: 768px) {.flex{display: flex;}}
		</style>

	</head>
		<body>
            @php

                //session()->flush();
                // Forget multiple keys...
                session()->forget(['cart', 'coupon']);

            @endphp
            
            @include('frontend.inc.header')

		<div class="container-fluid">
			<div class="row flex">
				<div class="col-lg-6 col-md-6 col-sm-6 hidden-xs has-background">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center has-text">
                    <h2>HI, {{ session()->get('paymentinfo')['fullname'] }}</h2>
					<img src="{{ asset('images/summary.png')}}" class="img-responsive">
					<p>Your order has now been confirmed.</p>
					<p>We will send you some inbox love when your order leaves our warehouse.</p>
					<a href="\{{ strtolower($shop->country) }}\store"><button>CONTINUE SHOPPING <span class="pl-2 text-right"><img src="{{ asset('img/icons/arrorright.svg')}}" width="8" alt=""></span></button></a>
				</div>
			</div>
		</div>
		
	
        @include('frontend.inc.footer')

	</body>
</html>




