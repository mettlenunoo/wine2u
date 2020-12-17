<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

   

   <!-- include navigation -->
   @include("pages.includes.nav-links")
   @include("pages.includes.searchnav")
  <!-- include navigation -->


<section class="top_titile_bka  centerit relativetins">
  <div class="container ">
    <div class="row ">
     <div class="col-12 text-center">
     <h1 class="sign_title wine2upc">
       
        @if($keyword == "")
            All Product(s) 
        @else
          {{ $keyword }}
        @endif
    
     </h1>
     </div>
    </div>

    <img src="/page_assets/img/Wine2Utopb.svg" class="lefteffecttop" alt="">
  </div>
</section>


<section class="my-5  py-5"> 
 <div class="container">
  <div class="row">


    @forelse ($products as $product)
    <div class="col-12  col-md-4  px-md-4 mb-5 ">
      <div class="productmain">
        <a href="/products/{{ $product->slug }}"> <img src="/product_images/{{ $product->img1 }}"  class="w-100" alt="{{ ucwords($product->product_name) }}" height="100%"></a>
        {{-- <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a> --}}
          <div class="d-flex bd-highlight ">
            <div class="mr-auto p-2 bd-highlight  product-small "> {{ $product->review_summary->average_rating }} </div>
            <div class="p-2 bd-highlight  ">
              <div class="rating"> 
                <input type="radio" name="rating-{{ $product->id }}" value="5" id="5-{{ $product->id }}" @if($product->review_summary->average_rating == 5) checked @endif >
                <label for="5-{{ $product->id }}">☆</label>
                <input type="radio" name="rating-{{ $product->id }}" value="4" id="4-{{ $product->id }}" @if($product->review_summary->average_rating >= 4 && $product->review_summary->average_rating < 5 ) checked @endif>
                <label for="4-{{ $product->id }}">☆</label>
                <input type="radio" name="rating-{{ $product->id }}" value="3" id="3-{{ $product->id }}" @if($product->review_summary->average_rating >= 3 && $product->review_summary->average_rating < 4 ) checked @endif>
                <label for="3-{{ $product->id }}">☆</label>
                <input type="radio" name="rating-{{ $product->id }}" value="2" id="2-{{ $product->id }}" @if($product->review_summary->average_rating >= 2 && $product->review_summary->average_rating < 3) checked @endif >
                <label for="2-{{ $product->id }}">☆</label>
                <input type="radio" name="rating-{{ $product->id }}" value="1" id="1-{{ $product->id }}" @if($product->review_summary->average_rating > 0 && $product->review_summary->average_rating < 2 ) checked @endif>
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
  @endforelse


       {{-- <div class="col-12  col-md-4  px-md-4 mb-5 ">
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
         <div class="col-12 text-center">
            {{-- <button type="submit" class="btn btn-wine2u px-5 ">View More</button> --}}
            {{  $products->links('pages.includes.paginate_style') }}
         </div>
       <!-- view  more -->
    
  </div>
 </div>
</section>


<!-- footer includes -->
  @include("pages.includes.footer")
  @include("pages.includes.footer-links")
<!-- footer includes -->

  </body>
</html>