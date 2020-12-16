<!DOCTYPE html>
<html lang="en">
	<head>
		
		<title>Haute Vie - Reset Password</title>

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
						<section class="">
							<div class="container-fluid">
							 <div class="row centerit">
						 
							   <div class="col-12 col-md-6 logspace">
								 <div class="my-6">
								   <p class="text-mid-sgm">Reset Password </p>
						 
						 
										 <div class="card-body">
										 
											 @if (session('error'))
											 <div class="alert alert-danger" role="alert">
												 {{ session('error') }}
											 </div>
										 @endif
										 </div>
						 
								   <form method="POST" action='{{ url("/user/reset_changepassword") }}' aria-label="{{ __('Login') }}">
									 @csrf
								 {{-- {!! Form::open(['action' => 'Auth\LoginController@userLogin', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!} --}}
						 
								<input type="hidden" name="token" value="{{ $token }}">
						 
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
									 
								 <button type="submit" class="btn btn-dark btn-dark-sgm btn-block text-center hvr-sweep-to-right"> {{ __('Change Password') }} <span class="pl-2 text-right"><img src="img/icons/arrorright.svg" width="8" alt=""></span></button>
						 
								   </form>
								 </div>
						 
							   </div>
						 
						 
							   <div class="col-12 col-md-6 thankyou">        
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

