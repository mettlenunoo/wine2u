@extends('admin.layout.app')
@section('content')


<!-- Main Container -->
<main id="main-container">


    <!-- Page Header -->
    <div class="content bg-gray-lighter visibility-hidden" data-toggle="appear" data-class="animated bounceIn">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Add Food Pairing <small>Fill the forms below</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Product</li>
                    <li><a class="link-effect" href="/admin/product/">All Products</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    @include('admin.message')


    <!-- Page Content -->
    <div class="content animated fadeInLeft">
        <div class="row">

            <div class="col-md-12">

                <div class="block">
                    <div class="block-content">
                        <div class="form-horizontal">
                            {!! Form::open(['action' => ['FoodPairingProductController@store'], 'method' => 'POST','class'=> 'form-horizontal push-10-t']) !!}
                            <div class="form-group">
                                <label class="col-xs-12" for="example-select">Select Food Pairing</label>
                                <div class="col-sm-12">
                                    <select class="js-select2 form-control" id="example2-select2" style="width: 100%;"
                                        data-placeholder="Choose many.." multiple name="food_pairing_id[]" required="">
                                        <option disabled>None</option>
                                        @foreach($pairs as $item)
                                        <option value="{{$item->id}}" >{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12" for="example-select">Select Wine</label>
                                <div class="col-sm-12">
                                    <select class="js-select2 form-control" id="example2-select2" style="width: 100%;"
                                        data-placeholder="Choose many.." multiple name="product_id[]" required="">
                                        <option disabled>None</option>
                                        @foreach($products as $item)
                                        <option value="{{$item->id}}" >{{$item->product_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- post btn here -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <button class="btn btn-sm btn-primary  pull-right" type="submit" name="submit"
                            id="sub_btn">Publish</button>
                    </div>
                </div>

                {!! Form::close() !!}

                <br>
                <br>
                <br>
                <br>

                <div class="col-md-12">

                    <!-- Normal Form -->
                    <div class="block">
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->

                            <table class="table table-bordered table-striped " id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 20%;">Food Pairing</th>
                                        <th class="text-center">Wine</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @isset($mainPairings)
                                    @foreach ($mainPairings as $pair)
                                    <tr>
                                        @isset($pair['category'])


                                        <td class="text-center">{{ $pair['category'] }}</td>
                                        @else
                                        <td class="text-center">No Data</td>
                                        @endisset



                                        @isset($pair['name'] )


                                        <td class="text-center">{{ $pair['name'] }}</td>
                                        @else
                                        <td class="text-center">No Data</td>
                                        @endisset



                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/admin/food/pairing/{{ $pair['id'] }}/edit"
                                                    class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                                    title="Edit"><i class="fa fa-pencil"></i></a>
                                                {!! Form::open(['action' => ['FoodPairingProductController@destroy', $pair['id'] ],
                                                'method' => 'POST']) !!}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                    onClick="return confirm('Are you sure You want to Delete')"
                                                    class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                                    title="Remove"><i class="fa fa-times"></i></button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else

                                    <tr>

                                        <td class="text-center">No Data</td>







                                        <td class="text-center">No Data</td>




                                        {{-- <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/admin/food/pairing/edit"
                                                    class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                                    title="Edit"><i class="fa fa-pencil"></i></a>
                                                {!! Form::open(['action' => ['FoodPairingController@destroy', ],
                                                'method' => 'POST']) !!}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                    onClick="return confirm('Are you sure You want to Delete')"
                                                    class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                                    title="Remove"><i class="fa fa-times"></i></button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td> --}}
                                    </tr>
                                    @endisset





                                    {{-- @foreach ($pairs as $row)
                                    @if($row->parent == $item->id)
                                    <tr>
                                        <td class="text-center"> <span aria-hidden="true">—</span> {{ $row->title }}</td>

                                        <td class="text-center">{{ $row->slug }}</td>


                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/admin/food/pairing/{{ $row->id }}/edit"
                                                    class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                                    title="Edit"><i class="fa fa-pencil"></i></a>

                                                {!! Form::open(['action' => ['FoodPairingController@destroy', $row->id ],
                                                'method' => 'POST']) !!}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                    onClick="return confirm('Are you sure You want to Delete')"
                                                    class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                                    title="Remove"><i class="fa fa-times"></i></button>
                                                {!! Form::close() !!}

                                            </div>
                                        </td>
                                    </tr>
                                    @endif

                                    @endforeach --}}







                                </tbody>
                            </table>





                            <!-- #####################    END OF INSER STATEMENT ##################################################################################################################################################################################################################################-->

                        </div>
                    </div>
                </div>





                <!-- #####################    END OF INSER STATEMENT ##################################################################################################################################################################################################################################-->

            </div>
        </div>
    </div>
    </div>

    <!-- END Page Content -->
</main>
<!-- END Main Container -->


@endsection
