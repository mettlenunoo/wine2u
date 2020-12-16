
	<style type="text/css">
		 #result, #result_mobile{
    position: absolute;

    width:100%;
    max-width:600px;
    cursor:pointer;
    overflow-y: auto;
    max-height: 400px;
    box-sizing:border-box;
    z-index:1001;
   
    }
    
    .new-position {
      right: auto;
      left: 0;
    }
    
    .new-position a {
      font-size: 14px !important;
    }    

</style>



<div class="header-container">

	<div class="first-header-section">

		<div class="container">

			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12">

					<a class="trigger-nav visible-xs dib"><i class="fa fa-bars"></i></a>
					
					<ul class="top-tools new-position hidden-xs">
					   <li>
						  
					    </li>
					</ul>

				<a href="/store"><img src="{{ asset('images/black-logo.png')}}" class="logo-img img-responsive"></a>

					<ul class="top-tools">

						<!--<li>

							<a href="wishlist.php"><i class="fa fa-heart-o"></i></a>

						</li>-->

						<li>

							<div id="opencart" class="dropdown">

	    						<a id="dropdownMenuButton" data-toggle="dropdown" class="cart-btn" >

	    							<i class="fa fa-shopping-bag"></i><sub id="total_items">
										@php $totalItem = 0; $totalAmount = 0; @endphp
										@if(session()->get('cart'))

											@php  
												foreach( session()->get('cart') as $item ) {
													$totalItem = $totalItem + $item['quantity'];
												}
											@endphp

											{{ $totalItem }}

										@else

											{{ 0 }}

										@endif
										
									</sub>

	    						</a>

	  							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

		    							<div class="clearfix cart-title">
		    								<h3 class="pull-left">Shopping Bag</h3>
		    								<p class="pull-right" id="total_items"></p>
		    							</div>
	
		    							<ul id="myCart">
										@if(session()->get('cart'))
											@foreach (session()->get('cart') as $key => $item)
												@php  
													$totalPrice = $item['productPrice'] * $item['quantity'];
													$totalAmount = $totalAmount + $totalPrice;   
												@endphp

												<li id="{{$key}}cart">
													<div class="media">
														<div class="media-left">
															<img src="{{ asset('product_images/'.$item['productImage'])}}" class="media-object" style="height: 90px; width: 70px; object-fit: cover;" alt="{{ $item['productName'] }}">
														</div>
														<div class="media-body" style="padding-right:10px;">
																<h4 style="margin-top:0px;margin-bottom:10px;font-size:16px;">{{ $item['productName'] }}</h4>
																<p style="font-size: 13px;margin-bottom:10px;"> </p>
																<div class="clearfix">
															
																	<p class="pull-left small">QTY:{{ $item['quantity'] }} X  <span>{{ $item['productPrice'] }}</span>
																																	
																	<p class="pull-right" style="font-weight: 600;    margin-bottom: 5px;"> <span>{{ number_format($item['productPrice'] * $item['quantity'],2) }}</p>
																	
																</div>
														</div>
													</div>
							
													<p class="small">SIZE: <b>{{ $item['productAttribute'] }}</b>  <span class="pull-right" style="font-weight: 600; margin-bottom: 5px; cursor:pointer;" onclick="deleteCart({{$key}})" > Remove <span> </p>
												
													<!--	<p class="text-danger">Item available in stock</p>-->
												</li>

											@endforeach
										@endif

		    							</ul>

		    							<div class="cart-footer">
	
		    								<div class="clearfix">
	
		    									<h3 class="pull-left">Total</h3>
	
		    									<h3 class="pull-right"  style="font-weight: 600;" id="cartTotalAmt">  {{ number_format($totalAmount,2) }}  </h3>
	
		    								</div>
	
		    								<div class="clearfix">
	
		    									{{-- <a href="/{{ strtolower($shop->country) }}/checkout"><button class="pull-right chck-out">Checkout</button></a>
	
		    									<a href="/{{ strtolower($shop->country) }}/cart"><button class="pull-right see-bag">View Bag</button></a>
	 --}}
		    								</div>
	
		    							</div>

	  							</div>

							</div>

						</li>

						<li class="hidden-xs">

							<form>

					         <input type="text" name="" id="search" placeholder="Search">
							 <i class="fa fa-search"></i>

							</form>

						</li>

					<li class="visible-xs dib"> 
							<a style="color: #333 !important;text-decoration: none !important;cursor: pointer;margin-left: -10px;" class="open-search"><i class="fa fa-search"></i></a>
					</li>

					</ul>

				<ul class="list-group search_result" id="result"></ul>
					

				</div>
				{{-- <input type="hidden" id="shopId" value="{{ $shop->id }}" > --}}
				{{-- <input type="hidden"  id="country" value="{{ strtolower($shop->country) }}" > --}}

			</div>

		</div>

	</div>

	<nav class="navbar navbar-default hidden-xs special-nav">

		<div class="container-fluid">

			<div class="nav-collapse collapse navbar-responsive-collapse" id="mainNavBar">

				<ul class="nav navbar-nav navbar-right">
                 
					@foreach ($categories as $category)
						
						<li class="dropown">
					     
						</li>

					@endforeach

				</ul>

			</div>

		</div>

	</nav>

