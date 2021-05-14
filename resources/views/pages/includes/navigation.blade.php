<nav class="site-nav navbar navbar-expand-sm fixed-top">
	<div class="w-100">
		<div class="container px-0">
			<div class="nv-top">
				<div class="nv-top-l d-none d-md-flex">
					<a href="https://facebook.com/wine2uinternational/" target="_blank" >
						<img src="/page_assets/img/facebookicon.svg" width="19" alt="">
					</a>
					<a href="" target="new">
						<img src="/page_assets/img/twittericon.svg" width="22" alt="">
					</a>
					<a href="" target="new">
						<img src="/page_assets/img/instagramicon.svg" width="22" alt="">
					</a>
				</div>
				<a href="/" class="navbar-brand" id="nav-logo">
					<img src="/page_assets/img/wine2ulogo.svg" class="navbar-band" alt="" width="70">
				</a>
				<div class="nv-top-r z-1">
					<div class="nv-form-search">
						<input type="text" placeholder="Keyword" class="nv-form-input" id="search_input">
						<button class="open-form-search">
							<img src="/page_assets/img/search.svg" width="20" alt="">
						</button>
						<div class="nv-form-results" id="search_result">

							{{-- <a href="" class="nv-form-res">
								<div class="nv-res-img">
									<img src="/page_assets/img/wine1.png" alt="" class="as-background">
								</div>
								<div class="nv-res-content">
									<p class="mb-1 nv-res-title">Rose Imperial</p>
									<p class="small mb-1">Moet & Chendron</p>
									<p class="small mb-1">Paris</p>
								</div>
							</a> --}}


						</div>
					</div>
					<button class="nv-cart ml-3" onclick="openNav()">
						<img src="/page_assets/img/cart.svg" width="20" alt=""> 
						<span class="nv-cart-num" id="totalItems">
							@php $totalItems = 0; @endphp
							@if(session()->has('cart'))
								@foreach (session()->get('cart') as $key => $item)
									@php 
										$totalItems = $totalItems + $item['quantity'];
									@endphp                        
								@endforeach
								{{ $totalItems }}
							@else
								{{ $totalItems }}
							@endif
						</span>
					</button>
					@if(!auth('customer')->user())
						<div class="nv-auth-links d-none d-md-flex ml-3">
							<a href="/signup">Register</a>
							<span class="px-2">/</span>
							<a href="/sign-in">Login</a>
						</div>
					@else
						<a href="/account" class="nv-auth-prof ml-3 d-none d-md-flex">
							<img src="/images/avatar.jpg" alt="" class="mr-2">
							<span>{{ auth('customer')->user()->fname." ".auth('customer')->user()->lname }}</span>
						</a>
					@endif
					<button class="navbar-toggler ml-3" data-toggle="collapse" data-target="#site-nav">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="container px-0">
			<div class="collapse navbar-collapse" id="site-nav">
				<div class="navbar-nav mx-md-auto">
					@foreach($menu->wines as $key => $wine)
						
						<div class="nv-dropdown" href="#">
							<a href="/products?wine={{ $wine->slug }}" class="px-md-3 py-md-2">{{ ucwords($wine->title) }} <i class="fa fa-angle-down ml-2"></i></a>
							<div class="nv-drop-menu">

								@foreach ($wine->subWines as $subWine)
									<div class="nv-dropdown">
										<a href="/products?wine={{ $subWine->slug }}">{{ ucwords($subWine->title) }}</a>
										{{-- <div class="nv-drop-menu">
											<a href="">Wine 1</a>
											<a href="">Wine 2</a>
										</div> --}}
									</div>
								@endforeach

							</div>
						</div>

					@endforeach

						
					{{-- <a class="px-md-3 py-md-2" href="/products">Champagne</a>
					<a class="px-md-3 py-md-2" href="/products">Prosecco</a>
					<a class="px-md-3 py-md-2" href="/products">Hard Liquor</a> --}}
					<a class="px-md-3 py-md-2" href="/pairing">Food Pairings</a>
					<a class="px-md-3 py-md-2" href="#">Wine Regions</a>

					@foreach($menu->blogCategories as $key => $blogCategory)
						
						<div class="nv-dropdown" href="#">
							<a href="/blog" class="px-md-3 py-md-2"> {{ ucwords($blogCategory->title) }} <i class="fa fa-angle-down ml-2"></i></a>
							<div class="nv-drop-menu">

								@foreach ($blogCategory->subCategories as $subCategory)
									<div class="nv-dropdown">
										<a href="/blog?category={{ $subCategory->slug }}">{{ ucwords($subCategory->title) }}</a>
										{{-- <div class="nv-drop-menu">
											<a href="">Wine 1</a>
											<a href="">Wine 2</a>
										</div> --}}
									</div>
								@endforeach

							</div>
						</div>

					@endforeach
					
				</div>
			</div>
		</div>
	</div>
</nav>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn py-4" onclick="closeNav()">
		<img src="/page_assets/img/cross.svg" width="20" alt="">
	</a> 
	<div class="row spacearound">
		<h1 class="checkout-titile1">Cart</h1>
		<div class="col-12 py-1 px-1 py-md-4 px-md-4">
			<div id="myCart">
				@php 
					$totalAmount = 00;
					$subAmount = 00
				@endphp

				@if(session()->has('cart'))
					@foreach (session()->get('cart') as $key => $item)
						@php    
							$totalPrice = $item['productPrice'] * $item['quantity'];
							// $totalQty = $totalQty + $item['quantity'];
							$totalAmount = $totalAmount + $totalPrice;
						@endphp
						<div class="row" id="{{$key}}_cartPage">
							<div class="col-3">
								<img src="/product_images/{{ $item['productImage'] }}" class="img-fluid cartimage" alt="">
							</div>
							<div class="col-7">
								<p class="mb-0 fot-titile"> {{ ucwords($item['productName']) }}</p>
								<small class="">Quantity:<span> {{ $item['quantity'] }} </span></small> <br>
								<small class="">Size:<span> {{ $item['productAttribute'] }}</span></small>
							</div>
							<div class="col-2 text-right">
								<p class="fot-titile"> GHS <span>{{ number_format($totalPrice,2) }}</span></p>
								<small style="cursor: pointer; " onclick="deleteCartPage({{$key}})">Remove</small>
							</div>
							<div class="col-12">
								<hr>
							</div>
						</div>
					@endforeach
				@else
					<h4 class="fw-bold">Empty Cart</h4>
				@endif
			</div>
			<div class="form-row mt-5 pt-5">
				<div class="form-group col-md-12">
					<a href="/checkout">
						<button type="button" class="btn btn-wine2u-deep px-5 btn-block">Checkout</button>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>