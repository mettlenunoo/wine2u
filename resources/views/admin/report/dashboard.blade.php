@extends('admin.layout.app')
@section('content')

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
            <div class="content bg-image overflow-hidden" style="background-image: url('{{ asset('shop_logos/'.Session::get('shopBanner'))}}');">
                    <div class="push-50-t push-15">
                    <h1 class="h2 text-white animated zoomIn">Dashboard - ({{ Session::get('shopName') }} )</h1>
                        <h2 class="h5 text-white-op animated zoomIn">Welcome {{ ucwords(auth()->user()->name) }}</h2>
                    </div>
                </div>
                <!-- END Page Header -->

                  {{-- <!-- Stats -->
                <div class="content bg-white border-b">
                  
                        <div class="row items-push text-uppercase">
                                <!-- Block Tabs Justified Alternative Style -->
                                            <div class="block">
                                                <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
                                                    <li class="active">
                                                        <a href="#today"><i class="fa fa-calendar-o"></i> TODAY</a>
                                                    </li>
                                                    <li>
                                                        <a href="#this_week"><i class="fa fa-calendar-o"></i> THIS WEEK</a>
                                                    </li>
                                                    <li>
                                                        <a href="#this_month"><i class="fa fa-calendar-o"></i> THIS MONTH</a>
                                                    </li>
                                                    <li>
                                                        <a href="#this_year"><i class="fa fa-calendar-o"></i> THIS YEAR</a>
                                                    </li>
                                                </ul>
                                                <div class="block-content tab-content">
                
                                    <div class="tab-pane active" id="today">
                                        @php   
                                         
                                            $todayQuantities = count($t_trans);
                                            $todaySalesAmt = 0.0;
                                            $todayPending = 0;
                                            $todayCompleted = 0;
                                            $todayCancelled = 0;
                                        foreach ($t_trans as $item){
                
                                           
                
                                            if($item->complete_status == 'Pending'){
                
                                                $todayPending =  $todayPending + 1;
                
                                            }elseif ($item->complete_status == 'Completed') {
                
                                                $todayCompleted =  $todayCompleted + 1;
                                                // TOTAL EARNING
                                                $todaySalesAmt = $todaySalesAmt + $item->totalamount;
                
                                            }elseif ($item->complete_status == 'Cancelled') {
                
                                                $todayCancelled =  $todayCancelled + 1;
                                            }
                
                                        }
                                        @endphp
                                       
                                         <div class="col-xs-6 col-sm-3">
                                       
                                    <div class="font-w700 text-gray-darker animated fadeIn">Product Sales</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
                                         <p class="h2 font-w300 text-primary animated flipInX" href=""> {{ $todayQuantities }} Item(s)</p>
                                        </div>
                                        
                                        <div class="col-xs-6 col-sm-3">
                
                                            <div class="font-w700 text-gray-darker animated fadeIn">Total Earning</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""><i class="flag-icon flag-icon-gh"></i> {{ Session::get('shopCurrency') }} {{  $todaySalesAmt }}</p>
                           
                                        </div>
                
                                    
                
                                        <div class="col-xs-6 col-sm-2">
                                            <div class="font-w700 text-gray-darker animated fadeIn">Complete Orders</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
                                        <p class="h2 font-w300 text-primary animated flipInX" href=""> {{  $todayCompleted  }}</p>
                                        </div>
                                        <div class="col-xs-6 col-sm-2">
                                            <div class="font-w700 text-gray-darker animated fadeIn"> Pending Orders</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
                                        <p class="h2 font-w300 text-primary animated flipInX" href=""> {{ $todayPending }}</p>
                                        </div>
                                         <div class="col-xs-6 col-sm-2">
                                            <div class="font-w700 text-gray-darker animated fadeIn"> Cancelled orders </div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
                                         <p class="h2 font-w300 text-primary animated flipInX" href="">  {{ $todayCancelled }}</p>
                                        </div>
                
                
                
                                     </div>
                
                                       <div class="tab-pane" id="this_week">
                
                                            @php   
                                         
                                            $weekQuantities = count($w_trans);
                                            $weekSalesAmt = 0.0;
                                            $weekPending = 0;
                                            $weekCompleted = 0;
                                            $weekCancelled = 0;
                                        foreach ($w_trans as $item){
                
                                           
                
                                            if($item->complete_status == 'Pending'){
                
                                                $weekPending =  $weekPending + 1;
                
                                            }elseif ($item->complete_status == 'Completed') {
                
                                                $weekCompleted =  $weekCompleted + 1;
                                                // TOTAL EARNINGS
                                                $weekSalesAmt = $weekSalesAmt + $item->totalamount;
                
                                            }elseif ($item->complete_status == 'Cancelled') {
                
                                                $weekCancelled =  $weekCancelled + 1;
                                            }
                
                                        }
                                        @endphp
                
                                <div class="col-xs-6 col-sm-3">
                
                
                                    <div class="font-w700 text-gray-darker animated fadeIn">Product Sales</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Week</small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""> {{ $weekQuantities }} Item(s)</p>
                                        </div>
                
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="font-w700 text-gray-darker animated fadeIn">Total Earning</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Week </small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""><i class="flag-icon flag-icon-gh"></i> {{ Session::get('shopCurrency') }} {{ $weekSalesAmt }}</p>
                                            
                                        </div>
                
                
                    
                                        <div class="col-xs-6 col-sm-2">
                                            <div class="font-w700 text-gray-darker animated fadeIn">Complete Orders</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Week</small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""> {{ $weekCompleted }} </p>
                                        </div>
                                        <div class="col-xs-6 col-sm-2">
                                            <div class="font-w700 text-gray-darker animated fadeIn"> Pending Orders</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Week</small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""> {{ $weekPending }} </p>
                                        </div>
                                         <div class="col-xs-6 col-sm-2">
                                            <div class="font-w700 text-gray-darker animated fadeIn"> Cancelled orders </div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Week</small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""> {{ $weekCancelled }} </p>
                                        </div>
                
                                    </div>
                                                    
                                    <div class="tab-pane" id="this_month">
                
                                     @php   
                                         
                                            $monthQuantities = count($m_trans);
                                            $monthSalesAmt = 0.0;
                                            $monthPending = 0;
                                            $monthCompleted = 0;
                                            $monthCancelled = 0;
                                        foreach ($m_trans as $item){
                
                                           
                
                                            if($item->complete_status == 'Pending'){
                
                                                $monthPending =  $monthPending + 1;
                
                                            }elseif ($item->complete_status == 'Completed') {
                
                                                $monthCompleted =  $monthCompleted + 1;

                                                // TOTAL EARNINGS
                                                $monthSalesAmt = $monthSalesAmt + $item->totalamount;
                
                                            }elseif ($item->complete_status == 'Cancelled') {
                
                                                $monthCancelled =  $monthCancelled + 1;
                                            }
                
                                        }
                                     @endphp
                
                
                                      <div class="col-xs-6 col-sm-3">
                
                                
                
                                    <div class="font-w700 text-gray-darker animated fadeIn">Product Sales</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month</small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""> {{  $monthQuantities }} item(s)</p>
                                        </div>
                
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="font-w700 text-gray-darker animated fadeIn">Total Earning</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month </small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""><i class="flag-icon flag-icon-gh"></i> {{ Session::get('shopCurrency') }} {{ $monthSalesAmt }}</p>
                            
                                        </div>
                
                
                                        <div class="col-xs-6 col-sm-2">
                                            <div class="font-w700 text-gray-darker animated fadeIn">Complete Orders</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month</small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""> {{ $monthCompleted }}</p>
                                        </div>
                                        <div class="col-xs-6 col-sm-2">
                                            <div class="font-w700 text-gray-darker animated fadeIn"> Pending Orders</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month </small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""> {{ $monthPending }}</p>
                                        </div>
                                         <div class="col-xs-6 col-sm-2">
                                            <div class="font-w700 text-gray-darker animated fadeIn"> Cancelled orders </div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month </small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""> {{  $monthCancelled }}</p>
                                        </div>
                
                                    </div>
                
                                       <div class="tab-pane" id="this_year">
                
                                     @php   
                                         
                                            $yearQuantities = count($y_trans);
                                            $yearSalesAmt = 0.0;
                                            $yearPending = 0;
                                            $yearCompleted = 0;
                                            $yearCancelled = 0;
                                        foreach ($y_trans as $item){
                
                                            
                
                                            if($item->complete_status == 'Pending'){
                
                                                $yearPending =  $yearPending + 1;
                
                                            }elseif ($item->complete_status == 'Completed') {
                
                                                $yearCompleted =  $yearCompleted + 1;

                                                // TOTAL EARNINGS
                                                $yearSalesAmt = $yearSalesAmt + $item->totalamount;
                
                                            }elseif ($item->complete_status == 'Cancelled') {
                
                                                $yearCancelled =  $yearCancelled + 1;
                                            }
                
                                        }
                                     @endphp
                
                
                                        <div class="col-xs-6 col-sm-3">
                
                                    <div class="font-w700 text-gray-darker animated fadeIn">Product Sales</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Year</small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""> {{ $yearQuantities  }}</p>
                                        </div>
                
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="font-w700 text-gray-darker animated fadeIn">Total Earning</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Year </small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""><i class="flag-icon flag-icon-gh"></i> {{ Session::get('shopCurrency') }} {{ $yearSalesAmt }}</p>
                           
                                        </div>
                
                
                                          
                
                                        <div class="col-xs-6 col-sm-2">
                                            <div class="font-w700 text-gray-darker animated fadeIn">Complete Orders</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month</small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""> {{  $yearCompleted }}</p>
                                        </div>
                                        <div class="col-xs-6 col-sm-2">
                                            <div class="font-w700 text-gray-darker animated fadeIn"> Pending Orders</div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month </small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""> {{  $yearPending }} </p>
                                        </div>
                                         <div class="col-xs-6 col-sm-2">
                                            <div class="font-w700 text-gray-darker animated fadeIn"> Cancelled orders </div>
                                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month </small></div>
                                            <p class="h2 font-w300 text-primary animated flipInX" href=""> {{ $yearCancelled  }}</p>
                                        </div>
                
                                    </div>
                
                                                </div>
                                            </div>
                                      
                                    </div>
                 
                </div>
                <!-- END Stats --> --}}

                <!-- Page Content -->
                <div class="content animated fadeInLeft">
                    <div class="row">
                             <div class="col-md-12">
                                <div class="block">
                                    <div class="block-content">
                                      <h4 class="header-title m-t-0 m-b-30">Today's Sales</h4>
                                      
                                      
                        <table class="table table-bordered table-striped js-dataTable-full" data-order='[[ 0, "desc" ]]'>
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Order</th>
                                                <th class="text-center">Purchased</th>
                                                <th class="text-center">Deliver to</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                        <?php 
                                       foreach ($trans as $key => $row):
                                         ?>
                                         
                                           
                                              <tr id="<?php echo $row['id']; ?>">

                                                <td>
                                                    <?php echo $row['id']; ?>
                                                </td>
                                          
                                                  <td id="<?php echo $row['id'];?>success_message">
                                                  <?php if($row['complete_status'] == "Cancelled"){?>
                                                  
                                                  <span class="label label-warning"><i class="fa fa-times-circle"> &nbsp Cancelled</i></span>
                                                  <?php }elseif($row['complete_status'] == "Completed"){ ?>
                                                  <span class="label label-success"><i class="fa  fa-check-circle"> &nbsp Completed</i></span>
                                                  <?php }elseif($row['complete_status'] == "Pending"){ ?>
                                                  <span class="label label-primary"><i class="fa  fa-ellipsis-h"></i>  &nbsp Pending </span>
                                                  <?php }else{ ?>
                                                  <span class="label label-warning"><i class="fa  fa-exclamation-circle"></i></span>
                                                  <?php }?>
                                                  
                                                  </td>
                                                  
                                                  <td>

                                                      # <?php echo $row['id'];?> 
                                                       &nbsp | &nbsp <?php echo $row['customer_name'];?> <br/>
                                                      <i class="fa fa-phone"></i> <?php echo $row['phone_number'];?> <br/>
                                                      <i class="fa  fa-calendar-o"></i> <?php echo $row['created_at'];?> <br/>

                                                  </td>
                                                  
                                                  <td> 
                                                      <?php echo $row['quantity'];?> item(s) 
                                                  </td>
                                                  
                                                  <td><?php echo $row['ship_to'];?></td>
                                                  
                                                  <td>  {{ Session::get('shopCurrency') }}  <?php 
                                                  $totalamount = $row['totalamount'];
                                                  echo $totalamount = number_format($totalamount, 2);
                                                  
                                                    ?><br/>
                                                      <?php echo $row['payment_method'];?>
                                                  </td>
                                                  
                                                  <td> 
                                                  <?php if($row['complete_status'] != "Completed"){?>
          
                                                   <input type="hidden" name="pid" id="<?php echo $row['id']; ?>order_id" value="<?php echo $row['id']; ?>">
                                                    <input type="hidden" name="pid" id="<?php echo $row['id']; ?>order_name" value="Completed">
                                                   <button onclick="update_order('<?php echo $row['id']; ?>')" id="<?php echo $row['id'];?>success"  class="btn btn-success push-5-r push-10" data-toggle="tooltip" data-placement="top" title="Complete Order"><i class="fa  fa-check-circle"></i></button>
                                                  
                                                  <?php }?>
                                              
                                                  <a href="/admin/order/{{ $row->id }}"> <button class="btn btn-info push-5-r push-10"  data-toggle="tooltip" data-placement="top" title="View invoice"><i class="fa  fa-eye"></i></button></a>
                                              
                                                  </td>
                                              </tr>
                                              <?php endforeach;   ?>
                                                  
                                                      </tbody>
                                             </table>
                        
                                   
                                    </div>
                                 </div>
                            </div><!-- end col -->
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
 @endsection