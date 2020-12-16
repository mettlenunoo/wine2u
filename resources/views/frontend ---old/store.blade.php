<!DOCTYPE html>
<html lang="en">
	<head>
		
		<title>Haute Vie - Homepage</title>
		<link rel="shortcut icon" type="image/png" href="images/favicon.png">
		
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta name="description" content="">

		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{ asset('css/bootstrap-glyphicons.css')}}" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="{{ asset('css/global-styles.css')}}" rel="stylesheet">
        <link href="{{ asset('css/index-styles.css')}}" rel="stylesheet">
        <link href="{{ asset('css/custom.css')}}" rel="stylesheet">


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
		 
		<!-- <header class="has-background">
			<div class="overlay"></div>
			<div class="header-content">
				<h2>SALE NOW ON</h2>
				<h5>Up to 30% off</h5>
				<a href="#">
					<button class="but">SHOP NOW </button>
				</a>	
			</div>
		</header> -->


		
		<div class="carousel slide" id="myCarousel" data-ride="carousel" data-interval="4000">
            <div class="carousel-inner" role="listbox">
        
              @foreach ($sliders as $key=>$slider)
                  
                      <div @if($key == 0 )  class="item active" @else  class="item"  @endif  >
                          <div class="fill" style="background-image:url('{{ asset('slider/'.$slider->pic) }}');">
                              <div class="overlay"></div>
                                  <div class="header-content">
                                      <h2> {{ ucwords($slider->title) }}</h2>
                                      <h5></h5>
                                      <a href="{{ $slider->link }}" class="but">{{ ucwords($slider->btn_text)  }}</a>
                                  </div>
                          </div>	
                      </div>

              @endforeach

            </div>
      </div>

      <div class="container first-section">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="has-background img1">
                      <div class="overlay"></div>
                      <div class="img-content text-center">
                          <h3>HEALTH</h3>
                          <h5>SUPPLEMENTARY AND MORE.</h5>
                          <a href="/gh/store/health-1">
                              <button class="but">SHOP TODAY</button>
                          </a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="has-background img2">
                      <div class="overlay"></div>
                      <div class="img-content text-center">
                          <h3>SKINCARE</h3>
                          <h5>DISCOVER NATURAL BEAUTY</h5>
                          <a href="/gh/store/beauty-1">
                              <button class="but">SHOP NOW</button>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
   

      <div class="container third-section">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <h3>SHOP NEW ARRIVALS</h3>
              </div>
              <div class="col-lg-12">
                  <div class="owl-carousel owl-theme">

                          @foreach ($newProducts as $product)
                                  
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
                                                 @if($product->variableProductSingle != "")
                                                        <div class="bag-func" onclick="cart('{{ $product->variableProductSingle->id }}')"  tyle="cursor:pointer">
                                                            <i  style="cursor: pointer;" class="fa fa-shopping-bag"></i>
                                                        </div>
                                                 @endif

                                          </div>

                                          <div class="panel-footer clearfix">
                                              <div class="clearfix">
                                                  <h4 class="pull-left"> {{ ucwords($product->product_name) }}</h4>
                                                  
                                                      <p class="price pull-right">
                                                        @if($product->variableProductSingle != "")
                                                                @if( $product->variableProductSingle->sale_price > 0 )
                                                                    
                                                                    {{ strtoupper($shop->currency) }} {{ number_format($product->variableProductSingle->sale_price,2) }}

                                                                    <strike>{{ strtoupper($shop->currency) }} {{ number_format($product->variableProductSingle->regular_price,2) }}</strike>
                                                                    {{-- <input type="hidden" id="_price" value="">  --}}

                                                                @else

                                                                    {{ strtoupper($shop->currency) }} {{ number_format($product->variableProductSingle->regular_price,2) }}

                                                                @endif
                                                        @endif

                                                      </p>
                                              </div>
                                      
                                              {{-- {!! strwords($product->description, 40) !!} --}}

                                          </div>
                                      
                                          @if($product->variableProductSingle == "")
                                              <div class="out-of-stock">
                                                  <h4>OUT OF STOCK</h4>
                                              </div>
                                          @endif
                              </div>
                              
                          @endforeach

                  </div>
              </div>
          </div>
      </div>
      <div class="container second-section has-background">
          <div class="overlay"></div>
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-6 col-md-offset-6 col-sm-offset-6 text-center">
                  <h2>ACCESSORIES</h2>
                  <h5>DISCOVER THE LATEST</h5>
                  <a href="/gh/store/jewellery-1">
                      <button class="but">SHOP NOW</button>
                  </a>	
              </div>	
          </div>
      </div>
  
      <div class="container third-section">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <h3>FEATURED PRODUCTS</h3>
              </div>
              <div class="col-lg-12">
                  <div class="owl-carousel owl-theme">

                      @foreach ($featuredProducts as $product)
                          
                          <div class="panel">
                              {{-- <input type="hidden" name="pid" id="product_id" value=""> --}}
                                      <div class="panel-body">
                                          <div class="image-in">

                                              <a href="/{{ strtolower($shop->country) }}/product/{{ strtolower($product->slug)  }}">
                                                  <img src="{{ asset('product_images/'.$product->img1) }}" class="img-responsive img-resize">
                                              </a>	

                                          </div>

                                          <div class="hover-image">

                                              <img src="{{ asset('product_images/'.$product->img2) }}" class="img-responsive img-resize">

                                          </div>
                                              @if($product->variableProductSingle != "")
                                                <div class="bag-func" onclick="cart('{{ $product->variableProductSingle->id }}')"  tyle="cursor:pointer">
                                                    <i  style="cursor: pointer;"class="fa fa-shopping-bag"></i>
                                                </div>
                                              @endif


                                      </div>

                                      <div class="panel-footer clearfix">
                                          <div class="clearfix">
                                              <h4 class="pull-left">{{ ucwords($product->product_name)  }}</h4>
                                              
                                                  <p class="price pull-right">
                                                    @if($product->variableProductSingle != "")
                                                            @if( $product->variableProductSingle->sale_price > 0 ){
                                                                
                                                                {{ strtoupper($shop->currency) }} {{ number_format($product->variableProductSingle->sale_price,2) }}

                                                                <strike>{{ strtoupper($shop->currency) }} {{ number_format($product->variableProductSingle->regular_price,2) }}</strike>
                                                                {{-- <input type="hidden" id="_price" value="">  --}}

                                                            @else

                                                                {{ strtoupper($shop->currency) }} {{ number_format($product->variableProductSingle->regular_price,2) }}

                                                            @endif
                                                    @endif

                                                  </p>
                                          </div>
                                  
                                          {{-- {!! strwords($product->description, 40) !!} --}}
                  
                                      </div>
                                  
                                      @if($product->variableProductSingle == "")
                                          <div class="out-of-stock">
                                              <h4>OUT OF STOCK</h4>
                                          </div>
                                      @endif
                          </div>
                          
                      @endforeach

                  </div>
              </div>
          </div>
      </div>

  

      <!--<div class="container last-section has-background">
          <div class="overlay"></div>
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <h2>BEHIND</h2>
                  <h2>THE</h2>
                  <h2>BRAND</h2>
                  <a href="">
                      <button class="but">DISCOVER US</button>
                  </a>	
              </div>	
          </div>
      </div>-->

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
                          items:2
                      },
                      1000:{
                          items:3
                      },
                      1200:{
                          items:4
                      },
                  }
              })
          });
      </script>
  </body>
</html>

