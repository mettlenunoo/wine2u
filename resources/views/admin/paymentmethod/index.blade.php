@extends('admin.layout.app')
@section('content')

            <!-- Main Container -->
            <main id="main-container">
              
                <div class="content">
                    <div class="row items-push">
                        <div class="col-sm-12">
                            <h1 class="page-heading">
                              Payment Method
                            </h1>
                        </div>
    
                    </div>
                     {{-- MESSAGE --}}
                     @include('admin.message')
                </div>

                <!--  -->
                    <div class="content">
                        <div class="row">
                        <div class="col-md-8">
                            <!-- Default Elements -->
                            <div class="block">
                               
          <div class="block-content block-content-narrow">
           
        {!! Form::open(['action' => 'paymentMethodController@store', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
            
            <label class="col-xs-12" for="example-text-input">Rave Payment</label>             
             <div class="form-group">

                 <div class="col-sm-7">
                      <label class="col-xs-12" for="example-text-input">Api</label>
                      <input class="form-control" type="test" id="" name="rave_api_key"  placeholder="Api Key"  >
                 </div>
                <div class="col-sm-5">
                    <label class="col-xs-6" for="example-text-input">Accept
                        <input class="" type="radio"  name="rave" checked value="Yes">
                    </label>
                    <label class="col-xs-6" for="example-text-input">No
                        <input class="" type="radio"name="rave" value="No">
                    </label>
                </div>
            </div>

            <label class="col-xs-12" for="example-text-input">Paypal</label>             
             <div class="form-group">

                 <div class="col-sm-7">
                      <label class="col-xs-12" for="example-text-input">Api</label>
                      <input class="form-control" type="test" id="" name="paypal_api_key"  placeholder="Api Key"  >
                 </div>
                <div class="col-sm-5">
                    <label class="col-xs-6" for="example-text-input">Accept
                        <input class="" type="radio" checked name="paypal" value="Yes">
                    </label>
                    <label class="col-xs-6" for="example-text-input">No
                        <input class="" type="radio"name="paypal" value="No">
                    </label>
                </div>
            </div>

            <label class="col-xs-12" for="example-text-input">Cash on Delivery</label>             
            <div class="form-group">

               <div class="col-sm-5">
                   <label class="col-xs-6" for="example-text-input">Accept
                       <input class="" type="radio" checked  name="cash" value="Yes">
                   </label>
                   <label class="col-xs-6" for="example-text-input">No
                       <input class="" type="radio"name="cash" value="No">
                   </label>
               </div>

           </div>

                                    
        <div class="form-group">
        <div class="col-xs-12">
            <button class="btn btn-sm btn-primary" type="submit" name="update">Publish</button>
        </div>
        </div>

        {!! Form::close() !!}

            </div>
          </div>
           <!-- END Default Elements -->
        </div>
    </div>
</div>
                <!--  -->

                <!-- Page Content -->
               
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
    @endsection
