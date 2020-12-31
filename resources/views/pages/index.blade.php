<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

   

   <!-- include navigation -->
      @include("pages.includes.nav-links")
      @include("pages.includes.navigation")
   <!-- include navigation -->


<section class="home-top">
	<div class="home-top-bg"></div>
  <div class="container-fluid container-w2u p-relative">
    <div class="row ">
       <div class="col-12 col-lg-7">
    		<h1 class="home-top-b">Shop <br>
        	Exclusively From Our Winery</h1>
         <p class="max-w-500">Shop the latest releases of wine along with exclusive offers, rare and limited edition wines, as well as the latest merchandise from our tasting rooms.</p>
		<div class="new-arrivals pb-4">
			<div class="new-arr-bg"></div>
			<div class="new-arr-top mb-4">
				<p class="libre-font mb-0">NEW ARRIVALS</p>
				<div class="arr-ctrls">
					<button id="arr-left">
						<img src="/page_assets/img/leftarrow.svg" alt="">
					</button>
					<button class="ml-2" id="arr-right">
						<img src="/page_assets/img/rightarrow.svg" alt="">
					</button>
				</div>
			</div>
			<div class="arr-slide-area px-md-4">
				<div class="arr-slides owl-carousel owl-theme">
					@foreach ($newArrivals as $key => $product)
						<div class="arr-product">
							<div class="arr-img mb-2">
								<img src="/product_images/{{ $product->img1 }}" alt="/products/{{ $product->slug }}" class="as-background">
								<a href="/products/{{ $product->slug }}" class="arr-mini-btn">
									<i class="fa fa-plus"></i>
								</a>
							</div>
							<div class="text-center">
								<p class="small mb-0">Moet & Chandon | Paris</p>
								<a href="/products/{{ $product->slug }}" class="mb-1 arr-title">{{ ucwords($product->product_name) }}</a>
							</div>
						</div>
					@endforeach
					<!-- <div class="arr-product">
						<div class="arr-img">
							<img src="/page_assets/img/wine1.png" alt="" class="as-background">
							<button class="arr-mini-btn">
								<i class="fa fa-plus"></i>
							</button>
						</div>
						<div class="text-center">
							<p class="small mb-0">Moet & Chandon | Paris</p>
							<a href="" class="mb-1 arr-title">Moet Imperial</a>
						</div>
					</div>
					<div class="arr-product">
						<div class="arr-img">
							<img src="/page_assets/img/wine1.png" alt="" class="as-background">
							<button class="arr-mini-btn">
								<i class="fa fa-plus"></i>
							</button>
						</div>
						<div class="text-center">
							<p class="small mb-0">Moet & Chandon | Paris</p>
							<a href="" class="mb-1 arr-title">Moet Imperial</a>
						</div>
					</div>
					<div class="arr-product">
						<div class="arr-img">
							<img src="/page_assets/img/wine1.png" alt="" class="as-background">
							<button class="arr-mini-btn">
								<i class="fa fa-plus"></i>
							</button>
						</div>
						<div class="text-center">
							<p class="small mb-0">Moet & Chandon | Paris</p>
							<a href="" class="mb-1 arr-title">Moet Imperial</a>
						</div>
					</div>
					<div class="arr-product">
						<div class="arr-img">
							<img src="/page_assets/img/wine1.png" alt="" class="as-background">
							<button class="arr-mini-btn">
								<i class="fa fa-plus"></i>
							</button>
						</div>
						<div class="text-center">
							<p class="small mb-0">Moet & Chandon | Paris</p>
							<a href="" class="mb-1 arr-title">Moet Imperial</a>
						</div>
					</div> -->
				</div>
			</div>
		</div>
       </div>
       <div class="col-12 col-lg-5 d-none d-md-none d-lg-block d-xl-block">
          <img src="/page_assets/img/wineandgrape.png" class="img-fluid w-100  mt-4" alt="">
       </div>
    </div>
  </div>
</section>

