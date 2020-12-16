<!DOCTYPE html>
<html lang="en">
	<head>
		
	    <title>Haute Vie Forgotten Password</title>

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
				padding-top: 90px;
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

				.form-control {
			background: #fff;
			padding-top: 10px;
			padding-bottom: 10px;
			height: 40px;
			border-radius: 0px;
			color: #333;
			font-weight: 400;
			border: 1px solid #f0f0f0;
			box-shadow: none;
		}

		.form-control:focus {
			border-color: #f8f8f8;
			outline: 0;
			-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0);
		}
		

		.padtop  {
			padding-top: 30px;
		}


		.loginbtn {
			background: #545454;
			padding: 15px 30px;
			border: 1px solid #545454;
			color: #fff;
			width: 100%;
			margin-top: 20px;
			margin-bottom: 20px;
			border-radius: 1px;
		}

			.loginbtn:hover {
			background: #545454;
			padding: 15px 30px;
			border: 1px solid #545454;
			color: #fff;
			width: 100%;
			margin-top: 20px;
			margin-bottom: 20px;
			border-radius: 1px;
		}



     .hvblack {
     	color: #545454;
     }

      .hvblack:hover {
     	color: #545454;
     	text-decoration: none;
     }
		</style>
	</head>
	<body>

		@include('frontend.inc.header')

			<div class="term">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
							 <!-- main category -->

  <section class="">
	<div class="container-fluid">
	 <div class="row centerit">
 
	   <div class="col-12 col-md-6 col-md-offset-3 logspace">
		 <div class="my-6">
		   <h3 class="text-mid-sgm"><strong>Reset Password</strong> </h3>
		   <hr>
 
 
				 <div class="card-body">
					 @if (session('status'))
						 <div class="alert alert-success" role="alert">
							 {{ session('status') }}
						 </div>
					 @endif
 
					 @if (session('error'))
					 <div class="alert alert-danger" role="alert">
						 {{ session('error') }}
					 </div>
				 @endif
				 </div>
 
		   <form method="POST" action='{{ url("/user/resetlink") }}' aria-label="{{ __('Login') }}">
			 @csrf
		   <input type="hidden" name="country" value="{{ strtolower($shop->country) }}">
		 <div class="form-group">
		   <label for="exampleInputEmail1">Enter Email address</label>
		   <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email address"  value="{{ old('email') }}" required autocomplete="email" autofocus>
 
		   @error('email')
			   <span class="invalid-feedback" role="alert">
				   <strong>{{ $message }}</strong>
			   </span>
		   @enderror
 
		 </div>
			 
		 <button type="submit" class="btn loginbtn btn-block text-center hvr-sweep-to-right"> {{ __('Send Password Reset Link') }} <span class="pl-2 text-right"><img src="img/icons/arrorright.svg" width="8" alt=""></span></button>
 
		   </form>
		 </div>
 
	   </div>
 
 
	   <div class="col-12 col-md-6 thankyou">        
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

