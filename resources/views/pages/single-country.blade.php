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

       <div class="col-6  col-md-4 col-lg-3  px-md-4 mb-5 ">
         <div class="productmain">
            <a href="#"> <img src="/page_assets/img/winepic.svg" class="w-100" alt=""></a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">Moët &amp; Chandon <br>Paris</div>
                <div class="p-2 bd-highlight  ">Stars</div>
              </div>

              <div class="d-flex bd-highlight">
                <div class="mr-auto pl-2 bd-highlight  font-weight-bold">
                  <a href="#">Rosé Impérial</a> </div>
                <div class="pl-2 bd-highlight  font-weight-bold ">
                  <a href="#" class="product-price">$90.00</a>
                </div>
              </div>
              </div>
       </div>

       <div class="col-6  col-md-4 col-lg-3  px-md-4 mb-5 ">
         <div class="productmain">
            <a href="#"> <img src="/page_assets/img/winepic.svg" class="w-100" alt=""></a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">Moët &amp; Chandon <br>Paris</div>
                <div class="p-2 bd-highlight  ">Stars</div>
              </div>

              <div class="d-flex bd-highlight">
                <div class="mr-auto pl-2 bd-highlight  font-weight-bold">
                  <a href="#">Rosé Impérial</a> </div>
                <div class="pl-2 bd-highlight  font-weight-bold ">
                  <a href="#" class="product-price">$90.00</a>
                </div>
              </div>
              </div>
       </div>

         

       <div class="col-6  col-md-4 col-lg-3  px-md-4 mb-5 ">
         <div class="productmain">
            <a href="#"> <img src="/page_assets/img/winepic.svg" class="w-100" alt=""></a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">Moët &amp; Chandon <br>Paris</div>
                <div class="p-2 bd-highlight  ">Stars</div>
              </div>

              <div class="d-flex bd-highlight">
                <div class="mr-auto pl-2 bd-highlight  font-weight-bold">
                  <a href="#">Rosé Impérial</a> </div>
                <div class="pl-2 bd-highlight  font-weight-bold ">
                  <a href="#" class="product-price">$90.00</a>
                </div>
              </div>
              </div>
       </div>

         

       <div class="col-6  col-md-4 col-lg-3  px-md-4 mb-5 ">
         <div class="productmain">
            <a href="#"> <img src="/page_assets/img/winepic.svg" class="w-100" alt=""></a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">Moët &amp; Chandon <br>Paris</div>
                <div class="p-2 bd-highlight  ">Stars</div>
              </div>

              <div class="d-flex bd-highlight">
                <div class="mr-auto pl-2 bd-highlight  font-weight-bold">
                  <a href="#">Rosé Impérial</a> </div>
                <div class="pl-2 bd-highlight  font-weight-bold ">
                  <a href="#" class="product-price">$90.00</a>
                </div>
              </div>
              </div>
       </div>

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