<div class="container-fluid container-w2u moveupfeature d-none">
   	<div class="row">
	<div class="col-12 col-md-12 col-lg-6 newArrivals">
	<div class="row">
		<div class="col-6">
			<P class="Na-title">New arrivals</P>
		</div>
	<div class="col-6 text-right">
	<ul class="list-inline">
		<li class="list-inline-item px-2" href="#featurewine" role="button" data-slide="prev">
		<img src="/page_assets/img/leftarrow.svg" alt="">
		</li>
		<li class="list-inline-item px-2"  href="#featurewine" role="button" data-slide="next">
			<img src="/page_assets/img/rightarrow.svg" alt="">
		</li>
	</ul>
	</div>
</div>

   @php $counter = 1; @endphp
     <!--  -->
<div class="row">
   <div class="col-12">
      <div id="featurewine" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            @foreach ($newArrivals as $key => $product)
                @if( $counter == 1 )
                  <div class="carousel-item @if($key == 0) active @endif">
                     <div class="row">
                @endif

                  <div class="col-4  col-md-4 col-lg-4  px-lg-4 mb-5 text-center relativetins ">
                     <div class="productmain">
                        <a href="/products/{{ $product->slug }}"> <img src="/product_images/{{ $product->img1 }}" class="productthumb" alt="{{ ucwords($product->product_name) }}"></a>
                        <div class="mt-2">
                           <a href="/products/{{ $product->slug }}">
                              {{-- <p class="wine_wc  mb-0">Moët & Chandon  |  Paris</p> --}}
                              <p class="wine_wc  mb-0"></p>
                              <p class="font-weight-bold mt-2 wine_wc ">{{ ucwords($product->product_name) }}</p>
                           <img src="/page_assets/img/addo2.svg" alt="" class="featurewineadd">
                           </a>
                        </div>
                     </div>
                  </div>

                @if( $counter == 3 || $key == (count($newArrivals) - 1))
                @php $counter = 0; @endphp
                     </div>
                  </div>
                @endif

                @php $counter++; @endphp
         
            @endforeach


            {{-- <div class="carousel-item">
               <div class="row">
               <div class="col-4  col-md-4 col-lg-4  px-lg-4 mb-5 text-center ">
                  <div class="productmain">
                        <a href="#"> <img src="/page_assets/img/wine1.svg" class="productthumb" alt=""></a>
                        <div class="mt-2">
                           <a href="">
                              <p class="wine_wc  mb-0">Moët & Chandon  |  Paris</p>
                              <p class="font-weight-bold mt-2 wine_wc ">Podere Castorani</p>
                            <img src="/page_assets/img/addo2.svg" alt="" class="featurewineadd">
                           </a>
                        </div>
                       
                     </div>
                  </div>
                  <div class="col-4  col-md-4 col-lg-4  px-lg-4 mb-5 text-center ">
                  <div class="productmain">
                        <a href="#"> <img src="/page_assets/img/wine1.svg" class="productthumb" alt=""></a>
                        <div class="mt-2">
                           <a href="">
                              <p class="wine_wc  mb-0">Moët & Chandon  |  Paris</p>
                              <p class="font-weight-bold mt-2 wine_wc ">Podere Castorani</p>
                            <img src="/page_assets/img/addo2.svg" alt="" class="featurewineadd">
                           </a>
                        </div>
                       
                     </div>
                  </div>
                  <div class="col-4  col-md-4 col-lg-4  px-lg-4 mb-5 text-center ">
                  <div class="productmain">
                        <a href="#"> <img src="/page_assets/img/wine1.svg" class="productthumb" alt=""></a>
                        <div class="mt-2">
                           <a href="">
                              <p class="wine_wc  mb-0">Moët & Chandon  |  Paris</p>
                              <p class="font-weight-bold mt-2 wine_wc ">Podere Castorani</p>
                            <img src="/page_assets/img/addo2.svg" alt="" class="featurewineadd">
                           </a>
                        </div>
                       
                     </div>
                  </div>
                 
               </div>
            </div> --}}
         </div>
      </div>
   </div>
</div>
<!--  -->
</div>
</div>
</div>


