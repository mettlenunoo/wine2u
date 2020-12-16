@extends('admin.layout.app')
@section('content')
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Country
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Country</li>
                                <li><a class="link-effect" href="/admin/country/create">Add Country</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content visibility-hidden" data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                    <div class="block">
                        <div class="block-header">
                        </div>
                        <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
										<th class="text-center">Flag</th>
                                        <th class="text-center">Country Name</th>
                                        <th class="text-center">Publish On</th>
                                        <th class="text-center">visibility</th>
                                        <th class="text-center">Date</th>
										<th class="text-center">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($countries as $key => $row)
                                    <tr>
                                        @if($row->flag == "")
                                        <td class="text-center"><img src="{{ asset('img/placeholder.png') }}" class="tableimage"></td>
                                        @else
                                        <td class="text-center"><img src="{{ asset('country/'.$row->flag) }}" class="tableimage"></td>
                                        @endif

                                        <td class="text-center"> <b> {{ $row->name }} </b> </td>
                                        <td class="text-center">  {{ $row->publish }} </td>
                                        <td class="text-center">
                                            <span class="text-center">{{ $row->visibility }}</span>
                                        </td>
										 <td class="text-center">
                                            <span class="text-center">{{ $row->created_at }}</span>
                                        </td>
                                        
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/admin/country/{{ $row->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                {!! Form::open(['action' => ['countryController@destroy', $row->id ], 'method' => 'POST']) !!}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> 
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>

                                  @foreach ($row->regions as $key => $region)
                                    <tr>
                                       
                                        <td class="text-center"><img src="{{ asset('country/'.$region->banner) }}" class="tableimage"></td>
                                      

                                        <td class="text-center"> <span aria-hidden="true">—</span> {{ $region->name }} </td>
                                        <td class="text-center">  {{ $region->publish }} </td>
                                        <td class="text-center">
                                            <span class="text-center">{{ $region->visibility }}</span>
                                        </td>
										 <td class="text-center">
                                            <span class="text-center">{{ $region->created_at }}</span>
                                        </td>
                                        
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/admin/country/region/{{ $region->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                {!! Form::open(['action' => ['countryController@destroy', $region->id ], 'method' => 'POST']) !!}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> 
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach

                                 @endforeach
                                   
                                </tbody>
                            </table>
							
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->

                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

      @endsection