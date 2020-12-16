@extends('admin.layout.app')
@section('content')
            <main id="main-container">
                <!-- Page Header -->
                <!-- You can use the .hidden-print class to hide an element in printing -->
                <div class="content bg-gray-lighter hidden-print animated bounceIn" >
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Invoice 
                            </h1>
                        </div>
         {!! Form::open(['action' => 'orderController@updateinvoice', 'method' => 'POST','class'=> 'col-sm-5 text-right hidden-xs'] ) !!}
                 {{-- <form class="col-sm-5 text-right hidden-xs" action="invoice.php?order_id=" method="POST"> --}}

                     <div class="form-group">
                        <div class="col-sm-6 ">
                            <select class="form-control" id="example-select" name="status" size="1">
                                <option @if ($order->complete_status == "Pending") Selected @endif  value="Pending">Pending Payment</option>
                                <option @if ($order->complete_status == "Processing") Selected @endif  value="Processing">Processing </option>
                                <option @if ($order->complete_status == "On Hold") Selected @endif  value="On Hold"> On Hold</option>
                                <option @if ($order->complete_status == "Completed") Selected @endif  value="Completed">Completed </option>
                                <option @if ($order->complete_status == "Cancelled") Selected @endif  value="Cancelled">Cancelled</option>
                                <option @if ($order->complete_status == "Refunded") Selected @endif value="Refunded">Refunded </option>
                                <option @if ($order->complete_status == "Failed")  Selected @endif value="Failed">Failed</option>
                            </select>
                         </div>

                        <div class="col-sm-6">
                          <input class="form-control" type="text" name="tracking"  value="<?= $order->tracking_code;?>" placeholder="Enter tracking code" >
                          <input class="form-control" type="hidden" name="OrderID"  value="<?= $order->id;?>"  >
                        </div>

                        <div class="col-sm-6">
                            Do you want to send an email?
                          <input  type="checkbox" name="email_send"  value="Yes"  >
                        </div>

                        <div class="col-sm-12">
                            <button class="btn btn-sm btn-primary  pull-right" type="submit" name="inv_submit"> Publish </button>
                        </div>

                     </div>
                {!! Form::close() !!}
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content content-boxed animated fadeInLeft">
                    <!-- Invoice -->
                    <div class="block">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <!-- Print Page functionality is initialized in App() -> uiHelperPrint() -->
                                    <button type="button" onclick="App.initHelper('print-page');"><i class="si si-printer"></i> Print Invoice</button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">#INV<?= $order->id; ?></h3>
                        </div>
                        <div class="block-content block-content-narrow">
                            <!-- Invoice Info -->
                          
                            <div class=" row">
                                <div class="col-6">
                                <div class="h1 text-center push-30-t push-30 "><img src="{{ asset('images/black-logo.png')}}" width="120px" >
                            </div>
                                </div>

                            <div class="col-6">
                                 <div class="h6 push-30-t  hidden-print">INVOICE</div>
                                 
                            </div>
                            </div>

                           
                            <hr class="">
                            <div class="row items-push-2x">
                            
                           

                                <!-- Company Info -->
                                <div class="col-xs-6 col-sm-4 col-lg-3">
                                    <p class="h2 font-w400 push-5"><?=  ucwords($order->name); ?></p>
                                    <address>
                                       <b>Brief Delivery Address</b> <br>
                                        <?= ucwords($order->ship_to);  ?><br/>
                                         Code : <?= $order->tracking_code;?><br>
                                       <br/>
                                    </address>
                                </div>
                                <!-- END Company Info -->
                                 
                                <!-- Client Info -->
                                <div class="col-xs-6 col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-6 ">
                                    <!--<p class="h2 font-w400 push-5"></p>-->
                                    <address>
                                        Order Date : {{  $order->created_at->format('d M, Y') }} <br>
                                        Order Time : {{  $order->created_at->format('h:i:s:a') }} <br>
                                        Payment Method : <?= ucfirst($order->payment_method);?><br>
                                        Status : <?= $order->complete_status;?><br>
                                        Total Quantity : <?= $order->quantity;?> item(s)<br>
                                        Total Amount : <b>{{ Session::get('shopCurrency') }} <?= number_format($order->totalamount,2);?></b><br>
                                       <i class="si si-call-end"></i> <?= $order->phone_number; ?> <br/>
                                       <i class="si si-envelope"></i> <?= $order->email; ?>
                                    </address>
                                </div>
                                <!-- END Client Info -->
                            </div>
                            <!-- END Invoice Info -->

                            <!-- Table -->
                            <div class="table-responsive push-50">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th class="text-center" style="width: 120px;"></th>
                                            <th>Product</th>
                                            <th class="text-center" style="width: 100px;">Quantity</th>
                                            <th class="text-right" style="width: 120px;">Unit {{ Session::get('shopCurrency') }}</th>
                                            <th class="text-right" style="width: 120px;">Amount {{ Session::get('shopCurrency') }} </th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                @php   $totalAmt = 0.0; @endphp
                                @foreach ($orderProduct as $key => $item)
                                  
                                    @php
                                        foreach ($products as $key => $product) {
                                            
                                            if($product->id ==  $item->product_id){
                                            $image = "product_images/".$product->img1;
                                            $product_name = $product->product_name;
                                            }

                                        }
                                      
                                    @endphp
                                    
                                    <tr>
                                        <td class="text-center"><img src="{{ asset($image) }}" class="tableimage"></td>
                                        <td>
                                              <p class="font-w600 push-10">{{ $product_name }}</p>
                                              <div class="text-muted">{{ $item->attribute }}</div>
                                        </td>
                                        <td class="text-center">{{ $item->quantity }}</td>
                                        <td class="text-center">{{ $item->price }}</td>
                                        <td class="text-center">{{ number_format($item->quantity * $item->price,2) }}</td>
                                    </tr>
                                   @php  $totalAmt =  $totalAmt + ($item->quantity * $item->price) @endphp
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

                                    <tr>
                                        <td colspan="4" class="font-w600 text-right">Priority Shipping </td>
                                        <td class="text-right">{{ Session::get('shopCurrency') }} {{ $order->priority_delivery }}</td>
                                    </tr>

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
                                       <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="clearfix m-t-40">
                                                <!--<h5 class="small text-inverse font-600">PAYMENT TERMS AND POLICIES</h5>-->
                                                    <small>
                                                       <!-- All accounts are to be paid within 7 days from receipt of
                                                        invoice. To be paid by cheque or credit card or direct payment
                                                        online. If account is not paid within 7 days the credits details
                                                        supplied as confirmation of work undertaken will be charged the
                                                        agreed quoted fee noted above.-->

                                                        Thanks a million for your purchase. Please be on the lookout for emails on shipping and deliveries. For more information on our shipping policy, please visit our website <a href="index">Home</a>
                                                        
                                                    </small>
                                                </div>
                                       </div>
                            </div>
                            <!-- END Table -->

                            <!-- Footer -->
                            <hr class="hidden-print">
                            <p class="text-muted text-center">
{{-- 
                                <center class="hidden-print">

                            <h5>CONNECT WITH US:</h5>
                     
                             <p>
                             <a href="https://www.facebook.com/hautevieafrica" target="new">
                                    <img src="images/fb.svg" width="20px" height="20px"> 
                             </a>
                              <span>
                                <a href="https://www.instagram.com/hautevie_africa/" target="new">
                                     <img src="images/ig.svg" width="20px" height="20px"> 
                                </a>
                              </span>
                              <span>
                                 <a href="https://twitter.com/Hautevie_africa" target="new">
                                   <img src="images/twitter.svg" width="20px" height="20px"> 
                                 </a>
                              </span>
                               
                            </p>

                            </center> --}}
                            <small><!--Thanks a million for your purchase. Please be on the lookout for emails on shipping and deliveries. For more information on our shipping policy, please visit our website <a href="index">Home</a>--></small></p>

                            <!-- END Footer -->
                        </div>
                    </div>
                    <!-- END Invoice -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
 @endsection