<!-- Our Bestsellers -->
<section class="my-5 py-5 relativetins">
	<img src="/page_assets/img/Wine2U-03.svg" class="righteffect" alt="">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-6">
				<h1 class="sign_title">Our Bestsellers </h1>
			</div>
			<div class="col-6 text-right">
				<ul class="list-inline mb-0">
					<li class="list-inline-item px-2" href="#ourbestsellers" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"><img src="/page_assets/img/leftarrow.svg" alt="">
					</li>
					<li class="list-inline-item px-2"  href="#ourbestsellers" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"><img src="/page_assets/img/rightarrow.svg" alt="">
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div id="ourbestsellers" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					@php $counter = 1; @endphp
					@foreach ($bestSales as $key => $product)
							@if( $counter == 1 )
							<div class="carousel-item @if($key == 0) active @endif">
								<div class="form-row mt-5">
							@endif
								<div class="col-6 col-md-6 col-lg-3 px-lg-3 mb-5 ">
									<div class="productmain">
										<a href="/products/{{ $product->slug }}" class="product-img"> 
											<img src="/product_images/{{ $product->img1 }}" class="productthumb as-background" alt="{{ ucwords($product->product_name) }}">
										</a>
										<div class="bd-highlight px-2 pt-2">
											<p class="mb-0 product-small prd-brand">
												{{ ucwords($product->product_name) }}
											</p>
											<div class="rating"> 
												<input type="radio" name="rating-{{ $product->id }}" value="5" id="5m-{{ $product->id }}" @if($product->avgrating == 5) checked @endif >
												<label for="5m-{{ $product->id }}">☆</label>
												<input type="radio" name="rating-{{ $product->id }}" value="4" id="4m-{{ $product->id }}" @if($product->avgrating >= 4 && $product->avgrating < 5 ) checked @endif>
												<label for="4m-{{ $product->id }}">☆</label>
												<input type="radio" name="rating-{{ $product->id }}" value="3" id="3m-{{ $product->id }}" @if($product->avgrating >= 3 && $product->avgrating < 4 ) checked @endif>
												<label for="3m-{{ $product->id }}">☆</label>
												<input type="radio" name="rating-{{ $product->id }}" value="2" id="2m-{{ $product->id }}" @if($product->avgrating >= 2 && $product->avgrating < 3) checked @endif >
												<label for="2m-{{ $product->id }}">☆</label>
												<input type="radio" name="rating-{{ $product->id }}" value="1" id="1m-{{ $product->id }}" @if($product->avgrating > 0 && $product->avgrating < 2 ) checked @endif>
												<label for="1m-{{ $product->id }}">☆</label>
											</div>
										</div>
										<div class="d-md-flex mb-2 align-items-end">
											<div class="mr-auto pl-2">
												<p class="product-small mb-0">Paris</p>
												<a href="/products/{{ $product->slug }}" class="font-weight-bold">{{ ucwords($product->product_name) }}</a> 
											</div>
											<div class="px-2 font-weight-bold">
												<a href="/products/{{ $product->slug }}" class="product-price">GhS {{ $product->base_price}} </a>
											</div>
										</div>
										{{-- <img src="/page_assets/img/addp.svg" alt=""> --}}
									</div>
								</div>
									
							@if( $counter == 4 || $key == (count($bestSales) - 1))
							@php $counter = 0; @endphp
								<div class="col-12 text-center my-4">
									<a href="/products" class="btn btn-wine3up px-4">Browse more wine</a>
								</div>
								</div>
								</div>
							@endif
			
							@php $counter++; @endphp
				
					@endforeach
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<!-- Our Bestsellers -->


<!-- Exclusive range  of winery -->
<section class="exclusive centerit">
 	<div class="container">
		<div class="row ">
			<div class="col-12 col-md-6">
				<h1>Exclusive range  <br> of winery</h1>
				<p class="wine_wc">Enjoy collections of exclusive fine wines and spirits from all around the world. Italy to South Africa, we’ve got a wine for you.</p>
			</div>
		</div>
   	</div>
</section>
<!-- Exclusive range  of winery -->


