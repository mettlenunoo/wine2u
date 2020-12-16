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
                                Ads
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                
                                <li><a class="link-effect" href="/admin/ads">All Ads</a></li>
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
                                        {!! Form::open(['action' => 'adsController@store', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
                                       
                                        <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-text2" name="title" required >
                                                        <label for="material-text2">Enter Ads Title</label>
                                                    </div>
                                                </div>
                                            </div>
                                              
                                         
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-email2" name="link" >
                                                        <label for="material-email2">Link</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material floating">
                                                        <select class="form-control" id="material-select2" name="page" size="1" required>
                                                            <option></option><!-- Empty value for demostrating material select box -->
                                                            <option value="home">Home</option>
                                                            <option value="products">Products</option>
                                                            <option value="others">Others</option>
                                                        </select>
                                                        <label for="material-email2">Page</label>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <select class="form-control" id="material-select2" name="publish" size="1" required>
                                                            <option></option><!-- Empty value for demostrating material select box -->
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                        <label for="material-select2">Publish</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-xs-12" for="example-file-input">File Input</label>
                                                <div class="col-xs-12">
                                                    <div class="fileupload add-new-plus">
                                                         <input id="imageupload" type="file" name="pic" required>
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
       