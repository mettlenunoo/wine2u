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
				padding-top: 20px;
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
						<section class="">
							<div class="container-fluid">
							 <div class="row centerit">
						 
							   <div class="col-12 col-md-6 col-md-offset-3 logspace">
								 <div class="my-4">
								   <h3 class="text-mid-sgm"><strong>Create an account</strong> </h3>
								   <hr>
								   
								   {{-- LOGIN INFO --}}
								   @include('frontend.message')
						 
								 </div>
						 
						 
								 <div>
									 {!! Form::open(['action' => 'publicController@addcustomer', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
						 
									 <div class="form-group">
									   <label for="firstname">First Name*</label>
									   <input type="text" class="form-control" name="fname"  placeholder="Enter first name" value="{{ old('fname') }}" required autocomplete="fname">
									 </div>
						 
									 <div class="form-group">
									   <label for="lastname">Last Name*</label>
									   <input type="text" class="form-control" name="lname"  placeholder="Enter last name" value="{{ old('lname') }}" required autocomplete="lname">
									 </div>
						 
									 <div class="form-group">
									   <label for="exampleInputEmail1">Email address*</label>
									   <input type="email" name="email" placeholder="Email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
						 
									   @error('email')
										 <span class="invalid-feedback" role="alert">
											 <strong>{{ $message }}</strong>
										 </span>
									  @enderror
									 </div>
						 
									 <div class="form-group">
									   <label for="exampleInputPassword1">Password*</label>
									   <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
									   @error('password')
										 <span class="invalid-feedback" role="alert">
											 <strong>{{ $message }}</strong>
										 </span>
									  @enderror
									 </div>
						 
									 <div class="form-group">
										 <label for="exampleInputPassword1">Confirm Password*</label>
										 <input type="password" class="form-control"  placeholder="Confirm Password"  name="password_confirmation" required autocomplete="new-password">
									 </div>
						 
								
						 
									 <div class="custom-control custom-checkbox mb-4">
									   <input type="checkbox" class="custom-control-input" id="customCheck1">
									   <label class="custom-control-label" for="customCheck1">Join our mailing list to hear about our latest offers!</label>
									 </div>

									 <div class="form-group">
									 	<button type="submit" class="btn loginbtn  btn-block text-center hvr-sweep-to-right">Create Account <span class="pl-2 text-right"> </span></button>

									 <p></p>
									 	<p class="fot-smalltxt padtop text-center"><a href="/{{ strtolower($shop->country) }}/user/login" class="bc pb-2 hvblack">Have an account? Login</a></p>
						 
								   {!! Form::close() !!}
									 </div>
									 
									 
								 </div>
						 
							   </div>
						 
						 
							   <div class="col-12 col-md-6 signup ">        
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

