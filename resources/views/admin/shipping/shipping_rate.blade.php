@extends('admin.layout.app')
@section('content')


          <!-- Main Container -->
            <main id="main-container">
              
               
					 <!-- For animations -->
                     <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                            <div class="row items-push">
                                <div class="col-sm-7">
                                    <h1 class="page-heading">
                                        Shipping Rate
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
        

                <!--  -->
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
    
        {!! Form::open(['action' => 'shippingController@store', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
            <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" name="kg" step=".01" required >
                            <label for="material-text2">Kg</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone1" required >
                            <label for="material-text2">Zone 1</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone2" required >
                            <label for="material-text2">Zone 2</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone3" required >
                            <label for="material-text2">Zone 3</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone4" required >
                            <label for="material-text2">Zone 4</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone5" required >
                            <label for="material-text2">Zone 5</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone6" required >
                            <label for="material-text2">Zone 6</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone7" required >
                            <label for="material-text2">Zone 7</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone8" required >
                            <label for="material-text2">Zone 8</label>
                        </div>
                    </div>
             </div>


             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="type" size="1" required>
                                <option></option><!-- Empty value for demostrating material select box -->
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
                                        {!! Form::open(['action' => 'shippingController@deleteAll', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
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

                                        <th class="text-center">Kg</th>
                                        <th>Zone(s)</th>
                                        <th class="hidden-xs">Type</th>
                                        <th class="hidden-xs">Date</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                   
                                 @foreach ($rates as $item)
                                     <tr>   
                            
                                            <td class="text-center">{{ $item->kg }}</td>
                                            <td class="text-center">
                                                {{ "Zone 1-GHc ".$item->zone1 ."| Zone 2- GHc".$item->zone2 ."| Zone 3 - GHc".$item->zone3 ."| Zone 4".$item->zone4 ."| Zone 5".$item->zone5 ."| Zone 6 ".$item->zone6 ."| Zone 7 ".$item->zone7 ."| Zone 8 ".$item->zone8 }}
                                            </td>
                                            <td class="text-center">{{ $item->type }}</td>
                                            <td class="text-center">{{ $item->created_at }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                <a href="/admin/shipping/rate/{{ $item->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>

                                                {!! Form::open(['action' => ['shippingController@destroy', $item->id ], 'method' => 'POST']) !!}
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
                

                     <!-- Modal -->
    <div class="modal fade" id="countryFromExcel" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Import Shipping Rate From Excel </h4>
                    </div>
                    <div class="modal-body">
                    <p>Some text in the modal. <a href="{{ asset('files/shipping_rates_sample.csv') }}" download> Download a template </a></p>
                    {!! Form::open(['action' => 'shippingController@importfromexcel', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
               
                    <div class="form-group">
                            <div class="col-sm-12">
                                <div class="">
                                    <input class="form-control" type="file" name="rate" onchange='triggerValidation(this)' accept=".csv" required />
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
                   

            </main>
            <!-- END Main Container -->


@endsection
    