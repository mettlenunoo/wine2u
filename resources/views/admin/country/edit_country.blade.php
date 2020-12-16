@extends('admin.layout.app')
@section('content')

            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->

                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                               Edit country
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>country</li>
                                <li><a class="link-effect" href="/admin/country">All country</a></li>
                            </ol>
                        </div>
                    </div>
                </div>

                @include('admin.message')
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content animated fadeInLeft">
                    <div class="row">
                         <div class="col-md-8">
                            <!-- Default Elements -->
                            <div class="block">
                               
                    <div class="block-content">

                      {!! Form::open(['action' => ['countryController@update', $country->id ], 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t']) !!}
                                        
                     <div class="form-group">
                       <label class="col-xs-12" for="example-text-input">Title</label>
                        <div class="col-sm-12">
                          <input class="form-control" type="text" id="title" name="title" placeholder="country Title" value="{{ $country->name }}" required>
                        </div>
                     </div>
                 
            <div class="form-group">
                 <div class=" block-content-full">
                        <label class="col-xs-12" for="example-text-input">Content</label>
                                    <!-- Summernote Container -->
                        <textarea class="js-summernote" name="content">{!! $country->content !!}</textarea>
                                    
                 </div>
            </div>
    <br>
           
   
                                   
    </div>
</div>
                        </div>
                     <div class="col-md-4">

                        <div class="block">
                            <!-- featured image here -->
                              <div class="block-content">
                                  <div class="form-group">
                                       <label class="" for="example-file-input">Flag</label>
                                       <input type="file" id="imageupload" name="flag" >  
                                       <div id="preview-image"><img src="{{ asset('country/'.$country->flag) }}" class="thumbimage"></div>
                                  </div>
                              </div>
          
                          </div>
  

                        <div class="block">
                         
                            <div class="block-content">
                                <div class="form-group">
                                     <label class="" for="example-file-input">Feature Image</label>
                                     <input type="file"  name="banner" >  
                                     <div id="preview-image"><img src="{{ asset('country/'.$country->banner) }}" class="thumbimage"></div>
                                     
                                </div>
                            </div>
        
                        </div>



       <div class="block">        
         <div class="block-content">
           <div class="form-horizontal">                      
           
            <div class="form-group">
                 <label class="col-xs-12" for="example-select">Visibility</label>
                  <div class="col-sm-12">
                    <select class="form-control" id="datepicker" name="visibility" size="1">
                        <option @if($country->visibility == "Public")  selected  @endif value="Public">Public</option>
                        <option @if($country->visibility == "Private")  selected  @endif value="Private">Private</option>
                    </select>
                  </div>
             </div>

             <div class="form-group">
                    <label class="col-xs-12" for="example-select">Publish</label>
                     <div class="col-sm-12">
                            <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" value="{{ $country->publish }}" name="publish" />
                            <input type='hidden' class="form-control" id="publish" value="{{ $country->publish }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                     </div>
            </div>
                               
           </div>
          </div>
        </div>

                 <!-- post btn here --> 
                 <div class="form-group">
                  <div class="col-xs-12">
                          {{ Form::hidden('_method','PUT')}}
                          <a href="/admin/country" class="btn btn-secondary">Back</a>
                          {{ Form::submit('Update',['class'=>'btn btn-danger'] ) }}
  
                      {{-- <button class="btn btn-sm btn-primary" type="submit" name="submit">Update Category</button> --}}
                   </div>
              </div>
              
              <input type="hidden" name="parent"  value="0" required="">  
     {!! Form::close() !!}
     
        </div>
    </div>
    </div>
</div>

                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            @endsection
        