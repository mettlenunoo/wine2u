@extends('admin.layout.app')
@section('content')
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Payment Gateway 
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Payment Gateway</li>
                                <li><a class="link-effect" href="/admin/payment-gateway/create">Add New</a></li>
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
                           
                        </div>
                        <div class="block-content">
                           
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
										<th class="text-center">Logo</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Url</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Publish</th>
										<th class="text-center">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($paymentGateways as $key => $paymentGateway)

                                        <tr>
                                            <td class="text-center"><img src="{{ $paymentGateway->logo }}" height="50px" width="50px"> </td>
                                            <td class="text-center"> {{ $paymentGateway->name }} </td>
                                            <td class="text-center">  {{ $paymentGateway->url }} </td>
                                            <td class="text-center">  {{ $paymentGateway->created_at }} </td>
                                          
                                            <td class="text-center">
                                                <span class="label label-primary">{{ $paymentGateway->status }}</span>
                                            </td>

                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="/admin/payment-gateway/{{ $paymentGateway->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>

                                                    {!! Form::open(['action' => ['PaymentGatewayController@destroy', $paymentGateway->id ], 'method' => 'POST']) !!}
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
                    <!-- END Dynamic Table Full -->

                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

      @endsection