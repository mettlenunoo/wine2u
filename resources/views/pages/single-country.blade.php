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
                  <div class=" ">
                    @if($country->type == "Country")

                      <p class="wine_wc"> {{ $country->name }} <span class="px-3"></p>
                      <h4 class="f_titile"><span><img src="/page_assets/img/ghanaflag.png" class="userside_blog" alt=""></span> {{ $country->name }}</h4>

                    @else

                      <p class="wine_wc">{{ $country->name }}<span class="px-3">|</span> <a href="/country/{{ $country->countryRegion->slug }}" style="color:#fff"> {{ $country->countryRegion->name }}</a> </p>
                      <h4 class="f_titile"><span><img src="/country/{{ $country->countryRegion->flag }}" class="userside_blog" alt=""></span> {{ $country->name }}</h4>

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
         <div class="col-12 ">
           <h1  class="sign_title">Top rated wines from {{ $country->name }}</h1>
         </div>
       </div>

       <div class="row my-5">
        @foreach ($topRatedProducts as $key => $product)

        <div class="col-12  col-md-6 col-lg-3  px-lg-3 mb-5 ">
          <div class="productmain">
             <a href="/products/{{ $product->slug }}"> <img src="/product_images/{{ $product->img1 }}" class="w-100" alt="{{ ucwords($product->product_name) }}"></a>
             {{-- <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a> --}}
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">{{ number_format($product->total,1) }}</div>
                <div class="p-2 bd-highlight  ">
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

                   {{-- <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> --}}
                   </div>
                </div>
             </div>
             <div class="d-flex bd-highlight">
                <div class="mr-auto pl-2 bd-highlight  font-weight-bold">
                   <a href="/products/{{ $product->slug }}">{{ ucwords($product->product_name) }}</a> 
                </div>
                <div class="pl-2 bd-highlight  font-weight-bold ">
                   <a href="/products/{{ $product->slug }}" class="product-price">GHS {{ number_format($product->base_price,2) }}</a>
                </div>
             </div>
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