<!-- italy finest  -->
<section class="my-5 py-5">
	<div class="container">
      	<div class="row align-items-center">
			<div class="col-6">
				<h1 class="sign_title">Top Rated Products </h1>
			</div>
			<div class="col-6 text-right">
				<ul class="list-inline mb-0">
					<li class="list-inline-item px-2" href="#italy_finest" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"><img src="/page_assets/img/leftarrow.svg" alt="">
					</li>
					<li class="list-inline-item px-2"  href="#italy_finest" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"><img src="/page_assets/img/rightarrow.svg" alt="">
					</li>
				</ul>
			</div>
      	</div>
      	<div class="row">
         <div class="col-12">
            <div id="italy_finest" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  @php $counter = 1; @endphp
                  @foreach ($topRatedProducts as $key => $product)
                  @if( $counter == 1 )
                  <div class="carousel-item @if($key == 0) active @endif">
                     <div class="form-row mt-5">
                  @endif
                        <div class="col-6 col-md-6 col-lg-3 px-lg-3 mb-5 ">
                           	<div class="productmain">
							  	<a href="/products/{{ $product->slug }}" class="product-img"> 
								  <img src="/product_images/{{ $product->img1 }}" class="w-100 as-background" alt="">
								</a>
                              	{{-- <a href="/products/{{ $product->slug }}"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a> --}}
                              	<div class="bd-highlight px-2 pt-2">
									<p class="mb-0 product-small prd-brand">
										{{ ucwords($product->product_name) }}
									</p>
									<div class="rating"> 
										<input type="radio" name="rating-{{ $product->id }}" value="5" id="5-{{ $product->id }}" @if($product->rating == 5) checked @endif >
										<label for="5-{{ $product->id }}">☆</label>
										<input type="radio" name="rating-{{ $product->id }}" value="4" id="4-{{ $product->id }}" @if($product->total >= 4 && $product->total < 5 ) checked @endif>
										<label for="4-{{ $product->id }}">☆</label>
										<input type="radio" name="rating-{{ $product->id }}" value="3" id="3-{{ $product->id }}" @if($product->total >= 3 && $product->total < 4 ) checked @endif>
										<label for="3-{{ $product->id }}">☆</label>
										<input type="radio" name="rating-{{ $product->id }}" value="2" id="2-{{ $product->id }}" @if($product->total >= 2 && $product->total < 3) checked @endif >
										<label for="2-{{ $product->id }}">☆</label>
										<input type="radio" name="rating-{{ $product->id }}" value="1" id="1-{{ $product->id }}" @if($product->total > 0 && $product->total < 2 ) checked @endif>
										<label for="1-{{ $product->id }}">☆</label>
									</div>
                              	</div>
                              	<div class="d-md-flex mb-2 align-items-end">
									<div class="mr-auto pl-2">
										<p class="product-small mb-0">Paris</p>
										<a href="/products/{{ $product->slug }}" class="font-weight-bold">{{ ucwords($product->product_name) }}</a> 
									</div>
									<div class="px-2 font-weight-bold">
										<a href="/products/{{ $product->slug }}" class="product-price">GhS {{ $product->base_price}} </a>
									</div>
                              	</div>
                           	</div>
                        </div>

                        @if( $counter == 4 || $key == (count($topRatedProducts) - 1))
                        @php $counter = 0; @endphp
                              <div class="col-12 text-center my-4">
                                 <a href="/products" class="btn btn-wine3up px-4">Browse more wine</a>
                              </div>
                              </div>
                           </div>
                        @endif
         
                        @php $counter++; @endphp
                    @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- italy finest  -->


<!-- wine slide -->
<section  class="productgreenline">
    <div class="container">
    	<div class="row">
      		<div class="col-12">
       			<div class="owl-carousel  owl-wineslide owl-theme">
					@foreach ($featuredProducts as $product)
						<div class="item">
							<div class="row centerit mb-md-5">
								<div class="col-12 col-md-12 col-lg-4 text-center mb-4">
									<img src="/page_assets/img/linnegrape.svg" alt="" class="mini-img">
									<p class="text-uppercase my-3  wine2upc">Trending Winery</p>
									<h1 class="wineslide">{{ ucwords($product->product_name) }}</h1>
									<img src="/page_assets/img/winelinedash.svg" alt="{{ ucwords($product->product_name) }}" class="mini-img">
								</div>
								<div class="col-12 col-md-6 col-lg-4 mb-4">
									<div class="wine-img">
										<img src="/product_images/{{ $product->img1 }}" class="as-background" alt="{{ ucwords($product->product_name) }}">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4 mb-4">
									<p class="wine_wc"> {{ ucfirst( strwords($product->description, 150)) }} </p>
									<p class="text-uppercase mt-3 mb-0  wine2upc font-weight-bold">GHS {{ number_format($product->base_price,2)}}</p>
								</div>
							</div>
						</div>
					@endforeach
       
					{{-- <div class="item">
					<div class="row centerit">
						<div class="col-12 col-md-12 col-lg-4 text-center ">
						<img src="/page_assets/img/linnegrape.svg" alt="">

						<p class="text-uppercase my-3  wine2upc">Trending Winery</p>

						<h1 class="wineslide">Another Slide <br>   Wine</h1>

						<img src="/page_assets/img/winelinedash.svg" alt="">
						
						</div>

						<div class="col-12 col-md-6 col-lg-4 ">
						<img src="/page_assets/img/wine3.svg" class="w-75" alt="">
						</div>

						<div class="col-12 col-md-6 col-lg-4">
						<p class="wine_wc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dui vel amet nunc lectus nullam sed nisl scelerisque at. Faucibus vivamus libero viverra ipsum, ut in amet.</p>
						<p class="text-uppercase my-3  wine2upc font-weight-bold">$230.00</p>
						</div>
						</div>
					</div>
					--}}
      		</div>
    	</div>
  	</div>
