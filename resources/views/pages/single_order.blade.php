<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
   
   <!-- include navigation -->
    @include("pages.includes.nav-links")
    @include("pages.includes.navigation")
  <!-- include navigation -->

  <style type="text/css">
    * {
        box-sizing: border-box;
    }

    body {
        height: 100vh;
        overflow-x: hidden;
        font-family: "Roboto", sans-serif;
        line-height: 1.5em;
        font-size: 14px;
        margin: 0px;
        color: #646464;
    }

    .wrapper {
        width: 960px;
        margin-left: auto;
        margin-right: auto;
        padding: 7vh 15px;
    }

    table, th, td {
        border: 1px solid #e7e7e7;
        border-collapse: collapse;
    }

    th {
        font-weight: 400;
        padding: 15px;
        font-size: 16px;
        text-align: left;
    }

    td {
        padding: 7px 10px; 
        text-align: left;
        vertical-align: top;   
    }

    td img {
        max-height: 70px;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .total {
        background: #f8f8f8;
        font-weight: 600;
    }

    .width-2 {
        float:left;
        width: 30%;
        padding: 15px 15px 15px 0px;
    }

    .width-2 h4 {
        margin-bottom: 0px;
        font-size: 14px;
    }

     .width-3 {
        float:right;
        width: 30%;
        padding: 15px 15px 15px 0px;
    }

    .width-3 h4 {
        margin-bottom: 0px;
        font-size: 14px;
    }

    .small {
        font-size: 12px;
        margin-top: 0px;
    }

    .bord-top {
        margin-top: 60px;
        border-top: 1px solid #e7e7e7;
        padding: 0px 15px;
    }

    .width-1 {
        width: 30%;
        display: inline-grid;
        padding:15px 0px 20px 0px;
    }

    .width-1 h3 {
        margin-top: 0px;
        margin-bottom: 5px;
        font-size: 18px;
    }

    .width-1 p {
        margin-top: 0px;
        margin-bottom: 0px;
    }

    .material-icons {
        font-size: 12px;
    }

</style>
<section class="profile-top py-5">
	<div class="container-fluid container-w2u">
    	<div class="row align-items-start">
  			<div class="col-12 col-md-3 col-lg-3 mb-4 stick-to-top">
    			<div class="list-group" id="list-tab" role="tablist">
					<a class="list-group-item list-group-item-action "   role="tab" aria-controls="Personal-details">
						<strong>Menu</strong>
					</a>
          <a class="list-group-item " href="/account">Order History</a>
      		<a class="list-group-item "   href="/account/logout" > Logout</a>
          
   				</div>
  			</div>

  			<div class="col-12 col-md-9 col-lg-9  pl-md-5">



    			<div class="tab-content" id="nav-tabContent">


            <div class="wrapper">
              <div class="text-center">
              <img src="https://wine2u.com/page_assets/img/favicon.png" width="120px">
      
                  {{-- <h2 style="margin-top: 0px;margin-bottom: 5px;border-bottom: 1px solid #e7e7e7;padding-bottom: 20px; font-size:16px">INVOICE # {{ $order->id}}</h2> --}}
              </div>
              <div>
                  <div class="width-1">
                      <h3>{{ucwords($order->name)}}</h3>
                      <p class="small" style="font-weight: 600;">Brief Delivery Address</p>
                      <p class="small">{!! $order->ship_to !!}</p>
                      <p class="small"> Code : {{ $order->tracking_code }}</p>
                      <br>
                  </div>
                  <div class="width-1" style="width: 39%;"></div>
                  <div class="width-1">
                      <p class="small">Order Date: {{$order->created_at}}</p>
                      <p class="small">Payment Method: {{ ucfirst($order->payment_method) }}</p>
                      <p class="small">Status: {{ $order->complete_status }}</p>
                      <p class="small">Total Quantity: {{ $order->quantity}} Item(s)</p>
                      <p class="small">Total Amount: {{ Session::get("shopCurrency")." ".number_format($order->totalamount,2) }}</p>
                      <p class="small"><i class="material-icons">phone</i> {{ $order->phone_number }}</p>
                      <p class="small"><i class="material-icons">mail</i> {{ $order->email }} </p>
                      <br>
                  </div>
              </div>  
              <table style="width:100%">
              <thead>
                  <tr>
                      <th></th>
                      <th>PRODUCT</th> 
                      <th class="text-center">QUANTITY</th>
                      <th class="text-right">UNIT {{ Session::get("shopCurrency") }}</th>
                      <th class="text-right">AMOUNT {{ Session::get("shopCurrency") }}</th>
                  </tr>
              </thead>
      
      
              <tbody>
                  @php   $totalAmt = 0.0; @endphp
                     @foreach ($order->order_products as $key => $orderProduct)
                    
                      @php
                        
                              $image = "product_images/".$orderProduct->product->img1;
                              $product_name = $orderProduct->product->product_name;
                             
                      @endphp
                  
                  <tr>
                    <td class="text-center"><img src="/{{ $image }}" width="50px" height = "50px"></td>
                      <td>
                          <p class="font-w600 push-10">{{ $product_name }}
                              <div class="text-muted">{{ $orderProduct->attribute }}</div>
                          </p>
                      </td>
                      <td class="text-center">{{ $orderProduct->quantity }}</td>
                      <td class="text-center">{{ $orderProduct->price }}</td>
                      <td class="text-center">{{ number_format($orderProduct->quantity * $orderProduct->price,2) }}</td>
                 </tr>
      
                 @php  $totalAmt =  $totalAmt + ($orderProduct->quantity * $orderProduct->price) @endphp
                 @endforeach
      
                 <tr>
                      <td colspan="4" class="font-w600 text-right">Subtotal </td>
                      <td class="text-right">{{ Session::get('shopCurrency') }} {{ number_format($totalAmt,2) }}</td>
                 </tr>
      
                 <tr>
                      <td colspan="4" class="font-w600 text-right">Tax ({{ Session::get('shopTax') }} %)</td>
                      <td class="text-right">{{ Session::get('shopCurrency') }} {{ $order->taxes }} </td>
                  </tr>
                  
      
                 <tr>
                      <td colspan="4" class="font-w600 text-right">Shipping </td>
                      <td class="text-right">{{ Session::get('shopCurrency') }} {{ $order->shipping_amt }}</td>
                  </tr>
      
                  {{-- <tr class="active">
                      <td colspan="4" class="font-w700 text-uppercase text-right">Total </td>
                      <td class="font-w700 text-right">{{ Session::get('shopCurrency') }} {{ $order->totalamount }}</td>
                  </tr> --}}
      
                  <tr>
                      <td colspan="4" class="font-w600 text-right">Discount</td>
                      <td class="text-right">{{ Session::get('shopCurrency') }} ({{ $order->coupon_amount }})</td>
                  </tr>
      
                 
                  <tr class="active">
                      <td colspan="4" class="font-w700 text-uppercase text-right">Total </td>
                      <td class="font-w700 text-right">{{ Session::get('shopCurrency') }} {{ $order->totalamount }}</td>
                  </tr>
              </tbody>
      
              </table>
               <div class="text-center bord-top">
                 <!-- <p> Here is your tracking information:
      UPS Tracking Number: <a >1ZA769F50311186243</a></p>-->
              </div>
              <div class="width-12">
                 <p> Thanks a million for your purchase. Please be on the lookout for emails on shipping and deliveries. For more information on our shipping policy, please visit  <a href="https://hvafrica.com">our website</a></p>
              </div>
      
              {{-- <center>
                 <h5>CONNECT WITH US:</h5>
                      <p>
                         <a href="" target="new"><img src="" width="20px" height="20px"> </a>
                         <span><a href="" target="new"> <img src="" width="20px" height="20px"> </a> </span>
                         <span><a href="" target="new"><img src="" width="20px" height="20px">  </a> </span>
                      </p>
             </center> --}}
      
          </div>

        


    </div>
  </div>
</div>

  </div>
</section>

<!-- footer includes -->
  @include("pages.includes.footer")
  @include("pages.includes.footer-links")
<!-- footer includes -->
  <script src="/page_assets/js/account.js"></script>

 </body>
</html>