@extends('admin.layout.app')
@section('content')
            <!-- Main Container -->
            <main id="main-container">

                         
             <!-- Page Header -->
     <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                <div class="row items-push">
                    <div class="col-sm-7">
                        <h1 class="page-heading">
                            All Customers <small>for {{ Session::get('shopName') }}</small>
                        </h1>
                    </div>
                    <div class="col-sm-5 text-right hidden-xs">
                        <ol class="breadcrumb push-10-t">
                            <li>Total </li>
                            <li><a class="link-effect" href="/admin/customers/">{{  count($customers) }} Customer(s)</a></li>
                        </ol>
                    </div>
                </div>
        </div>
      <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content animated fadeInLeft">
                   
                    <div class="row">
                             <div class="col-md-12">
                                <div class="block">
                                    <div class="block-content">
                    
                        <table class="table table-bordered table-striped js-dataTable-full">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Fullname</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Phone Number</th>
                                                <th class="text-center">Location</th>
                                                <th class="text-center">Address</th>
                                                <th class="text-center">Order(s)</th>
                                                <th class="text-center">Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                               
                                               @foreach ($customers as $key => $customer):
                                                
                                                      <tr >
                                                  
                                                          <td >

                                                            {{ ucwords($customer->fname." ".$customer->lname)  }}
                                                        
                                                          </td>

                                                          <td >

                                                            {{ $customer->email  }}
                                                        
                                                          </td>

                                                          <td >

                                                            {{ $customer->phone  }}
                                                        
                                                          </td>
                                                          
                                                          <td>

                                                              Country : {{ $customer->country  }}  <br>
                                                              Apartment : {{ $customer->apartment  }}  <br>
                                                              City : {{ $customer->city  }}  <br>
                                                              State : {{ $customer->state  }}  <br>
                                                              Zip : {{ $customer->zip  }}  

                                                          </td>
                                                          
                                                          <td> 
                                                            {{ $customer->address  }}
                                                          </td>

                                                          <td> 
                                                            {{ count($customer->orders)  }}
                                                          </td>
                                                          
                                                          <td>
                                                      
                                                             <a href="/admin/customer/order/{{ $customer->id }}"> <button class="btn btn-success push-5-r push-10"  data-toggle="tooltip" data-placement="top" title="View Client's Order(s)"><i class="glyphicon glyphicon-th-list"></i></button></a>
                                                      
                                                          </td>
                                                      </tr>

                                                    @endforeach
                                                          
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