</section>
<!-- wine slide -->


<section class="my-5 py-5">
   	<div class="container">
      	<div class="row align-items-center">
         	<div class="col-6">
            	<h1 class="sign_title">Champagne</h1>
         	</div>
         	<div class="col-6 text-right">
				<ul class="list-inline mb-0">
					<li class="list-inline-item px-2" href="#GreateWithSalads" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true">
						<img src="/page_assets/img/leftarrow.svg" alt="">
					</li>
					<li class="list-inline-item px-2"  href="#GreateWithSalads" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true">
						<img src="/page_assets/img/rightarrow.svg" alt="">
					</li>
				</ul>
         	</div>
      	</div>
      	<div class="row">
        	<div class="col-12">
            	<div id="GreateWithSalads" class="carousel slide" data-ride="carousel">
               		<div class="carousel-inner">
                  		@php $counter = 1; @endphp
                  		@foreach ($featuredCategory as $key => $product)
                        	@if( $counter == 1 )
                        		<div class="carousel-item @if($key == 0) active @endif">
                           			<div class="form-row  mt-5">
                        	@endif
                              	<div class="col-6 col-md-6 col-lg-3 px-lg-3 mb-5">
                                	<div class="productmain">
										<a href="/products/{{ $product->slug }}" class="product-img"> 
											<img src="/product_images/{{ $product->img1 }}" class="productthumb as-background" alt="{{ ucwords($product->product_name) }}">
										</a>
										<div class="bd-highlight px-2 pt-2">
											<p class="mb-0 product-small prd-brand">
												{{ ucwords($product->product_name) }}
											</p>
											<div class="rating"> 
												<input type="radio" name="rating-{{ $product->id }}" value="5" id="5m-{{ $product->id }}" @if($product->avgrating == 5) checked @endif >
												<label for="5m-{{ $product->id }}">☆</label>
												<input type="radio" name="rating-{{ $product->id }}" value="4" id="4m-{{ $product->id }}" @if($product->avgrating >= 4 && $product->avgrating < 5 ) checked @endif>
												<label for="4m-{{ $product->id }}">☆</label>
												<input type="radio" name="rating-{{ $product->id }}" value="3" id="3m-{{ $product->id }}" @if($product->avgrating >= 3 && $product->avgrating < 4 ) checked @endif>
												<label for="3m-{{ $product->id }}">☆</label>
												<input type="radio" name="rating-{{ $product->id }}" value="2" id="2m-{{ $product->id }}" @if($product->avgrating >= 2 && $product->avgrating < 3) checked @endif >
												<label for="2m-{{ $product->id }}">☆</label>
												<input type="radio" name="rating-{{ $product->id }}" value="1" id="1m-{{ $product->id }}" @if($product->avgrating > 0 && $product->avgrating < 2 ) checked @endif>
												<label for="1m-{{ $product->id }}">☆</label>
											</div>
										</div>
										<div class="d-md-flex mb-2 align-items-end">
											<div class="mr-auto pl-2">
												<p class="product-small mb-0">Paris</p>
												<a href="/products/{{ $product->slug }}" class="font-weight-bold">
													{{ ucwords($product->product_name) }}
												</a> 
											</div>
											<div class="px-2 font-weight-bold">
												<a href="/products/{{ $product->slug }}" class="product-price">GhS {{ $product->base_price}} </a>
											</div>
										</div>
                                    	{{-- <img src="/page_assets/img/addp.svg" alt=""> --}}
                                 	</div>
                              	</div>
                        	@if( $counter == 4 || $key == (count($bestSales) - 1))
                        		@php $counter = 0; @endphp
								<div class="col-12 text-center my-4">
									<a href="/products" class="btn btn-wine3up px-4">Browse more wine</a>
								</div>
								</div>
                           		</div>
                        	@endif
                        	@php $counter++; @endphp
                  		@endforeach
             		</div>
            	</div>
         	</div>
      	</div>
   	</div>
