<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Product Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <style>
  #loading
  {
   text-align:center; 
   background: url('/page_assets/img/loader.gif') no-repeat center; 
   height: 150px;
  }
  </style>

  
   <!-- include navigation -->
   @include("pages.includes.nav-links")
   @include("pages.includes.navigation")
  <!-- include navigation -->


<section class="top_titile_bk  centerit relativetins">
  <div class="container ">
    <div class="row ">
     <div class="col-12 text-center">
     <h1 class="sign_title wine2upc">Our Products</h1>
     </div>
    </div>

    <img src="/page_assets/img/Wine2Utopb.svg" class="lefteffecttop" alt="">
  </div>
</section>


<section class="my-5  py-5"> 
 <div class="container">
  <div class="row">
	@include('pages.includes.filters')

  <div class="col-12 col-md-7 col-lg-9">
    <div class="row filter_data">

      {{-- @forelse ($products as $product)
        <div class="col-12  col-md-4  px-md-4 mb-5 ">
          <div class="productmain">
			<a href="/products/{{ $product->slug }}"> 
				<img src="/product_images/{{ $product->img1 }}"  class="w-100" alt="{{ ucwords($product->product_name) }}" height="100%">
			</a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
              <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small "> {{ $product->review_summary->average_rating }} </div>
                <div class="p-2 bd-highlight  ">
                  <div class="rating"> 
                    <input type="radio" name="rating-{{ $product->id }}" value="5" id="5-{{ $product->id }}" @if($product->review_summary->average_rating == 5) checked @endif >
                    <label for="5-{{ $product->id }}">☆</label>
                    <input type="radio" name="rating-{{ $product->id }}" value="4" id="4-{{ $product->id }}" @if($product->review_summary->average_rating >= 4) checked @endif>
                    <label for="4-{{ $product->id }}">☆</label>
                    <input type="radio" name="rating-{{ $product->id }}" value="3" id="3-{{ $product->id }}" @if($product->review_summary->average_rating >= 3) checked @endif>
                    <label for="3-{{ $product->id }}">☆</label>
                    <input type="radio" name="rating-{{ $product->id }}" value="2" id="2-{{ $product->id }}" @if($product->review_summary->average_rating >= 2) checked @endif >
                    <label for="2-{{ $product->id }}">☆</label>
                    <input type="radio" name="rating-{{ $product->id }}" value="1" id="1-{{ $product->id }}" @if($product->review_summary->average_rating > 0 ) checked @endif>
                    <label for="1-{{ $product->id }}">☆</label>
                 </div>
                </div>
              </div>

              <div class="d-flex bd-highlight">
                <div class="mr-auto pl-2 bd-highlight  font-weight-bold">
                  <a href="/products/{{ $product->slug }}"> {{ ucwords($product->product_name) }}</a> </div>
                <div class="pl-2 bd-highlight  font-weight-bold ">
                  <a href="/products/{{ $product->slug }}" class="product-price">$ {{ number_format($product->base_price,2) }}  </a>
                </div>
              </div>
              </div>
        </div>
      @empty
          No product
      @endforelse --}}
      
{{-- 
       <div class="col-12  col-md-4  px-md-4 mb-5 ">
         <div class="productmain">
            <a href="#"> <img src="/page_assets/img/winepic.svg"  class="w-100" alt=""></a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">Moët & Chandon <br>Paris</div>
                <div class="p-2 bd-highlight  ">
                  <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
                </div>
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

       <div class="col-12  col-md-4  px-md-4 mb-5 ">
         <div class="productmain">
            <a href="#"> <img src="/page_assets/img/winepic.svg"  class="w-100" alt=""></a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">Moët & Chandon <br>Paris</div>
                <div class="p-2 bd-highlight  ">
                  <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
                </div>
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

       <div class="col-12  col-md-4  px-md-4 mb-5 ">
         <div class="productmain">
            <a href="#"> <img src="/page_assets/img/winepic.svg"  class="w-100" alt=""></a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">Moët & Chandon <br>Paris</div>
                <div class="p-2 bd-highlight  ">
                  <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
                </div>
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

       <div class="col-12  col-md-4  px-md-4 mb-5 ">
         <div class="productmain">
            <a href="#"> <img src="/page_assets/img/winepic.svg"  class="w-100" alt=""></a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">Moët & Chandon <br>Paris</div>
                <div class="p-2 bd-highlight  ">
                  <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
                </div>
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

       <div class="col-12  col-md-4  px-md-4 mb-5 ">
         <div class="productmain">
            <a href="#"> <img src="/page_assets/img/winepic.svg"  class="w-100" alt=""></a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">Moët & Chandon <br>Paris</div>
                <div class="p-2 bd-highlight  ">
                  <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
                </div>
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

       <div class="col-12  col-md-4  px-md-4 mb-5 ">
         <div class="productmain">
            <a href="#"> <img src="/page_assets/img/winepic.svg"  class="w-100" alt=""></a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">Moët & Chandon <br>Paris</div>
                <div class="p-2 bd-highlight  ">
                  <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
                </div>
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

       <div class="col-12  col-md-4  px-md-4 mb-5 ">
         <div class="productmain">
            <a href="#"> <img src="/page_assets/img/winepic.svg"  class="w-100" alt=""></a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">Moët & Chandon <br>Paris</div>
                <div class="p-2 bd-highlight  ">
                  <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
                </div>
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

       <div class="col-12  col-md-4  px-md-4 mb-5 ">
         <div class="productmain">
            <a href="#"> <img src="/page_assets/img/winepic.svg"  class="w-100" alt=""></a>
            <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a>
             <div class="d-flex bd-highlight ">
                <div class="mr-auto p-2 bd-highlight  product-small ">Moët & Chandon <br>Paris</div>
                <div class="p-2 bd-highlight  ">
                  <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
                </div>
              </div>

              <div class="d-flex bd-highlight">
                <div class="mr-auto pl-2 bd-highlight  font-weight-bold">
                  <a href="#">Rosé Impérial</a> </div>
                <div class="pl-2 bd-highlight  font-weight-bold ">
                  <a href="#" class="product-price">$90.00</a>
                </div>
              </div>
              </div>
       </div> --}}

       <!-- view  more -->
         {{-- <div class="col-12 text-center">
            {{  $products->links('pages.includes.paginate_style') }}
         </div> --}}
       <!-- view  more -->

      
    </div>
  </div>

  
    
  </div>
 </div>
