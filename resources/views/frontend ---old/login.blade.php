
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Haute Vie - Login</title>
	
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">

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
									<div class="my-4">
										<h3 class="text-mid-sgm"><strong>welcome back!</strong> </h3>
										<hr>

										{{-- LOGIN INFO --}}
										@include('frontend.message')

									</div>

									<div class="">
										<form method="POST" action='{{ url("/user/login") }}' aria-label="{{ __('Login') }}">
											@csrf
											{{-- {!! Form::open(['action' => 'Auth\LoginController@userLogin', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!} --}}

											<div class="form-group">
												<label for="exampleInputEmail1">Email address</label>
												<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

												@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror

											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Password</label>
												<input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

												@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>

											<div class="form-group row">
												<div class="col-md-12 ">

													<div class="form-check">
														<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

														<label class="form-check-label" for="remember">
															{{ __('Remember Me') }}
														</label>
													</div>
													<div class="form-check">

														<label class="form-check-label" for="remember">
															<small><a href="/{{ strtolower($shop->country) }}/user/forgottenpassword" class="hvblack">{{ __('Forgotten your password? Click here') }}</a></small>  
														</label>
													</div>
												</div>
											</div>





											<button type="submit" class="btn loginbtn btn-block text-center hvr-sweep-to-right">Login <span class="pl-2 text-right"><img src="img/icons/arrorright.svg" width="8" alt=""></span></button>

											<p></p>


											<p class="fot-smalltxt padtop text-center"><a href="/{{ strtolower($shop->country) }}/sign-up" class="bc pb-2 hvblack dropown-toggle">New here? Create an account</a></p>

										</form>
									</div>

								</div>

								<div class="col-12 col-md-6 login ">        
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