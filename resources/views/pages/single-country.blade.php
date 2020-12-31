<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Country </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

   
   <!-- include navigation -->
   @include("pages.includes.nav-links")
   @include("pages.includes.navigation")
  <!-- include navigation -->

  <section class="spaceup">
     <div class="container-fluid">
       <div class="row">
         <div class="col-12 px-0">
           <div class="winecountry ">
             <img src="/country/{{ $country->banner }}" class="vasimg"> 
             <div class="overlay-light-black"></div>
               <div class="row">
                 <div class="col-12 col-md-9 mx-auto ss">
                  <div class="">
                    @if($country->type == "Country")
                      <p class="f-sub-title"> {{ $country->name }} <span class="px-3"></p>
                      <h4 class="f-title">
						<img src="/page_assets/img/ghanaflag.png" class="" alt="">
						{{ $country->name }}
					  </h4>
                    @else
                      <p class="f-sub-title">{{ $country->name }}<span class="px-3">|</span> <a href="/country/{{ $country->countryRegion->slug }}" style="color:#fff"> {{ $country->countryRegion->name }}</a> </p>
                      <h4 class="f-title">
						  <img src="/country/{{ $country->countryRegion->flag }}" class="" alt=""> 
						  {{ $country->name }}
					  </h4>
                    @endif
                  </div>
                 </div>
               </div>
            </div>
         </div>
       </div>
     </div>
   </section>


<!-- content -->
 <section class="my-5">
   <div class="container pt-5">
     <div class="row">
         <div class="col-12 col-md-9  mx-auto">
            {!! $country->content !!}
         </div>
     </div>
   </div>
 </section>
<!-- content -->



<!-- Top rated wines from region -->
   <section class="my-5">
     <div class="container pt-5">
       <div class="row">
         <div class="col-12">
           <h5 class="fw-bold font-libre">Top rated wines from {{ $country->name }}</h5>
         </div>
       </div>

       <div class="row my-5">
			@foreach ($topRatedProducts as $key => $product)
				<div class="col-6 col-md-4 col-lg-3 mb-4">
					<div class="productmain">
						<a href="/products/{{ $product->slug }}" class="product-img"> 
							<img src="/product_images/{{ $product->img1 }}" class="productthumb as-background" alt="{{ ucwords($product->product_name) }}">
						</a>
						<div class="bd-highlight px-2 pt-2">
							<p class="mb-0 product-small prd-brand">
								{{ ucwords($product->product_name) }}
							</p>
							<div class="rating"> 
								<input type="radio" name="rating-{{ $product->id }}" value="5" id="5-{{ $product->id }}" @if($product->total == 5) checked @endif >
								<label for="5-{{ $product->id }}">☆</label>
								<input type="radio" name="rating-{{ $product->id }}" value="4" id="4-{{ $product->id }}" @if($product->total >= 4 && $product->total < 5  ) checked @endif>
								<label for="4-{{ $product->id }}">☆</label>
								<input type="radio" name="rating-{{ $product->id }}" value="3" id="3-{{ $product->id }}" @if($product->total >= 3 && $product->total < 4) checked @endif>
								<label for="3-{{ $product->id }}">☆</label>
								<input type="radio" name="rating-{{ $product->id }}" value="2" id="2-{{ $product->id }}" @if($product->total >= 2 && $product->total < 3) checked @endif >
								<label for="2-{{ $product->id }}">☆</label>
								<input type="radio" name="rating-{{ $product->id }}" value="1" id="1-{{ $product->id }}" @if($product->total > 0  && $product->total < 2) checked @endif>
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
						{{-- <img src="/page_assets/img/addp.svg" alt=""> --}}
					</div>
				</div>
			@endforeach
       </div>
     </div>
   </section>
<!-- Top rated wines from region -->

  <!-- footer includes -->
    @include("pages.includes.footer")
    @include("pages.includes.footer-links")
  <!-- footer includes -->
  </body>
</html>