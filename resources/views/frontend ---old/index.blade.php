<!DOCTYPE html>

<html lang="en">
	<head>
		
		<title>Haute Vie - Welcome</title>
		<link rel="shortcut icon" type="image/jpg" href="images/favicon.jpg">
		
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{ asset('css/bootstrap-glyphicons.css')}}" rel="stylesheet">

		<link href="{{ asset('css/global-styles.css')}}" rel="stylesheet">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">

		<!-- Animate CSS -->
		<link href="{{ asset('css/animate.css')}}" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">	
		
		<!-- Modernizer -->
		<script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>	

		<!-- Material Icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<style type="text/css">
			header {
				height: 100vh;
				width: 100vw;
				background-size: cover;
				background-position: center;
				background-repeat: no-repeat;
				background-image: url('images/11.jpg');
			}

			header .to-fill {
				position: absolute;
				left: 5%;
				top: 50%;
				transform: translateY(-50%);
				width: 550px;
				color: #fff;
			}

			header .to-fill h2 {
				font-size: 70px;
				margin-top: 0px;
				margin-bottom: 5px;
				white-space: nowrap;
				font-weight: 300;
			}

			header .to-fill select {
				padding: 10px;
				color: #333;
				border: none;
				height: 45px;
				font-size: 13px;
				margin-right: 20px;
			}

			header .to-fill button {
				border: none;
				background: #fff;
				padding: 10px;
				color: #333;
				height: 45px;
				text-align: left;
				width: 70px;
				font-size: 13px;
				vertical-align: top;
			}

			header .to-fill button h5 {
				margin: 0px;
			}
			
			@media(max-width:468px) { header .to-fill h2 {font-size:50px;}}
		</style>
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-49735433-49"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-49735433-49');
</script>



	</head>
	<body>

		<header>
			<div class="to-fill">
				<!--<h2>HAUTE VIE</h2>-->
				<img src="{{ asset('images/white-logo-1.png')}}" class="img-responsive" style="padding-bottom:50px;">
				<p>EXPLORE THE COLLECTION</p>
				{!! Form::open(['action' => 'publicController@selectCountry', 'method' => 'POST', 'class'=> 'form-horizontal'] ) !!}

				{{-- <form class="form-horizontal" action="index" method="Post" > --}}
					<select  name="country" required="">

						<option value="">SELECT YOUR COUNTRY</option>
							@foreach($shops as $shop)
					           <option value= "{{ strtolower($shop->country) }}">{{ ucwords($shop->shop_name) }}</option>
							@endforeach

					</select>
					<button class="clearfix" type = "submit">
						<h5 class="pull-left">GO</h5>
						<i class="fa fa-caret-right pull-right"></i>
					</button>

				{!! Form::close() !!}
			</div>
		</header>
		
	
		<!-- First try for the online version of jQuery-->
		<script src="http://code.jquery.com/jquery.js"></script>

		<!-- If no online access, fallback to our hardcoded version of jQuery -->
		<script>window.jQuery || document.write('<script src="js/jquery-1.11.3.min.js"><\/script>')</script>

		<!-- Bootstrap JS -->
		<script src="{{ asset('js/bootstrap.min.js')}}"></script>
		<script src="{{ asset('js/owl.carousel.min.js')}}"></script>
	</body>
</html>

