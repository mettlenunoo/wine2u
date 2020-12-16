@extends('admin.layout.app')
@section('content')


          <!-- Main Container -->
            <main id="main-container">
              


                <!-- For animations -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                        <div class="row items-push">
                            <div class="col-sm-7">
                                <h1 class="page-heading">
                                        Edit 
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
     {!! Form::open(['action' => ['shippingCountryController@update', $country->id ], 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t']) !!}           
            <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                        <input class="form-control" type="text" id="material-text2" name="country" value="{{$country->country}}" required >
                            <label for="material-text2">Enter  Country</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="text" id="material-text2" name="code"  value="{{$country->code}}" required >
                            <label for="material-text2">Enter  Country Code</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="zone" size="1" required>
                                   
                                    <option  @if($country->zone == 1)  selected @endif value="1">Zone 1</option>
                                    <option  @if($country->zone == 2)  selected @endif value="2">Zone 2</option>
                                    <option  @if($country->zone == 3)  selected @endif  value="3">Zone 3</option>
                                    <option  @if($country->zone == 4)  selected @endif value="4">Zone 4</option>
                                    <option  @if($country->zone == 5)  selected @endif value="5">Zone 5</option>
                                    <option  @if($country->zone == 6)  selected @endif value="6">Zone 6</option>
                                    <option  @if($country->zone == 7)  selected @endif value="7">Zone 7</option>
                                    <option  @if($country->zone == 8)  selected @endif value="8">Zone 8</option>
                                  
                            </select>
                            <label for="material-select2">Select Country Zone</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="type" size="1" required>
                                    <option  @if($country->type == "Domestic")  selected @endif value="Domestic">Domestic</option>
                                    <option  @if($country->type == "International")  selected @endif value="International">International</option>
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
                                <option  @if($country->publish == "Yes")  selected @endif value="Yes">Yes</option>
                                <option  @if($country->publish == "No")  selected @endif value="No">No</option>
                            </select>
                            <label for="material-select2">Publish</label>
                        </div>
                    </div>
             </div>

            
            <div class="form-group">
                <div class="col-xs-12">
                        {{ Form::hidden('_method','PUT')}}
                        <a href="/admin/shipping/country" class="btn btn-secondary">Back</a>
                        {{ Form::submit('Update',['class'=>'btn btn-danger'] ) }}
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
               
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->


@endsection
    