</div>



<div class="for-offset"></div>



<div class="navigation-small go-out-left visible-xs">

	<div class="ns-head clearfix">

		<h3 class="pull-left">Shop</h3>

		<a class="close-nvs pull-right"><i class="material-icons">close</i></a>

	</div>

	<div class="panel-group nv-accord" id="accordion1">
                  
		@foreach ($categories as $category)

			<div class="panel panel-default">

				<div class="panel-heading">

					<h4 class="panel-title">

					
					</h4>
				</div>

			</div>

		@endforeach
		
	     <div class="panel panel-default">
	        <div class="panel-heading">
		         <h4 class="panel-title">
	              <a href="signin.php">
	                <i class="fa fa-user"></i> Login | Register
	              </a>
	            </h4>
	       </div>
	     </div>     

	</div>

</div>



<form class="search-box visible-xs pull-up">

	<input type="text" name="" id="search_mobile" placeholder="Search">

	<a><i class="fa fa-search"></i></a>

	<ul class="list-group search_result" id="result_mobile"></ul>

</form>


                      		<script>
		
		      $(document).ready(function(){

				$('#search_mobile').keyup(function(){
				//alert('man');
                 $('#result_mobile').html('');
				 var search = document.getElementById("search_mobile").value;

				 if(search == ''){
					 $('#result_mobile').html('');	 
				 }else{

					var country = document.getElementById("country").value;
					var shopid = document.getElementById("shopId").value;

					// BINDING DATA TO DATA FORM
					var formData = new FormData();
					formData.append('name',search);
					formData.append('shop_id',shopid);
					formData.append('country',country);

					$.ajaxSetup({
						headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
					});
				//alert(search);
				  $.ajax({
					   type: "POST",
					   data: formData,
					   url: "/product/search",
					   cache:false,
					   contentType: false,
					   processData: false,
					   success: function(msg){
						 $('#result_mobile').append(msg);
						  
						 //console.log(msg);

						 //document.getElementById("result").innerHTML = msg; //response;
						 //document.getElementById("lod").innerHTML = "";
					   }
					});
	                 
				 } // END OF IF STATEMENT

				});
			})
	
		
		    //   $(document).ready(function(){

			// 	$('#search_mobile').keyup(function(){
			// 	//alert('man');
            //      $('#result_mobile').html('');
			// 	 var search = document.getElementById("search_mobile").value;
			// 	 if(search == ''){
			// 		 $('#result_mobile').html('');	 
			// 	 }else{
			// 	//alert(search);
			// 	  $.ajax({
			// 		   type: "POST",
			// 		  data: {search:search},
			// 		   url: "search_product.php",
			// 		   success: function(msg){
			// 			 $('#result_mobile').append(msg);
			// 			 //document.getElementById("result").innerHTML = msg; //response;
			// 			 //document.getElementById("lod").innerHTML = "";
			// 		   }
			// 		});
	                 
			// 	 } // END OF IF STATEMENT

			// 	});
			// })
					</script>