</section>
<!-- Great With Salads -->


<!--Who we are  -->
<section class="whoweare">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-7 px-0 py-0 h-100 order-md-2">
				<img src="/page_assets/img/house.jpg" class="img-fluid px-0 py-0  blackhome2" alt="">
			</div>
			<div class="col-12 col-md-5 text-center blackhome py-5 centerit order-md-1">
				<div class="">
					<img src="/page_assets/img/grapewineandglass.svg" alt="">

					<p class="text-uppercase my-3  wine2upc">WHO  ARE WE</p>
					<p>At Wine2u, we seek to inspire a passion for fine wine and alcoholic beverages. By offering a dynamic portfolio and a robust platform. Our team of dedicated sommeliers strive to be the best partner to our suppliers and customers by providing the finest wines from around the world. </p>
					<a href="#category.php" class="btn btn-wine2u px-4">Learn More</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Who we are  -->


<section class="productgreenline relativetins">
	<img src="/page_assets/img/grape.png" class="img-fluid grape  d-none d-md-none d-lg-block d-xl-block " alt="">
    <img src="/page_assets/img/bottle.png" class="img-fluid bottle d-none d-md-none d-lg-block d-xl-block" alt="">
    <img src="/page_assets/img/Wine2U.svg" class="lefteffect " alt="">
    <div class="container">
    	<div class="row">
			<div class="col-12 col-lg-9 mx-auto">
				<div class="row">
					<div class="col-6 col-md-6 col-lg-6 mb-5 px-md-5">
						<img src="/page_assets/img/wineandglass.svg" alt="">
						<p class="wine_wc mt-4">Shop at the world’s largest wine  market place with exclusive wine</p>
					</div>
					<div class="col-6 col-md-6 col-lg-6 mb-5 px-md-5">
						<img src="/page_assets/img/call.svg" alt="">
						<p class="wine_wc mt-4">We support our customers to the last  mile. We are here to help</p>
					</div>
					<div class="col-6 col-md-6 col-lg-6 mb-5 px-md-5">
						<img src="/page_assets/img/delivery.svg" alt="">
						<p class="wine_wc mt-4">Carefully and efficiently delivering your orders right to your doorsteps</p>
					</div>
					<div class="col-6 col-md-6 col-lg-6 mb-5 px-md-5">
						<img src="/page_assets/img/ratings.svg" alt="">
						<p class="wine_wc mt-4">Check honest and professional review of any wine before you buy</p>
					</div>
        		</div>
      		</div>
      	</div>
      	<div class="row mt-4">
        	<div class="col-12 text-center">
          		<h3 class="wineproh1 ">All Exclusive  wine at your finger tips</h3>
          
          		<div class="col-12 text-center  mt-5">
            		<h4 class="wine_wc">  <strong>Download our Mobile App</strong></h4>
            		<p class="wine_wc">It's the fastest way to search for  the best wine and make a purchase</p>
          		</div>

          		<div class="col-12 mt-5">
          			<ul class="list-inline download-li">
            			<li class="list-inline-item my-4">
              				<a href="#" class="btn btn-bb1 width-290 text-center">
								<img src="/page_assets/img/apple.svg" alt="">
								Download from Apple Store
							</a>
            			</li>
            			<li class="list-inline-item">
            				<a href="#" class="btn btn-bb2 width-290 text-center">
								<img src="/page_assets/img/playstore.svg" alt=""> 
								Download from Playstore
							</a>
            			</li>
         			</ul>
          		</div>
        	</div>
      	</div>
    </div>
</section>


<!-- footer includes -->
  @include("pages.includes.footer")
  @include("pages.includes.footer-links")
 <!-- footer includes -->

  </body>
</html>