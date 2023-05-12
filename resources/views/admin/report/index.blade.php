@extends('admin.layout.app')
@section('content')
            <!-- Main Container -->
            <main id="main-container">
               
            
                <!-- Stats -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12 ">
                       
                            <a href="/admin/report" @if($reportType == "today") disabled  @endif type="button" class="btn btn-primary btn-lg">Today</a>
                            <a href="/admin/report/week" @if($reportType == "week") disabled  @endif type="button" class="btn btn-primary btn-lg">This Week</a>
                            <a href="/admin/report/month" @if($reportType == "month") disabled  @endif type="button" class="btn btn-primary btn-lg">This Month</a>
                            <a href="/admin/report/year" @if($reportType == "year") disabled  @endif type="button" class="btn btn-primary btn-lg">This Year </a>
                          
                            {{-- <div class="input-daterange input-group" data-date-format="mm/dd/yyyy">
                                <input class="form-control" type="text" id="example-daterange1" name="example-daterange1" placeholder="From">
                                <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                <input class="form-control" type="text" id="example-daterange2" name="example-daterange2" placeholder="To">
                            </div> --}}

                    </div>
                </div>
            </div>

         
            
            <div class="content animated fadeInLeft">

                <div class="row">
                    <div class="col-md-12">

           
                                <div class="col-sm-6 col-lg-3">
                                    <a class="block block-link-hover3" href="javascript:void(0)">
                                        {{-- <div class="block-content block-content-full text-center">
                                            <div>
                                                <img class="img-avatar img-avatar96" src="assets/img/avatars/avatar5.jpg" alt="">
                                            </div>
                                            <div class="h5 push-15-t push-5">Rebecca Reid</div>
                                        </div> --}}
                                        <div class="block-content block-content-mini block-content-full bg-success">
                                            <div class="text-center  text-white-op">Complete Order(s)</div>
                                        </div>
                                        <div class="block-content">
                                            <div class="row items-push text-center">
                                                <div class="col-xs-6">
                                                    <div class="push-5"><i class="glyphicon glyphicon-shopping-cart fa-2x"></i></div>
                                                    <div class="h5 font-w300 text-muted"> 
                                                        Product(s)
                                                        <br>
                                                        {{ $completeSalesProducts  }}
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="push-5"><i class="si si-wallet fa-2x"></i></div>
                                                    <div class="h5 font-w300 text-muted">
                                                        {{ Session::get('shopCurrency') }} 
                                                        <br>
                                                        {{  number_format($completeSalesAmt,2) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <a class="block block-link-hover3" href="javascript:void(0)">
                                        {{-- <div class="block-content block-content-full text-center">
                                            <div>
                                                <img class="img-avatar img-avatar96" src="assets/img/avatars/avatar2.jpg" alt="">
                                            </div>
                                            <div class="h5 push-15-t push-5">Ashley Welch</div>
                                        </div> --}}
                                        <div class="block-content block-content-mini block-content-full bg-danger">
                                            <div class="text-center text-white-op">Cancelled Order(s)</div>
                                        </div>
                                        <div class="block-content">
                                            <div class="row items-push text-center ">
                                                <div class="col-xs-6">
                                                    <div class="push-5"><i class="glyphicon glyphicon-shopping-cart fa-2x"></i></div>
                                                    <div class="h5 font-w300 text-muted"> 
                                                         Product(s)
                                                        <br> 
                                                        {{ $cancelledSalesProducts }} 
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="push-5"><i class="si si-wallet fa-2x"></i></div>
                                                    <div class="h5 font-w300 text-muted">
                                                        {{ Session::get('shopCurrency') }} 
                                                        <br>
                                                        {{ number_format($cancelledSalesAmt,2) }} 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <a class="block block-link-hover3" href="javascript:void(0)">
                                        {{-- <div class="block-content block-content-full text-center">
                                            <div>
                                                <img class="img-avatar img-avatar96" src="assets/img/avatars/avatar13.jpg" alt="">
                                            </div>
                                            <div class="h5 push-15-t push-5">John Parker</div>
                                        </div> --}}
                                        <div class="block-content block-content-mini block-content-full bg-warning">
                                            <div class="text-center text-white-op">Pending Order(s)</div>
                                        </div>
                                        <div class="block-content">
                                            <div class="row items-push text-center">
                                                <div class="col-xs-6">
                                                    <div class="push-5"><i class="glyphicon glyphicon-shopping-cart fa-2x"></i></div>
                                                    <div class="h5 font-w300 text-muted">
                                                        Product(s)
                                                        <br>
                                                        {{ $pendingSalesProducts }}
                                                     </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="push-5"><i class="si si-wallet fa-2x"></i></div>
                                                    <div class="h5 font-w300 text-muted">
                                                        {{ Session::get('shopCurrency') }} <br>
                                                        {{  number_format($pendingSalesAmt,2) }} 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <a class="block block-link-hover3" href="javascript:void(0)">
                                        {{-- <div class="block-content block-content-full text-center">
                                            <div>
                                                <img class="img-avatar img-avatar96" src="assets/img/avatars/avatar14.jpg" alt="">
                                            </div>
                                            <div class="h5 push-15-t push-5">Adam Hall</div>
                                        </div> --}}
                                        <div class="block-content block-content-mini block-content-full bg-info">
                                            <div class="text-center text-white-op">Others</div>
                                        </div>
                                        <div class="block-content">
                                            <div class="row items-push text-center">
                                                <div class="col-xs-6">
                                                    <div class="push-5"><i class="glyphicon glyphicon-shopping-cart fa-2x"></i></div>
                                                    <div class="h5 font-w300 text-muted"> 
                                                        Product(s)
                                                        <br>
                                                        {{ $otherSalesProducts }}
                                                     </div>
                                                  
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="push-5"><i class="si si-wallet fa-2x"></i></div>
                                                    <div class="h5 font-w300 text-muted"> 
                                                        {{ Session::get('shopCurrency') }} 
                                                        <br> 
                                                        {{  number_format( $otherSalesAmt,2) }} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            


                            {{-- <div class="col-sm-6 col-lg-3">
                                <a class="block block-rounded block-link-hover3 text-center" href="javascript:void(0)">
                                    <div class="block-content block-content-full bg-success">
                                        <div class="h1 font-w700 text-white"><span class="h2 text-white-op">$</span> 2.980,00</div>
                                        <div class="h5 text-white-op text-uppercase push-5-t">Earnings</div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini">
                                        <i class="fa fa-arrow-up text-success"></i> +90% This week
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a class="block block-rounded block-link-hover3 text-center" href="javascript:void(0)">
                                    <div class="block-content block-content-full bg-danger">
                                        <div class="h1 font-w700 text-white">18.800</div>
                                        <div class="h5 text-white-op text-uppercase push-5-t">Downloads</div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini">
                                        <i class="fa fa-arrow-down text-danger"></i> -5% This week
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a class="block block-rounded block-link-hover3 text-center" href="javascript:void(0)">
                                    <div class="block-content block-content-full bg-warning">
                                        <div class="h1 font-w700 text-white"><span class="h2 text-white-op">+</span> 360</div>
                                        <div class="h5 text-white-op text-uppercase push-5-t">Sales</div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini">
                                        <i class="fa fa-chevron-up text-warning"></i> +10% This week
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a class="block block-rounded block-link-hover3 text-center" href="javascript:void(0)">
                                    <div class="block-content block-content-full bg-info">
                                        <div class="h1 font-w700 text-white"><span class="h2 text-white-op">+</span> 320</div>
                                        <div class="h5 text-white-op text-uppercase push-5-t">Users</div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini">
                                        <i class="fa fa-chevron-down text-info"></i> -2% This week
                                    </div>
                                </a>
                            </div> --}}
                    </div>
               </div>
            </div>

               
               
                <!-- END Stats -->

                <!-- Page Content -->
                <div class="content animated fadeInLeft">
                   
                    <div class="row">
                             <div class="col-md-12">
                                <div class="block">
                                    <div class="block-content">
                    
                        <table class="table table-bordered table-striped" id="order_report" data-order='[[ 0, "desc" ]]'>
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Order</th>
                                                <th class="text-center">Purchased</th>
                                                <th class="text-center">Deliver to</th>
                                                <th class="text-center">Total</th>
                                                {{-- <th class="text-center">Action</th> --}}
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
                                                          
                                                          <p class="label label-warning"><i class="fa fa-times-circle"> &nbsp Cancelled</i></p>
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
                                                          
                                                          <td> {{ Session::get('shopCurrency') }} <?php 
                                                          $totalamount = $row['totalamount'];
                                                          echo $totalamount = number_format($totalamount, 2);
                                                          
                                                            ?><br/>
                                                              <?php echo $row['payment_method'];?>
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
            <!-- END Main Container -->
@endsection