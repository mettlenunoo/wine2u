<!doctype html>
<html lang="en">

<head>
    <title>Wine2u | {{ ucwords($product->product_name) }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />



    <!-- include navigation -->
    @include("pages.includes.nav-links")
    @include("pages.includes.navigation")
    <!-- include navigation -->

    <section class="top_titile_bk  centerit relativetins">
        <div class="container ">
            <div class="row ">
                <div class="col-12 text-center">
                    <h1 class="sign_title wine2upc"> {{ ucwords($product->product_name) }} </h1>
                    @php
                    $tags = explode(",",$product->tag);
                    @endphp
                    <p class="wine2upc ">
                        <span class="font-weight-light">|</span>
                        @if(!empty($tags))

                        @foreach ($tags as $tag)
                        <span class="mx-1 font-weight-light">{{ ucwords($tag) }}</span> |
                        @endforeach

                        @endif
                    </p>
                </div>
            </div>
            <img src="/page_assets/img/Wine2Utopb.svg" class="lefteffecttop" alt="">
        </div>
    </section>
    <!-- product and add -->
    <section class="my-5">
        <div class="container">
            <div class="row">
                <!-- left side -->
                <div class="col-12 col-md-5 col-lg-5 col-xl-4 mb-4">
                    <div class="product-img bord-rad-0">
                        <img src="/product_images/{{$product->img1}}" class="as-background"
                            alt="{{ ucwords($product->product_name) }}">
                    </div>
                </div>
                <!-- left side -->
                <!-- right side -->
                <div class="col-12 col-md-7 col-lg-7 col-xl-8 pl-lg-5 mb-4">
                    @foreach ($product->countryRegion as $region)
                    <p class="mb-1"> <a href="/country/{{ $region->slug }}">{{ ucwords($region->name) }}</a>
                        <span>|</span>
                        @foreach ($region->countryFrRegion as $country)
                        <a href="/country/{{ $country->slug }}">{{ ucwords($country->name) }}</a>
                        @endforeach
                    </p>
                    @endforeach

                    

                    <h3 class="font-weight-light mt-2">{{ ucwords($product->product_name) }}</h3>
                    <ul class="list-inline single-prd mt-2">
                        <li class="list-inline-item">{{ $product->review_summary->average_rating }}</li>
                        <li class="list-inline-item">
                            <div class="rating">

                                <input type="radio" name="rating-{{ $product->id }}" value="5" id="5-{{ $product->id }}"
                                    @if($product->review_summary->average_rating == 5) checked @endif >
                                <label for="5-{{ $product->id }}">☆</label>
                                <input type="radio" name="rating-{{ $product->id }}" value="4" id="4-{{ $product->id }}"
                                    @if($product->review_summary->average_rating >= 4 &&
                                $product->review_summary->average_rating < 5 ) checked @endif>
                                    <label for="4-{{ $product->id }}">☆</label>
                                    <input type="radio" name="rating-{{ $product->id }}" value="3"
                                        id="3-{{ $product->id }}" @if($product->review_summary->average_rating >= 3 &&
                                    $product->review_summary->average_rating < 4) checked @endif>
                                        <label for="3-{{ $product->id }}">☆</label>
                                        <input type="radio" name="rating-{{ $product->id }}" value="2"
                                            id="2-{{ $product->id }}" @if($product->review_summary->average_rating >= 2
                                        && $product->review_summary->average_rating < 3) checked @endif>
                                            <label for="2-{{ $product->id }}">☆</label>
                                            <input type="radio" name="rating-{{ $product->id }}" value="1"
                                                id="1-{{ $product->id }}" @if($product->review_summary->average_rating >
                                            0 && $product->review_summary->average_rating < 2) checked @endif>
                                                <label for="1-{{ $product->id }}">☆</label>

                            </div>
                        </li>

                        <li class="list-inline-item">
                            @if($product->review_summary->total_rating > 1)
                            ({{ $product->review_summary->total_user }} ratings)
                            @else
                            ({{ $product->review_summary->total_user }} rating)
                            @endif
                        </li>
                    </ul>
                    {{-- <a href="#" class="btn btn-wine3up px-5"><img src="/page_assets/img/comparrow.svg" alt=""> Compare</a> --}}
                    <h3 class="wine2upc my-4" id="price_section">
                        GHS {{ number_format($product->base_price,2) }}
                    </h3>

                    <div class="row">
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-dark-product" id="minus-btn"><i
                                            class="fa fa-minus"></i></button>
                                </div>

                                <input type="number" id="qty_input" class="form-control form-prod text-center" value="1"
                                    min="1" max="{{ $product->variableProductAttributes[0]->quantity }}">
                                <input type="hidden" value="{{ $product->variableProductAttributes[0]->id }}"
                                    id="vproductId">
                                <div class="input-group-prepend">
                                    <button class="btn btn-dark-product2" id="plus-btn"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-5">

                            {{--<select class="form-control form-prod text-center single-prd-sel"  onchange="getval(this);" >
                     @foreach ($product->variableProductAttributes as $att)
                        <option value="{{ $att->id }}"> {{ $att->attribute->title }} </option>
                            @endforeach

                            </select>--}}
                            <button type="submit" class="btn btn-prod btn-block" onclick="addToCart()" id="addbtn">Add
                                to Cart</button>
                        </div>

                        @if(auth('customer')->user())
                        <div class="col-2 col-md-2 col-lg-2">

                            <button class="btn btn-prod2 px-4 wishlist" @if(count($wishList)==1)
                                style="background:rgb(228 196 156)" @endif><img
                                    src="/page_assets/img/bx_bx-bookmark-plus.svg" alt=""></button>
                            <input type="hidden" value="{{ count($wishList) }}" class="wishlistproduct">


                        </div>
                        @endif

                        <input type="hidden" value="{{ $product->id }}" class="product_id">

                    </div>

                    {{--<div class="row">
             
               <div class="col-12 col-md-12 col-lg-9">
                  <button type="submit" class="btn btn-prod btn-block" onclick="addToCart()" id="addbtn">Add to Cart</button>
               </div>
               
            </div>--}}

                    <!-- award -->
                    {{-- <div class="row">
               <div class="col-12 my-3">
                  <h5> Awards </h5>
                  <ul class="list-inline">
                     <li class="list-inline-item pill-wine2 mb-2"><img src="/page_assets/img/awardicon.svg" class="award-pushl" alt=""> Best Wine Awards</li>
                     <li class="list-inline-item pill-wine2 mb-2"><img src="/page_assets/img/awardicon.svg" class="award-pushl" alt=""> 2nd Best Tasting Award</li>
                  </ul>
               </div>
            </div> --}}
                    <!-- award -->
                    <!-- award -->
                    <div class="row">
                        <div class="col-12 mb-3 mt-3">
                            <h5>Description </h5>
                            <ul class="list-inline">
                                @if(!empty($tags))

                                @foreach ($tags as $tag)
                                <li class="list-inline-item pill-wine2 mb-2 font-weight-light"> {{ ucwords($tag) }}
                                </li>
                                @endforeach

                                @endif
                                {{-- <li class="list-inline-item pill-wine2 mb-2">2019</li>
                     <li class="list-inline-item pill-wine2 mb-2">Red</li>
                     <li class="list-inline-item pill-wine2 mb-2">Grape type</li>
                     <li class="list-inline-item pill-wine2 mb-2">Aroma</li> --}}

                                <p class="mt-4"> {!! ucfirst($product->short_description) !!} </p>
                            </ul>
                        </div>
                    </div>
                    <!-- award -->
                </div>
                <!-- right side -->
            </div>
        </div>
    </section>
    <!-- product and add -->
    <!-- Characteristics and Taste Notes -->
    <section class="wine-2uprob ">
        <div class="container-fluid container-w2u">
            <div class="row">
                <div class="col-12 col-md-6 pr-md-5 mb-4">
                    <div class="row">
                        <div class="col-6">
                            <h5>Reviews </h5>
                        </div>
                        @if(auth('customer')->user())
                        <div class="col-6 text-right">
                            <li class="list-inline-item pill-review mb-2 pointer" data-toggle="modal"
                                data-target="#reviewModal"> Add Review</li>
                        </div>
                        @endif
                    </div>
                    <div class="row d-flex align-items-center justify-content-center my-4 pb-4">
                        <div class="col-md-4 total-stars mb-3 mb-md-0">
                            <div id="container"></div>
                        </div>
                        {{-- chart value --}}

                        <input type="hidden" value="{{ $product->ReviewSummary->average_rating }}" id="average-rate">
                        <div class="col-md-8">
                            <div class="progress-reviews d-flex align-items-center mb-2">
                                <label for="5star" class="mb-0 mr-2 star-label">5 Stars:</label>
                                <progress id="5star" max="100"
                                    value="{{ rateCalculator($product->ReviewSummary->five_stars, $product->ReviewSummary->total_user) }}">
                                    {{ rateCalculator($product->ReviewSummary->five_stars, $product->ReviewSummary->total_user) }}%
                                </progress>
                                <!--VALUE SHOULD BE EQUAL TO AMOUNT OF STARS -->
                            </div>
                            <div class="progress-reviews d-flex align-items-center mb-2">
                                <label for="4star" class="mb-0 mr-2 star-label">4 Stars:</label>
                                <progress id="4star" max="100"
                                    value=" {{ rateCalculator($product->ReviewSummary->four_stars, $product->ReviewSummary->total_user)  }} ">
                                    {{ rateCalculator($product->ReviewSummary->four_stars, $product->ReviewSummary->total_user) }}%
                                </progress>
                            </div>
                            <div class="progress-reviews d-flex align-items-center mb-2">
                                <label for="3star" class="mb-0 mr-2 star-label">3 Stars:</label>
                                <progress id="3star" max="100"
                                    value="{{ rateCalculator($product->ReviewSummary->three_stars, $product->ReviewSummary->total_user) }}">
                                    {{ rateCalculator($product->ReviewSummary->three_stars, $product->ReviewSummary->total_user) }}
                                    % </progress>
                            </div>
                            <div class="progress-reviews d-flex align-items-center mb-2">
                                <label for="2star" class="mb-0 mr-2 star-label">2 Stars:</label>
                                <progress id="2star" max="100"
                                    value="{{ rateCalculator($product->ReviewSummary->two_stars, $product->ReviewSummary->total_user) }}">
                                    {{ rateCalculator($product->ReviewSummary->two_stars, $product->ReviewSummary->total_user) }}%
                                </progress>
                            </div>
                            <div class="progress-reviews d-flex align-items-center mb-2">
                                <label for="1star" class="mb-0 mr-2 star-label">1 Star:</label>
                                <progress id="1star" max="100"
                                    value="{{ rateCalculator($product->ReviewSummary->one_star, $product->ReviewSummary->total_user) }}">
                                    {{ rateCalculator($product->ReviewSummary->one_star, $product->ReviewSummary->total_user) }}%
                                </progress>
                            </div>
                        </div>
                    </div>
                    <!--</div>-->

                    <div class="col-12">
                        <div class="row view_review"></div>
                    </div>

                    <div class="col-12 text-center view_review_btn"></div>



                    <!--<div class="col-12 col-md-6 pr-md-5 mb-4">-->



                    {{-- <div class="row centerit mb-3">
               <div class="col-9">
                  <div class="media centerit">
                     <img src="/page_assets/img/review2.png" class=" reviewimage" alt="...">
                     <div class="media-body pl-2">
                        <p class="mb-0"><strong>John Doe</strong> </p>
                        <ul class="list-inline">
                           <li class="list-inline-item">3.4</li>
                           <li class="list-inline-item">
                              <div class="rating"> 
                                 <input type="radio" name="ratingl5" value="5" id="ratingl5"><label for="ratingl5">☆</label> 
                                 <input type="radio" name="ratingl4" value="4" id="ratingl4"><label for="ratingl4">☆</label> 
                                 <input type="radio" name="ratingl3" value="3" id="ratingl3"><label for="ratingl3">☆</label> 
                                 <input type="radio" name="ratingl2" value="2" id="ratingl2"><label for="ratingl2">☆</label> 
                                 <input type="radio" name="ratingl1" value="1" id="ratingl1"><label for="ratingl1">☆</label>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-3 text-right">
                  1st, August, 2020
               </div>
            </div>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut diam consectetur integer sem mattis integer aliquam mauris. Purus suspendisse fermentum, nulla dignissim pretium scelerisque sed. Ultricies quis tellus amet in nisi mattis in. Sagittis ullamcorper amet sit justo ultricies.</p> --}}
                    <!-- load more -->
                    {{-- <div class="w-100 text-center my-4">
               <button type="" class="btn btn-wine2u px-5 ">Read More Reviews</button>
            </div>  --}}
                </div>

                <div class="col-12 col-md-6 pr-md-5">
                    <h5>Characteristics</h5>
                    <div class="row mt-5 ">
                        <div class="col-12 mb-3">
                            <div class="d-flex justify-content-between" for="lightBold">
                                <p>Light </p>
                                <p>Bold</p>
                            </div>
                            <input type="range" class="custom-range" min="0" max="10" value="{{ $product->light }}"
                                id="lightBold">
                        </div>
                        <div class="col-12 mb-3">
                            <div class="d-flex justify-content-between" for="SmoothTannic">
                                <p>Smooth</p>
                                <p>Tannic</p>
                            </div>
                            <input type="range" class="custom-range" min="0" max="10" value="{{ $product->smooth }}"
                                id="SmoothTannic">
                        </div>
                        <div class="col-12 mb-3">
                            <div class="d-flex justify-content-between" for="drySweet">
                                <p>Dry </p>
                                <p>Sweet</p>
                            </div>
                            <input type="range" class="custom-range" min="0" max="10" value="{{ $product->dry }}"
                                id="drySweet">
                        </div>
                        <div class="col-12 mb-3">
                            <div class="d-flex justify-content-between" for="softAcidic">
                                <p>Soft </p>
                                <p>Acidic</p>
                            </div>
                            <input type="range" class="custom-range" min="0" max="10" value="{{ $product->soft }}"
                                id="oftAcidic">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Characteristics and Taste Notes -->
    <!-- Reviews -->
    <section class="py-md-5 pb-5">
        <div class="container-fluid container-w2u">
            <div class="row pb-5">
                <div class="col-12">
                    {{-- <div class="row my-5 relativetins">
               <div class="col-12">
                  <h5>Taste Notes </h5>
               </div>
               <div class="col-12">
                  <div id="TasteNotescarouselExampleControls" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="row">
                              <div class="col-4 text-center">
                                 <img src="/page_assets/img/blackberry.svg" alt="">
                                 <p class="mt-4">Blackberry</p>
                              </div>
                              <div class="col-4 text-center">
                                 <img src="/page_assets/img/redfruit.svg" alt="">
                                 <p class="mt-4">Red Fruit</p>
                              </div>
                              <div class="col-4 text-center">
                                 <img src="/page_assets/img/oak.svg" alt="">
                                 <p class="mt-4">Oak</p>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="row">
                              <div class="col-4 text-center">
                                 <img src="/page_assets/img/blackberry.svg" alt="">
                                 <p class="mt-4">Blackberry</p>
                              </div>
                              <div class="col-4 text-center">
                                 <img src="/page_assets/img/redfruit.svg" alt="">
                                 <p class="mt-4">Red Fruit</p>
                              </div>
                              <div class="col-4 text-center">
                                 <img src="/page_assets/img/oak.svg" alt="">
                                 <p class="mt-4">Oak</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-12 prodslidearrow">
                  <ul class="list-inline d-flex justify-content-between">
                     <li class="list-inline-item px-2"><img src="/page_assets/img/leftarrow.svg" alt="" href="#TasteNotescarouselExampleControls" data-slide="prev" ></li>
                     <li class="list-inline-item px-2"><img src="/page_assets/img/rightarrow.svg" alt="" href="#TasteNotescarouselExampleControls" data-slide="next"></li>
                  </ul>
               </div>
            </div> --}}
                    @php $num = 0 @endphp
                    @if(count($product->pairing) > 0)
                    <div class="row my-5 relativetins">
                        <div class="col-12 mb-4">
                            <h5 class="sign_title">Food Parings </h5>
                        </div>
                        <div class="col-10 mx-auto">
                            <div id="paringcarouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($product->pairing as $key => $pair)
                                    @php $num++ @endphp
                                    @if($num == 1)

                                    <div class="carousel-item @if($key == 0) active @endif">
                                        <div class="row">

                                            @endif

                                            <div class="col-4 text-center">
                                                <a href="/pairing/{{ $pair->blog_id }} ">
                                                    <img src="/images/{{ $pair->image }}"
                                                        alt="{{ ucwords($pair->title) }}" class="img-fluid">
                                                    <p class="mt-4 mb-0"> {{ ucwords($pair->title) }} </p>
                                                </a>
                                            </div>

                                            @if($num == 3 || $num == count($product->pairing))
                                            @php $num = 0 @endphp
                                        </div>
                                    </div>
                                    @endif

                                    @endforeach

                                    {{-- <div class="carousel-item">
                              <div class="row">
                                 <div class="col-4 text-center">
                                    <img src="/page_assets/img/salmon.svg" alt="" class="img-fluid">
                                    <p class="mt-4">Salmon</p>
                                 </div>
                                 <div class="col-4 text-center">
                                    <img src="/page_assets/img/redmeat.svg" alt="" class="img-fluid">
                                    <p class="mt-4">Red Fruit</p>
                                 </div>
                                 <div class="col-4 text-center">
                                    <img src="/page_assets/img/salad.svg" alt="" class="img-fluid">
                                    <p class="mt-4">Salad</p>
                                 </div>
                              </div>
                           </div> --}}

                                </div>
                            </div>
                        </div>
                        <div class="col-12 prodslidearrow">
                            <ul class="list-inline d-flex justify-content-between">
                                <li class="list-inline-item px-2"><img src="/page_assets/img/leftarrow.svg" alt=""
                                        href="#paringcarouselExampleControls" data-slide="prev"></li>
                                <li class="list-inline-item px-2"><img src="/page_assets/img/rightarrow.svg" alt=""
                                        href="#paringcarouselExampleControls" data-slide="next"></li>
                            </ul>
                        </div>
                    </div>
                    @endif

                </div>
            </div>

            <div class="row py-5">
                <div class="col-md-6 centerit mb-4 mb-md-0">
                    <div class="2col-text">
                        <h2 class="2col-text-title">Learn More</h2>
                        <p class="2col-text-desc">
                            {!! ucfirst($product->more_description) !!}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="2col-img-container-fluid">
                        <!-- <img src="/product_images/{{$product->img1}}" alt="" class="2col-img w-100"> -->
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">


                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                   
                                    <img src="/product_images/{{$product->img1}}" class="d-block w-100" alt="...">
                                </div>

                                @if($product->img2 != "")

                                    <div class="carousel-item">
                                        <img src="/product_images/{{ $product->img2 }}" class="d-block w-100" alt="...">
                                    </div>

                                @endif
                              
                               @foreach($product->gallery as $key => $image)
                                   
                                    <div class="carousel-item">
                                        <img src="/product_images/{{ $image->img }}" class="d-block w-100" alt="...">
                                    </div>

                                @endforeach

                            </div>


                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden"></span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Reviews -->
    <!-- Similar Products -->
    <section class="my-5 py-5">
        <div class="container-fluid container-w2u">
            <div class="row align-items-center">
                <div class="col-6">
                    <h1 class="sign_title mb-0">Similar Products </h1>
                </div>
                <div class="col-6 text-right">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item px-2"><img src="/page_assets/img/leftarrow.svg" alt=""></li>
                        <li class="list-inline-item px-2"><img src="/page_assets/img/rightarrow.svg" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-5">
                @foreach ($similarProducts as $similarProduct)
                <div class="col-6  col-md-6 col-lg-3 mb-5 ">
                    <div class="productmain">
                        <a href="/products/{{ $similarProduct->slug }}" class="product-img">
                            <img src="/product_images/{{ $similarProduct->img1 }}" class="as-background"
                                alt="{{ ucwords($similarProduct->product_name) }}">
                        </a>
                        {{-- <a href="#"> <img src="/page_assets/img/plus-circle.svg" class="pluscircle" width="35" alt=""></a> --}}
                        <div class="bd-highlight px-2 pt-2">
                            {{-- <div class="mr-auto p-2 bd-highlight  product-small ">{{ $similarProduct->review_summary->average_rating }}
                        </div> --}}
                        <p class="mb-0 product-small prd-brand">
                            {{ ucwords($similarProduct->product_name) }}
                        </p>
                        <div class="rating">
                            <input type="radio" name="rating-{{ $similarProduct->id }}" value="5"
                                id="5-{{ $similarProduct->id }}" @if($similarProduct->review_summary->average_rating ==
                            5) checked @endif >
                            <label for="5-{{ $similarProduct->id }}">☆</label>
                            <input type="radio" name="rating-{{ $similarProduct->id }}" value="4"
                                id="4-{{ $similarProduct->id }}" @if($similarProduct->review_summary->average_rating >=
                            4 && $similarProduct->review_summary->average_rating < 5 ) checked @endif>
                                <label for="4-{{ $similarProduct->id }}">☆</label>
                                <input type="radio" name="rating-{{ $similarProduct->id }}" value="3"
                                    id="3-{{ $similarProduct->id }}" @if($similarProduct->review_summary->average_rating
                                >= 3 && $similarProduct->review_summary->average_rating < 4) checked @endif>
                                    <label for="3-{{ $similarProduct->id }}">☆</label>
                                    <input type="radio" name="rating-{{ $similarProduct->id }}" value="2"
                                        id="2-{{ $similarProduct->id }}"
                                        @if($similarProduct->review_summary->average_rating >= 2 &&
                                    $similarProduct->review_summary->average_rating < 3) checked @endif>
                                        <label for="2-{{ $similarProduct->id }}">☆</label>
                                        <input type="radio" name="rating-{{ $similarProduct->id }}" value="1"
                                            id="1-{{ $similarProduct->id }}"
                                            @if($similarProduct->review_summary->average_rating > 0 &&
                                        $similarProduct->review_summary->average_rating < 2) checked @endif>
                                            <label for="1-{{ $similarProduct->id }}">☆</label>

                                            {{-- <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> --}}
                        </div>
                    </div>
                    <div class="d-md-flex mb-2 align-items-end">
                        <div class="mr-auto pl-2">
                            <p class="product-small mb-0">Paris</p>
                            <a href="/products/{{ $similarProduct->slug }}"
                                class="font-weight-bold">{{ ucwords($similarProduct->product_name) }}</a>
                        </div>
                        <div class="pl-2 font-weight-bold ">
                            <a href="/products/{{ $similarProduct->slug }}" class="product-price">GHS
                                {{ number_format($similarProduct->base_price,2) }}</a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
        </div>
    </section>
    <!-- Similar Products -->
    <!-- All Exclusive  wine at your finger tips -->
    <section class="productgreenline">
        <div class="container">
            <div class="row ">
                <div class="col-12 col-lg-9 mx-auto">
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-6 mb-5 px-md-5">
                            <img src="/page_assets/img/wineandglass.svg" alt="">
                            <p class="wine_wc mt-4">Shop at the world’s largest wine market place with exclusive wine
                            </p>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6 mb-5 px-md-5">
                            <img src="/page_assets/img/call.svg" alt="">
                            <p class="wine_wc mt-4">We support our customers to the last mile. We are here to help</p>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6 mb-5 px-md-5">
                            <img src="/page_assets/img/delivery.svg" alt="">
                            <p class="wine_wc mt-4">Carefully and efficiently dilvering your orders right to your
                                doorsteps</p>
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
                    <h3 class="wineproh1 ">All Exclusive wine at your finger tips</h3>
                    <div class="col-12 text-center  mt-5">
                        <h4 class="wine_wc"> <strong>Download our Mobile App</strong></h4>
                        <p class="wine_wc">It's the fastest way to search for the best wine and make
                            a purchase
                        </p>
                    </div>
                    <div class="col-12  mt-5">
                        <ul class="list-inline">
                            <li class="list-inline-item my-4">
                                <a href="#" class="btn  btn-bb1  "><img src="/page_assets/img/apple.svg" alt="">
                                    Download from Apple Store</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-bb2"><img src="/page_assets/img/playstore.svg" alt="">
                                    Download from Playstore</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <img src="/page_assets/img/grape.png" class="img-fluid grape  d-none d-md-none d-lg-block d-xl-block "
                alt="">
            <img src="/page_assets/img/bottle.png" class="img-fluid bottle d-none d-md-none d-lg-block d-xl-block"
                alt="">
            <img src="/page_assets/img/Wine2U.svg" class="lefteffect " alt="">
        </div>
    </section>
    <!-- All Exclusive  wine at your finger tips -->
    @if(auth('customer')->user())
    <!-- Modal -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class=" wine2upc" id="reviewModalLabel">Your Review</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addRate">
                    <div class="media centerit">
                        @if(auth('customer')->user()->user_profile_image == null)
                        <img src="/page_assets/img/review1.png" class=" reviewimage" alt="...">
                        @else
                        <img src="/user_pic/{{ auth('customer')->user()->user_profile_image }}" class=" reviewimage"
                            alt="{{ auth('customer')->user()->fname." ".auth('customer')->user()->lname }}">
                        @endif

                        <div class="media-body pl-2">
                            <p class="mb-0">
                                <strong>{{ auth('customer')->user()->fname." ".auth('customer')->user()->lname }}</strong>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <div class="rating">

                                        <input type="radio" name="rate" value="5" id="rating51" @if($review->rating ==
                                        5) checked @endif >
                                        <label for="rating51">☆</label>
                                        <input type="radio" name="rate" value="4" id="rating41" @if($review->rating >= 4
                                        && $review->rating < 5 ) checked @endif>
                                            <label for="rating51">☆</label>
                                            <input type="radio" name="rate" value="3" id="rating31" @if($review->rating
                                            >= 3 && $review->rating < 4) checked @endif>
                                                <label for="rating51">☆</label>
                                                <input type="radio" name="rate" value="2" id="rating21"
                                                    @if($review->rating >= 2 && $review->rating < 3) checked @endif>
                                                    <label for="rating51">☆</label>
                                                    <input type="radio" name="rate" value="1" id="rating11"
                                                        @if($review->rating > 0 && $review->rating < 2) checked @endif>
                                                        <label for="rating51">☆</label>

                                    </div>
                                    {{-- <div class="rating"> 
                           <input type="radio" name="rate" value="5" id="rating51" ><label for="rating51">☆</label> 
                           <input type="radio" name="rate" value="4" id="rating41" ><label for="rating41">☆</label> 
                           <input type="radio" name="rate" value="3" id="rating31" ><label for="rating31">☆</label> 
                           <input type="radio" name="rate" value="2" id="rating21" ><label for="rating21">☆</label> 
                           <input type="radio" name="rate" value="1" id="rating11" ><label for="rating11">☆</label>
                        </div> --}}
                                </li>
                            </ul>
                            <div id="rate_message" style="color:red"> </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <textarea class="form-control" id="rate_comment" rows="5"
                            placeholder="Say something about the wine">{{ $review->comment }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-wine2u px-5" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-wine2u-deep px-5" id="addRateBtn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endif
    <!-- add Review Modal -->



    <!-- footer includes -->
    @include("pages.includes.footer")
    @include("pages.includes.footer-links")
    <!-- footer includes -->


    <script>
        $(document).ready(function () {
            $('#qty_input').prop('disabled', true);
            $('#plus-btn').click(function () {
                $('#qty_input').val(parseInt($('#qty_input').val()) + 1);
            });
            $('#minus-btn').click(function () {
                $('#qty_input').val(parseInt($('#qty_input').val()) - 1);
                if ($('#qty_input').val() == 0) {
                    $('#qty_input').val(1);
                }

            });
        });
    </script>


    <script>
        $(document).ready(function () {


            fetch_review();


            $(document).on('click', '.pager-list', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_review(page);
            });



            function fetch_review(pn = 1) {
                $('.pager-list').html('Loading...');
                var page = pn;
                var productId = $('.product_id').val();

                $.ajax({
                    url: "/product/review",
                    method: "GET",
                    data: {
                        page: page,
                        productId: productId
                    },
                    success: function (data) {
                        // alert(data);
                        //console.log(data);
                        $('.view_review').append(data['0']);
                        $('.view_review_btn').html(data['1']);
                    }
                });
            }


            function wish_list() {
                var product = $('.wishlistproduct').val();
                if (product == 1) {

                    wishListToggle();
                    $('.wishlist').css('background', '#ffffff');
                    $('.wishlistproduct').val(0);

                } else {

                    wishListToggle()
                    $('.wishlist').css('background', 'rgb(228 196 156)');
                    $('.wishlistproduct').val(1);

                }

            }

            function wishListToggle() {

                var productId = $('.product_id').val();
                var toggle = $('.wishlistproduct').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "/wishlist",
                    method: "POST",
                    data: {
                        productId: productId,
                        toggle: toggle
                    },
                    success: function (data) {

                        console.log(data);

                    }
                });
            }




            function RatingToggle() {

                var rating = $("input[name=rate]:checked").val();
                var comment = document.getElementById("rate_comment").value
                // var comment = $("input[name=rate_comment]").val(); 
                var product_id = $('.product_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "/review/add",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        rating: rating,
                        comment: comment
                    },
                    success: function (data) {
                        if (data == "Success") {
                            swal("Submitted", "Thanks for your feedback", "success");
                            $('#reviewModal').modal('hide');
                        }

                        $('.view_review').html("");
                        fetch_review();

                        //console.log(data);

                    }
                });
            }


            $('.wishlist').click(function () {
                wish_list();
                // alert("manan");
            });



            $('#addRate').submit(function (event) {
                event.preventDefault();
                if ($(':radio:checked', this)[0]) {
                    document.getElementById("rate_message").innerHTML = "";
                    $('#addRateBtn').val("Loading...");
                    RatingToggle();

                } else {

                    document.getElementById("rate_message").innerHTML = "Please Select Your Star !";
                    return false;
                }

            });


        });
    </script>

    <!--PROGRESS BAR-->
    <script src="/page_assets/js/progressbar.js"></script>
    <script>
        var bar = new ProgressBar.Circle(container, {
            color: '#2B4036',
            // This has to be the same size as the maximum width to
            // prevent clipping
            strokeWidth: 4,
            trailWidth: 1,
            easing: 'easeInOut',
            duration: 1400,
            text: {
                autoStyleContainer: false
            },
            from: {
                color: '#aaa',
                width: 1
            },
            to: {
                color: '#2B4036',
                width: 4
            },
            // Set default step function for all animate calls
            step: function (state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);
                //Value to be displayed currently static
                var value = ((circle.value() * 10) / 2);
                if (value === 0) {

                    circle.setText('');

                } else {

                    circle.setText(value.toFixed(1));
                }

                console.log(circle.value());
            }
        });

        bar.text.style.fontFamily = "'Sopia Pro', sans-serif";
        bar.text.style.fontSize = '2rem';
        bar.text.style.fontWeight = 'bold';
        var average_rate = $('#average-rate').val();
        average_rate = (average_rate * 2) / 10;
        console.log(average_rate);

        bar.animate(average_rate); // Number from 0.0 to 1.0
    </script>
    </body>

</html>