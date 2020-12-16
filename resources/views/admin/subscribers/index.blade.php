@extends('admin.layout.app')
@section('content')
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Subscribers 
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Subscribers</li>
                                <li><a class="link-effect" href="">All Subscribers</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content visibility-hidden" data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                    <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header">
                            {{-- <h3 class="block-title">Dynamic Table <small>Full</small></h3> --}}
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
										<th class="text-center">First name</th>
                                        <th class="text-center">Second Name</th>
                                        <th class="text-center">Email</th>
                                        {{-- <th class="text-center">Contact</th> --}}
                                        <th class="text-center">Date</th>
										<th class="text-center">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  foreach ($subscribers as $key => $row) : ?>
                                    <tr>
                                        <td class="text-center">{{ $row->fname }}</td>
                                        <td class="text-center"> {{ $row->sname }} </td>
                                        <td class="text-center">  {{ $row->email }} </td>
                                        <td class="text-center">  {{ $row->created_at }} </td>
									
                                        <td class="text-center">
                                            <div class="btn-group">
                                                {{-- <a href="/admin/subscriber/{{ $row->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a> --}}

                                                {!! Form::open(['action' => ['subscriberController@destroy', $row->id ], 'method' => 'POST']) !!}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> 
                                                {!! Form::close() !!}

                                            </div>
                                        </td>
                                    </tr>
                                 <?php endforeach; ?>
                                   
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