</section>

<!-- All Exclusive  wine at your finger tips -->


<section class="productgreenline">
    <div class="container">
      <div class="row ">
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
          <p class="wine_wc mt-4">Carefully and efficiently dilvering your orders right to your doorsteps</p>
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
            <p class="wine_wc">It's the fastest way to search for  the best wine and make
a purchase</p>
          </div>

          <div class="col-12  mt-5">
          <ul class="list-inline">
            <li class="list-inline-item my-4">
              <a href="#" class="btn  btn-bb1  "><img src="/page_assets/img/apple.svg" alt=""> Download from Apple Store</a>
            </li>
            <li class="list-inline-item">
            <a href="#" class="btn btn-bb2"><img src="/page_assets/img/playstore.svg" alt=""> Download from Playstore</a>
            </li>
          </ul>
          </div>
        </div>
      </div>

      <img src="/page_assets/img/grape.png" class="img-fluid grape  d-none d-md-none d-lg-block d-xl-block " alt="">

      <img src="/page_assets/img/bottle.png" class="img-fluid bottle d-none d-md-none d-lg-block d-xl-block" alt="">

      <img src="/page_assets/img/Wine2U.svg" class="lefteffect " alt="">



    </div>
  </section>
<!-- All Exclusive  wine at your finger tips -->


<!-- footer includes -->
 @include("pages.includes.footer")
 @include("pages.includes.footer-links")
 <!-- footer includes -->

 

 <script>
  $(document).ready(function(){

 // var filter_price = $('#price_range').val();
 // var filter_light = $('#light_range').val();
 // var filter_smooth = $('#smooth_range').val();


	const filterToggle = document.getElementById("toggle-filter");
	console.log(filterToggle);

    if (filterToggle) {
        filterToggle.addEventListener("click", function () {
			const filters = document.getElementById("filter-wrapper");
            filterToggle.classList.toggle("open");
            filters.classList.toggle("open");
        });
    }

    $(document).on('click', '.pager-list', function(event){
        event.preventDefault(); 
        // var page = $(this).attr('href');
        // console.log(page);
        // alert(page);

        var page = $(this).attr('href').split('page=')[1];
        filter_data(page);
     });

  
      filter_data();
  
      function filter_data(pn = 1)
      {
          $('.filter_data').html('<div id="loading" style=""></div>');
          //var page = pn;
          // var minimum_price = $('#hidden_minimum_price').val();
          // var maximum_price = $('#hidden_maximum_price').val();
         
          var wines = get_filter('wines');
          var grapes = get_filter('grapes');
          var pairing = get_filter('pairs');
          var country = get_filter('country');
          $.ajax({
              url:"/filter_products",
              method:"GET",
              data:{page:pn, wine:wines, grapes:grapes, pairing:pairing, country:country },
              success:function(data){
               // alert(data);
                console.log(data);
              $('.filter_data').html(data);
              }
          });
      }
  
      function get_filter(class_name)
      {
          var filter = [];
          $('.'+class_name+':checked').each(function(){
              filter.push($(this).val());
          });
          return filter;
      }
  
      $('.common_selector').click(function(){
          filter_data();
      });


      // $('#price_range').change(function(){
          
      //    filter_price = $(this).val();
      //    filter_data();

      //  });


     //    $('#light_range').change(function(){
          
      //    filter_light = $(this).val();
      //    filter_data();

      //  });

      //   $('#smooth_range').change(function(){
          
      //    smooth_light = $(this).val();
       //   filter_data();

       // });

    

      // $('.wishlist').click(function(){
      //     //filter_data();
      //     alert("manan");
      // });

      $(document).on('click', '.wishlist', function(event){
        event.preventDefault(); 
      //  alert("manan");
        // var page = $(this).attr('href');
        // console.log(page);
        // alert(page);

        // var page = $(this).attr('href').split('page=')[1];
        // filter_data(page);
     });

    
      // $('#price_range').slider(
         
      //    alert("manan");
      // );
  
      // $('#price_range').slider({
      //     range:true,
      //     min:1000,
      //     max:65000,
      //     values:[1000, 65000],
      //     step:500,
      //     stop:function(event, ui)
      //     {
      //         $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
      //         $('#hidden_minimum_price').val(ui.values[0]);
      //         $('#hidden_maximum_price').val(ui.values[1]);
      //         filter_data();
      //     }
      // });
  
  });
  </script>

  </body>
</html>