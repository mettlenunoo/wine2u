@extends('admin.layout.app')
@section('content')

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
			 
					 <!-- For animations -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Payment Gateway 
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                
                                <li><a class="link-effect" href="/admin/paymet-gateway">All </a></li>
                            </ol>
                        </div>
                    </div>
                   
                </div>

                 {{-- MESSAGE --}}
                 @include('admin.message')

                
			
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content content-narrow">
				   <!-- For animations -->
					 <div class="block visibility-hidden"  data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                                <div class="block-content block-content-narrow">
                                        {!! Form::open(['action' => 'PaymentGatewayController@store', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
                                       
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-text2" name="name" placeholder="Rave" required >
                                                        <label for="material-text2">Enter Name</label>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-text2" name="public_key"  >
                                                        <label for="material-text2">Public Api Key</label>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-text2" name="secret_key"  >
                                                        <label for="material-text2">secret Api Key</label>
                                                    </div>
                                                </div>
                                            </div>
                                              
                                         
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-email2" name="currency" placeholder="GHS" required>
                                                        <label for="material-email2">Currency</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material floating">
                                                        <textarea class="form-control"  id="material-email2" name="url" ></textarea>
                                                        <label for="material-email2">Url</label>
                                                    </div>
                                                </div>
                                            </div>

                                          
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <select class="form-control" id="material-select2" name="status" size="1" required>
                                                            <option></option><!-- Empty value for demostrating material select box -->
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                        <label for="material-select2">Status</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-xs-12" for="example-file-input">File Input</label>
                                                <div class="col-xs-12">
                                                    <div class="fileupload add-new-plus">
                                                         <input id="imageupload" type="file" name="logo" >
                                                    </div>
                                                  <div id="preview-image"></div>
                                                </div>
                                            </div>
    
                                            <div class="form-group text-right m-b-0 visibility-hidden" data-toggle="appear" data-class="animated bounceIn">
                                                <button class="btn btn-sm btn-primary " type="submit"  name="submit">Publish</button>
                                            </div>
                                </div>
                            </div>
                            <!-- END Floating Labels -->
                     {!! Form::close() !!}
            </main>

@endsection
       