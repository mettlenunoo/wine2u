<!DOCTYPE html>
<html lang="en">

<head>

	<title>Haute Vie - Product</title>

	<link rel="shortcut icon" type="{{ asset('image/png')}}" href="images/favicon.png">
	<meta name="description" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<!-- Mobile viewport optimized -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!-- Bootstrap CSS -->

	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap-glyphicons.css')}}" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="{{ asset('css/global-styles.css')}}" rel="stylesheet">
	<link href="{{ asset('css/shop-styles.css')}}" rel="stylesheet">

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

	<style>
		.first-section span {background: transparent !important; color: #333 !important;font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;}


		.form-control {
			background: #fff;
			padding-top: 4px;
			padding-bottom: 4px;
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

		.loginbtn {
			background: #545454;
			padding: 15px 30px;
			border: 1px solid #545454;
			color: #ffffff !important;
			width: 100%;
			margin-top: 20px;
			margin-bottom: 20px;
			border-radius: 1px;
		}

		.loginbtn:hover {
			background: #545454;
			padding: 15px 30px;
			border: 1px solid #545454;
			color: #ffffff !important; 
			width: 100%;
			margin-top: 20px;
			margin-bottom: 20px;
			border-radius: 1px;
			color: #ffffff;
		}

		.btn-primary2 {
			color: #fff;
			background-color: #545454;
			border-color: #545454;
			border-radius: 1px !important;
			font-size: 14px !important;
			padding: 14px 16px !important;
		}


		.btn-primary2:hover {
			color: #fff;
			background-color: #000000;
			border-color: #000000;
		}

		.btn-primary2:focus {
			color: #fff;
			background-color: #000000;
			border-color: #000000;
		}

		.btn-primary:active {
			color: #fff;
			background-color: #204d74;
			border-color: #122b40;
		}

	</style>

</head>

<body>

	@include('frontend.inc.header')

	<div class="first-section">

		<div class="container">

			<div class="row">

				<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">

					<div class="owl-carousel owl-theme">

						<img src="{{ asset( 'product_images/'.$product->img1 ) }}" class="img-responsive">

						<img src="{{ asset( 'product_images/'.$product->img2 ) }}" class="img-responsive">

						@foreach ($product->productGallery as $photo)
						<img src="{{ asset( 'product_images/'.$photo->img ) }}" class="img-responsive">
						@endforeach

					</div>

				</div>

				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-1">

					<div class="clearfix" style="margin-top: 20px;">
						<h3 class="pull-left"><strong> {{ strtoupper($product->product_name) }}</strong></h3>
					</div>

					<p> {!!  ucfirst($product->description) !!}</p>
					<br>

					@if(!empty($attributes)) 

					<div class="row"> 

						<div class="col-6 col-md-6">
							<select class="custom-select form-control mr-sm-2" id="size" onchange="getval(this);">
								@foreach ($attributes as $key => $attribute)

								<option value="{{$attribute['id']}}"  @if($key == 0)  selected   @endif> {{$attribute['attribute']}}</option>

								@endforeach

								{{-- <option value="1">Small</option>
								<option value="2">Medium</option>
								<option value="3">Large</option>
								<option value="4">Exta Large</option>
								<option value="4">Box</option> --}}
							</select>
						</div>
						
						<div class="col-6 col-md-6">
							<select class="custom-select form-control mr-sm-2" id="quantity">

								@for ($i = 1; $i <= $quantity; $i++)
								<option value="{{ $i }}" >{{ $i }}</option>
								@endfor 

								{{-- <option selected="">Quantity</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="4">5</option> --}}
							</select>
						</div>
					</div>

					<div style="margin-top: 20px;">
						<p class=" total-price">
							{{ strtoupper($shop->currency) }} 
							<span id="price_section">

								@if( $salePrice > 0 ){

								{{ number_format($salePrice,2) }}
								<strike>{{ strtoupper($shop->currency) }} {{ number_format($regularPrice,2) }}</strike>
								{{-- <input type="hidden" id="_price" value="">  --}}

								@else

								{{ number_format($regularPrice,2) }}

								@endif

							</span>

							<input type="hidden" name="item_price" value="5" id="price-input">
						</p>

						<input type="hidden" value="{{ $attributeId }}" id="vproductId">

						<!-- <button  class="btn loginbtn " onclick="addToCart()"><span id="addbtn">ADD TO BAG </span> </button> -->
						<button type="button" class="btn btn-lg  btn-primary2 btn-block" onclick="addToCart()" id="addbtn">ADD TO BAG </button>
						@else

						<button class="btn loginbtn">OUT OF STOCK</button>

						@endif

					</div>





				</div>

			</div>	

		</div>

	</div>

</div>



<div class="second-section">

	<div class="container">

		<div class="row">

			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

				<h3>PRODUCT INGREDIENTS</h3>
				{!! $product->short_description !!}

				<h3>PRODUCT DETAILS</h3>
				{!! $product->more_description !!}

						<!--<ul>

							<li>Polo Ralph Lauren shell and cotton-jersey bomber jacket.</li>

							<li>Stand collar, long sleeves, contrasting collar, sleeves and hem with marl pattern, zipped pocket at sleeve, polo player hardware at chest, padded, popper-fastened welt pockets at front, branded silver-toned hardware, fully lined</li>

							<li>100% nylon; 58% polyester, 42% cotton; 59% cotton, 39% polyester, 2% elastane; 90% down, 10% feathers</li>

							<li>Exposed zip fastening at front</li>

							<li>Model is 6ft and wears a size medium</li>

						</ul>-->

						<h3>DELIVERY & RETURNS</h3>

						<div class="panel-group" id="accordion">

							<div class="panel panel-default">

								<div class="panel-heading">

									<h4 class="panel-title clearfix">

										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1">

											<i class="material-icons pull-right" style="margin-top: 5px;">&#xE145;</i>

											<h5 class="pull-left">Shipping Policy</h5>

										</a>

									</h4>

								</div>

								<div id="collapse1" class="panel-collapse collapse">

									<div class="panel-body">

										For more information on our shipping policy, <a href="https://hvafrica.com/page/shipping-policy">click here.</a>

									</div>

								</div>

							</div>

							<div class="panel panel-default">

								<div class="panel-heading">

									<h4 class="panel-title clearfix">

										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2">

											<i class="material-icons pull-right" style="margin-top: 5px;">&#xE145;</i>

											<h5 class="pull-left">Delivery & Exchanges</h5>

										</a>

									</h4>

								</div>

								<div id="collapse2" class="panel-collapse collapse">

									<div class="panel-body">

										For more information on our delivery policy, <a href="https://hvafrica.com/page/delivery-exchanges">click here.</a>
									</div>

								</div>

							</div>



						</div>

					</div>

					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

						<img src="{{ asset( 'product_images/'.$product->img2 ) }}" class="img-responsive">

					</div>	

				</div>

			</div>

		</div>



		<div class="third-section">

			<div class="container">

				<div class="row">

					<div class="col-lg-12 text-center">

						<h3>RECOMMENDED FOR YOU </h3>

					</div>

					@foreach ($relatedProducts as $product)

					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">  
						<div class="panel">  
							{{-- <input type="hidden" name="pid" id="product_id" value=""> --}}
							<div class="panel-body">

								<a href="/{{ strtolower($shop->country) }}/product/{{ strtolower($product->slug)  }}">
									<div class="image-in">

										<img src="{{ asset('product_images/'.$product->img1) }}" class="img-responsive img-resize">

									</div>

									<div class="hover-image">

										<img src="{{ asset('product_images/'.$product->img2) }}" class="img-responsive img-resize">

									</div>
								</a> 

								<div class="bag-func" onclick="cart('{{ $product->id }}')" >
									<i  style="cursor: pointer;"class="fa fa-shopping-bag"></i>
								</div>

							</div>

							<div class="panel-footer clearfix">
								<div class="clearfix">
									<h4 class="pull-left">{{ ucwords($product->product_name)  }}</h4>

									<p class="price pull-right">

										@if( $product->variableProductSingle['sale_price'] > 0 ){
										
										{{ strtoupper($shop->currency) }} {{ number_format($product->variableProductSingle['sale_price'],2) }}

										<strike>{{ strtoupper($shop->currency) }} {{ number_format($product->variableProductSingle['regular_price'],2) }}</strike>
										{{-- <input type="hidden" id="_price" value="">  --}}

										@else

										{{ strtoupper($shop->currency) }} {{ number_format($product->variableProductSingle['regular_price'],2) }}

										@endif

									</p>
								</div>

								{{ strwords($product->description, 50) }}

							</div>
							
							@if($product->variableProductSingle['quantity'] <= 0)
							<div class="out-of-stock">
								<h4>OUT OF STOCK</h4>
							</div>
							@endif
						</div>
					</div>

					@endforeach



				</div>

			</div>	

		</div>



		@include('frontend.inc.footer')

		<script type="text/javascript">

			$(document).ready(function(){

				$('.owl-carousel').owlCarousel({

					loop:true,

					margin:15,

					nav:true,

					navText : ["<i class='fa fa-caret-left'></i>","<i class='fa fa-caret-right'></i>"],

					smartSpeed:450,

					pagination: false,

					responsive:{

						0:{

							items:1

						},

						600:{

							items:1

						},

						1000:{

							items:1

						}

					}

				})

				$('.select-size').click(function(){

					if ($(this).hasClass('disabled')) {

						$('.prod-sizes li').removeClass('select-me');

						$('.not-avail').css('display','block');

					}

					else{

						$('.not-avail').css('display','none');

						$('.prod-sizes li').removeClass('select-me');

						$(this).addClass('select-me');

					}

				})

				$('.accordion-toggle').on('click', function() {

					var $icon = $(this).find('.material-icons');

					if ($icon.hasClass('add')) {

						$icon.html('&#xE145;');

					} else {

						$icon.html('&#xE15B;');

					}

					$icon.toggleClass('add');

				});

			});
			

		</script>

	</body>

	</html>



