<!DOCTYPE html>
<html lang="en">
	<head>

		<title>Haute Vie - <?= ucwords($activeCategory->title); ?></title>

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

    
    <style type="text/css">

      .out-of-stock {

        position: absolute;

        width: 100%;

        height: 100%;

        background: rgba(255,255,255,.7);

        z-index: 1;
        top: 0;
        border: 1px solid #e3e3e3;

      }



      .out-of-stock h4 {

        margin: 0px;

        padding: 15px;

        background: #e3e3e3;

        margin-top: 150px;

        text-align: center;

        font-weight: 600;

      }



      .third-section .panel {

        position: relative;

      }

    </style>


	</head>
    
     <body>

      @include('frontend.inc.header')



    @if(empty($selectCategory->image))

      <div class="top-section" style="background-image: url(img/default_img.jpg);" >

    @else

     <div class="top-section" style="background-image: url(/images/{{ $selectCategory->image }});" >
      
    @endif


      <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-2 text-center" style="color:#ffffff;">
               
                   <h3>{{ strtoupper($selectCategory->title)   }}</h3>
                   <p>{{ strtoupper($selectCategory->content) }} </p>
                   <br>

          </div>
        </div>
      </div>

    </div>


    <div class="third-section accordion-styles">

      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-3 col-sm-4 hidden-xs">
            <div class="panel-group accordion-head" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title clearfix">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                <h6>
                                  <i class="material-icons">&#xE313;</i> 
                                  {{ strtoupper($activeCategory->title)   }}
                                </h6>
                            </a>
                        </h4>
                    </div>

                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">
                          
                            <ul class="clothes">

                                @foreach ($activeCategory->subCategories as  $subCategory)
                                  <li @if($selectCategory->id == $subCategory->id ) class="active"  @endif>
                                    <a href="/{{ strtolower($shop->country) }}/store/{{ strtolower($activeCategory->slug) }}/{{ strtolower($subCategory->slug) }}">
                                      <p>{{ ucwords($subCategory->title) }}</p>
                                    </a>
                                  </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
         </div>

          <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">

            <div class="row">

              <div class="col-lg-12 clearfix" style="margin-bottom: 20px;">

                <div class="dropdown pull-left contains-button" style="padding-right: 5px;">

                    <button id="dropdownMenuButton" data-toggle="dropdown" class="fav-btn">

                      <div class="clearfix">
                      
                        <span class="pull-left">  
                              {{  ucfirst($filter) }}
                        </span><i class="fa fa-angle-down pull-right" style="line-height: 1.5em;"></i>

                      </div>  

                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                      <a href="/{{ strtolower($shop->country) }}/store/{{ strtolower($activeCategory->slug) }}/{{ strtolower($selectCategory->slug) }}?sort=latest" class="dropdown-item" >Lastest</a>
                      <a href="/{{ strtolower($shop->country) }}/store/{{ strtolower($activeCategory->slug) }}/{{ strtolower($selectCategory->slug) }}?sort=low" class="dropdown-item" >Low</a>
                      <a href="/{{ strtolower($shop->country) }}/store/{{ strtolower($activeCategory->slug) }}/{{ strtolower($selectCategory->slug) }}?sort=high" class="dropdown-item" >High</a>

                    </div>

                </div>
                
                <!-- Refine search button with dropdown. Visible on mobile -->
                <div class="dropdown pull-right contains-button visible-xs" style="padding-left: 5px;">

                    <button id="dropdownMenuButton" data-toggle="dropdown" class="fav-btn">
                      <div class="clearfix">
                        <span class="pull-left">Refine Search</span>    <i class="fa fa-angle-down pull-right" style="line-height: 1.5em;"></i>
                      </div>	
                    </button>

                    {{-- MOBILE CATEGORY --}}
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach ($activeCategory->subCategories as  $subCategory)
                            <li><a href="/{{ strtolower($shop->country) }}/store/{{ strtolower($activeCategory->slug) }}/{{ strtolower($subCategory->slug) }}"><p>{{ ucwords($subCategory->title) }}</p></a></li>
                        @endforeach
                    </div>
      
                </div>
                
                <ul class="page pull-right hidden-xs" style="margin-top: 0px;">
                                
                  @if( count($products) > 0)
                    {{ $products->appends(['sort' => $filter])->links() }} 
                  @endif

                </ul>

              </div>

                  
               @if(count($products) > 0)

                  @foreach ($products as $product)
                
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
            
                                        @if( $product->sale_price > 0 ){
                                          
                                          {{ strtoupper($shop->currency) }} {{ number_format($product->sale_price,2) }}
            
                                          <strike>{{ strtoupper($shop->currency) }} {{ number_format($product->regular_price,2) }}</strike>
                                          {{-- <input type="hidden" id="_price" value="">  --}}
            
                                        @else
            
                                          {{ strtoupper($shop->currency) }} {{ number_format($product->regular_price,2) }}
            
                                        @endif
            
                                      </p>
                                  </div>
                              
                                  <b> {{ $product->title }} </b> 
                      
                                </div>
                              
                                @if($product->quantity <= 0)
                                  <div class="out-of-stock">
                                    <h4>OUT OF STOCK</h4>
                                  </div>
                                @endif
                          </div>
                      </div>
                  
                  @endforeach

              @else

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                      <h4 class="pull-left">No Product Under This category.<br/>Please Come Again Next Time. Thank you!. </h4>
                   
                  </div>

              @endif


      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <ul class="page pull-right hidden-xs" style="margin-top: 0px;">
                  @if( count($products) > 0)
                  {{ $products->appends(['sort' => $filter])->links() }} 
                  @endif

                </ul>
                  
      </div>
            </div>

            <div class="row visible-xs">

              <div class="col-xs-12 text-center">

                <ul class="page">

                  @if( count($products) > 0)
                  {{ $products->appends(['sort' => $filter])->links() }} 
                  @endif

                </ul>

              </div>

            </div>

          </div>

          

        </div>

      </div>  

    </div>



    <div class="refine-search visible-xs go-out">

      <div class="head-part">

        <a class="go-back"><i class="fa fa-angle-left" data-target="#myCarousel" data-slide-to="0"></i></a>

        <h3>Refine</h3>

        <p>10 results</p>

        <a class="close-refine"><i class="material-icons">close</i></a>

      </div>
      

      <div class="body-part">

        <div id="myCarousel" class="carousel slide" data-interval="0">

          <div class="carousel-inner">

              <div class="item active" >

                <ul class="refine-param">

                 <li  class="" data-target="#myCarousel" data-slide-to="1">

                      <div class="clearfix">

                        <h4 class="pull-left">REFINE BY {{ strtolower($activeCategory->slug) }}</h4>

                        <i class="fa fa-angle-right pull-right"></i>

                      </div>

                    </li>
                    

                    <!--<li data-target="#myCarousel" data-slide-to="2" class="active">

                      <div class="clearfix">

                        <h4 class="pull-left">REFINE BY COLOUR</h4>

                        <i class="fa fa-angle-right pull-right"></i>

                      </div>

                    </li>

                    <li data-target="#myCarousel" data-slide-to="3" class="active">

                      <div class="clearfix">

                        <h4 class="pull-left">SIZE</h4>

                        <i class="fa fa-angle-right pull-right"></i>

                      </div>

                    </li>

                    <li data-target="#myCarousel" data-slide-to="4" class="active">

                      <div class="clearfix">

                        <h4 class="pull-left">PRICE</h4>

                        <i class="fa fa-angle-right pull-right"></i>

                      </div>

                    </li> -->

                </ul> 

              </div>



              <div class="item">

                <ul class="refine-param sub-items">

                    @foreach ($activeCategory->subCategories as  $subCategory)
                      <li><a href="store/{{ strtolower($activeCategory->slug) }}/{{ strtolower($subCategory->slug) }}" class="an-item clearfix"><p>{{ ucwords($subCategory->title) }}</p></a></li>
                    @endforeach

                </ul>

              </div>



              {{-- <div class="item">

                <ul class="refine-param">

                  <li>

                    <input type="radio" name="colour"> Grey (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> White (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> Green (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> Orange (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> Yellow (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> Black (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> Red (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> Purple (200)

                  </li>

                </ul>

              </div>



              <div class="item">

                <ul class="refine-param">

                  <li>

                    <input type="radio" name="colour"> XXS (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> XS (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> S (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> M (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> L (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> XL (200)

                  </li>

                </ul>

              </div>



              <div class="item text-center p-range">

                GHS <input type="text" name="" placeholder="1"> <span style="margin-left: 10px;margin-right: 15px;">TO</span> GHS<input type="text" name="" placeholder="50">

              </div> --}}

            </div>

        </div>

      </div>

      <div class="base-part clearfix">

        <button class="base-btn pull-left">Clear all</button>

        <button class="base-btn pull-right">Apply</button>

      </div>

    </div>

  

    @include('frontend.inc.footer')



    <script type="text/javascript">

      $(document).ready(function(){

        $('.accordion-toggle').on('click', function() {

                  var $icon = $(this).find('.material-icons');

                  if ($icon.hasClass('add')) {

                      $icon.html('&#xE313;');

                  } else {

                      $icon.html('&#xE316;');

                  }

                  $icon.toggleClass('add');

              });

              $('.sub-items li a').click(function(){

                $(this).toggleClass('you-selected');

              });  

              $('.close-refine').click(function(){

                $('.refine-search').addClass('go-out');

              });   

              $('#show-refine').click(function(){

                $('.refine-search').removeClass('go-out');

              });           

      })

    </script>

  </body>

</html>






