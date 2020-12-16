@extends('admin.layout.app')
@section('content')


          <!-- Main Container -->
            <main id="main-container">
              
                 <!-- Page Header -->
             <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                    Add  a Coupon 
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Coupon</li>
                                <li><a class="link-effect" href="/admin/coupon">All Coupons</a></li>
                            </ol>
                        </div>
                    </div>
            </div>
          <!-- END Page Header -->
              
                @include('admin.message')

                    <div class="content animated fadeInLeft">
                        <div class="row">
                        <div class="col-md-4">
                            <!-- Default Elements -->
                            <div class="block">
                                {{-- <div class="block-header">
                                    <h3 class="title">Add New Product Category</h3>
                                <p> Product categories for your store can be managed here.</p>
                                </div> --}}
          <div class="block-content block-content-narrow">
        {!! Form::open(['action' => 'couponController@store', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
            <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="text" id="material-text2" name="title" required >
                            <label for="material-text2">Enter  Title</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material floating">
                        <input class="form-control" type="text" id="material-text2" name="code" required >
                        <label for="material-text2">Coupon Code</label>
                    </div>
                </div>
            </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="type" size="1" required>
                                   
                                    <option >None</option><!-- Empty value for demostrating material select box -->
                                    <option value="fixed">Fixed</option>
                                    <option value="percentage">Percentage Off</option>
                                    <option value="free shipping">Free Shipping</option>
                                   
                            </select>
                            <label for="material-select2">Coupon Type</label>
                        </div>
                    </div>
             </div>


             <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material floating">
                        <input class="form-control" type="text" id="material-text2" name="amt"  value="0" >
                        <label for="material-text2">Fixed Amount</label>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material floating">
                        <input class="form-control" type="text" id="material-text2" name="percentange" value="0" >
                        <label for="material-text2">Percentage Off</label>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material floating">
                        <input class="form-control" type="number" id="material-text2" name="usage" min="1"  required >
                        <label for="material-text2">Usage</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material floating">
                        <input class="form-control" type="date" id="material-text2" name="valid_date"  required >
                        <label for="material-text2">Valid Date</label>
                    </div>
                </div>
            </div>


            
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material floating">
                        <input class="form-control" type="date" id="material-text2" name="end_date" required >
                        <label for="material-text2">End  Date</label>
                    </div>
                </div>
            </div>


             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="status" size="1" required>
                                <option></option><!-- Empty value for demostrating material select box -->
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <label for="material-select2">Publish</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                            <label for="material-text2">Coupon Description. If any</label>
                        <div class="form-material floating">
                            <textarea class="form-control" id="example-textarea-input" name="content" rows="6" placeholder="Content.."></textarea>
                        </div>
                    </div>
             </div>

                                     
            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-primary" type="submit" name="submit" id="sub_btn" >Save</button>
                </div>
            </div>
       
        {!! Form::close() !!}
        </div>
    </div>
    <!-- END Default Elements -->
                        </div>
                        <div class="col-md-8">
                            <!-- Normal Form -->
                            <div class="block">
                                <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->

                            <table class="table table-bordered table-striped js-dataTable-full" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Code</th>
                                        <th class="text-center">Used</th>
                                        <th class="text-center">Created at</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    @foreach ($coupons as $item)
                                        <tr>    
                                                <td class="text-center">{{ $item->id }}</td>
                                                <td class="text-center">{{ $item->title }}</td>
                                                <td class="text-center">{{ $item->code }}</td>
                                                <td class="text-center">{{ $item->total_used . " out  of " . $item->usage }}</td>
                                                <td class="text-center">{{ $item->created_at }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                    <a href="/admin/coupon/{{ $item->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    {!! Form::open(['action' => ['couponController@destroy', $item->id ], 'method' => 'POST']) !!}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> 
                                                    {!! Form::close() !!}
                                                    </div>
                                                </td>
                                        </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                            </div>
                            <!-- END Normal Form -->

                           
                        </div>
                    </div>
                    </div>
                <!--  -->

                <!-- Page Content -->
               
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

         


@endsection


    