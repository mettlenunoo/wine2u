@extends('admin.layout.app')
@section('content')


          <!-- Main Container -->
            <main id="main-container">

                    <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                            <div class="row items-push">
                                <div class="col-sm-7">
                                    <h1 class="page-heading">
                                            Shipping Countries 
                                    </h1>
                                </div>
                                <div class="col-sm-5 text-right hidden-xs">
                                    {{-- <ol class="breadcrumb push-10-t">
                                        
                                        <li><a class="link-effect" href="/admin/slider">All Sliders</a></li>
                                    </ol> --}}
                                </div>
                            </div>
                           
                    </div>
        
                {{-- MESSAGE --}}
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
    
        {!! Form::open(['action' => 'shippingCountryController@store', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
           
            <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="text" id="material-text2" name="country" required >
                            <label for="material-text2">Enter  Country</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="text" id="material-text2" name="code" required >
                            <label for="material-text2">Enter  Country Code</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="zone" size="1" required>
                                   
                                    <option value="1">Zone 1</option>
                                    <option value="2">Zone 2</option>
                                    <option value="3">Zone 3</option>
                                    <option value="4">Zone 4</option>
                                    <option value="5">Zone 5</option>
                                    <option value="6">Zone 6</option>
                                    <option value="7">Zone 7</option>
                                    <option value="8">Zone 8</option>
                                  
                            </select>
                            <label for="material-select2">Select Country Zone</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="type" size="1" required>
                                    
                                     <option value="Domestic">Domestic</option>
                                    <option value="International">International</option>

                            </select>
                            <label for="material-select2">Type</label>
                        </div>
                    </div>
             </div>


             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="publish" size="1" required>
                                <option></option><!-- Empty value for demostrating material select box -->
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <label for="material-select2">Publish</label>
                        </div>
                    </div>
             </div>

            
            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-primary" type="submit" name="submit">Save</button>
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#countryFromExcel">Import From Excel</button>

                </div>
            </div>

        {!! Form::close() !!}
        </div>
    </div>
    <!-- END Default Elements -->
                        </div>
                        <div class="col-md-8">
                         
                                <div class="alert alert-info alert-dismissible">
                                        {!! Form::open(['action' => 'shippingCountryController@destroyAll', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
                                        {{-- {{ method_field('DELETE') }} --}}
                                        {{-- <a href="#" class="close" data-dismiss="alert" aria-label="close"></a> --}}
                                         <strong>Sometext goes here <a href="#">Delete All</a></strong> 
                                         <button type="submit" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i> Delete All</button> 
                                        {!! Form::close() !!}
                                </div>

                            <!-- Normal Form -->
                            <div class="block">
                                <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->

                            <table class="table table-bordered table-striped js-dataTable-full" id="myTable">
                                <thead>
                                    
                                    <tr>
                                        <th class="text-center">Country</th>
                                        <th class="text-center" >Code</th>
                                        <th class="text-center">Zone</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>

                                </thead>
                                <tbody>
                                   
                                 @foreach ($countries as $item)
                                     <tr>   
                                            <td class="text-center">{{ $item->country }}</td>
                                            <td class="text-center">{{ $item->code }}</td>
                                            <td class="text-center">{{ $item->zone }}</td>
                                            <td class="text-center">{{ $item->type }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="/admin/shipping/country/{{ $item->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    {!! Form::open(['action' => ['shippingCountryController@destroy', $item->id ], 'method' => 'POST']) !!}
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

                 <!-- Modal -->
    <div class="modal fade" id="countryFromExcel" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Import Shipping Countries From Excel </h4>
                </div>
                <div class="modal-body">
                <p>Some text in the modal. <a href="{{ asset('files/shipping Countries sample.csv') }}" download> Download a template </a></p>
                {!! Form::open(['action' => 'shippingCountryController@importfromexcel', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
           
                <div class="form-group">
                        <div class="col-sm-12">
                            <div class="">
                                <input class="form-control" type="file" name="country" onchange='triggerValidation(this)' accept=".csv" required />
                            </div>
                        </div>
                </div>

                <div class="radio">
                     <label><input type="radio" name="type" checked value="Domestic">Domestic</label>
                     <label><input type="radio" name="type" value="International">International</label>
                </div>
        
                </div>
                <div class="modal-footer">
                      <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-primary" type="submit" name="submit" id="import">Import</button>
                                <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal">Close</button>
                            </div>
                      </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
               
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->


@endsection
    