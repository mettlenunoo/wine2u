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
     {!! Form::open(['action' => ['shippingController@update', $rate->id ], 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t']) !!}
            <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                        <input class="form-control" type="number" id="material-text2" name="kg" step=".01" value="{{ $rate->kg }}" required >
                            <label for="material-text2">Kg</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone1" value="{{ $rate->zone1 }}" required >
                            <label for="material-text2">Zone 1</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone2" value="{{ $rate->zone2 }}" required >
                            <label for="material-text2">Zone 2</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone3" value="{{ $rate->zone3 }}" required >
                            <label for="material-text2">Zone 3</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone4" value="{{ $rate->zone4 }}" required >
                            <label for="material-text2">Zone 4</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone5" value="{{ $rate->zone5 }}" required >
                            <label for="material-text2">Zone 5</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone6" value="{{ $rate->zone6 }}" required >
                            <label for="material-text2">Zone 6</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone7" value="{{ $rate->zone7 }}" required >
                            <label for="material-text2">Zone 7</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="number" id="material-text2" step=".01" name="zone8" value="{{ $rate->zone8 }}" required >
                            <label for="material-text2">Zone 8</label>
                        </div>
                    </div>
             </div>


             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="type" size="1" required>
                                <option></option><!-- Empty value for demostrating material select box -->
                                <option @if($rate->type == "Domestic")  selected  @endif value="Domestic">Domestic</option>
                                <option  @if($rate->type == "International")  selected  @endif value="International">International</option>
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
                                <option @if($rate->publish == "Yes")  selected  @endif value="Yes">Yes</option>
                                <option @if($rate->publish == "No")  selected  @endif value="No">No</option>
                            </select>
                            <label for="material-select2">Publish</label>
                        </div>
                    </div>
             </div>

           
                                     
            <div class="form-group">
                <div class="col-xs-12">
                        {{ Form::hidden('_method','PUT')}}
                        <a href="/admin/shipping/rate" class="btn btn-secondary">Back</a>
                        {{ Form::submit('Update',['class'=>'btn btn-danger'] ) }}
                    {{-- <button class="btn btn-sm btn-primary" type="submit" name="submit">Save</button> --}}
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

                <!-- Page Content -->
               
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->


@endsection
    