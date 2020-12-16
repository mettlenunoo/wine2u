@extends('admin.layout.app')
@section('content')
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Blog
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>BLog</li>
                                <li><a class="link-effect" href="/admin/blog/create">Add Blog</a></li>
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
										<th class="text-center">Image</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Publish On</th>
                                        <th class="text-center">visibility</th>
                                        <th class="text-center">Date</th>
										<th class="text-center">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  foreach ($blogs as $key => $row) : ?>
                                    <tr>
                                        @if($row->pic == "")
                                        <td class="text-center"><img src="{{ asset('img/placeholder.png') }}" class="tableimage"></td>
                                        @else
                                        <td class="text-center"><img src="{{ asset('blog_images/'.$row->pic) }}" class="tableimage"></td>
                                        @endif

                                        <td class="text-center"> {{ $row->title }} </td>
                                        <td class="text-center">  {{ $row->publish }} </td>
                                        <td class="text-center">
                                            <span class="text-center">{{ $row->visibility }}</span>
                                        </td>
										 <td class="text-center">
                                            <span class="text-center">{{ $row->created_at }}</span>
                                        </td>
                                        
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/admin/blog/{{ $row->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                {!! Form::open(['action' => ['blogController@destroy', $row->id ], 'method' => 'POST']) !!}
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