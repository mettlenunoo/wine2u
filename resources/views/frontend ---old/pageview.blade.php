<!DOCTYPE html>
<html lang="en">
	<head>
		
	    <title>Haute Vie - {{ strtoupper($page->title) }}</title>

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
							<h1>{{ strtoupper($page->title) }} </h1>	
							{!! $page->content !!} 
							
						</div>
					</div>
				</div>
			</div>
	
	 @include('frontend.inc.footer')

	</body>
</html>

