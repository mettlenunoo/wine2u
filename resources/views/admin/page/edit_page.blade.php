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
                               Edit Page
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Page</li>
                                <li><a class="link-effect" href="/admin/page">All Page</a></li>
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

                      {!! Form::open(['action' => ['pageController@update', $pg->id ], 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t']) !!}
                                        
                     <div class="form-group">
                       <label class="col-xs-12" for="example-text-input">Title</label>
                        <div class="col-sm-12">
                          <input class="form-control" type="text" id="title" name="title" placeholder="Page Title" value="{{ $pg->title }}" required>
                        </div>
                     </div>
                 
            <div class="form-group">
                 <div class=" block-content-full">
                        <label class="col-xs-12" for="example-text-input">Content</label>
                                    <!-- Summernote Container -->
                        <textarea class="js-summernote" name="content">{!! $pg->content !!}</textarea>
                                    
                 </div>
            </div>
    <br>
           
   
                                   
    </div>
</div>
                        </div>
                     <div class="col-md-4">

                


                


       <div class="block">        
         <div class="block-content">
           <div class="form-horizontal">                      
             <div class="form-group">
                <label class="col-xs-12" for="example-tags1">Tag</label>
                    <div class="col-xs-12">
                    <input class="js-tags-input form-control" type="text" id="example-tags1" name="tag" value="{{ $pg->tag}}">
                    </div>
                </div>
            <div class="form-group">
                 <label class="col-xs-12" for="example-select">Visibility</label>
                  <div class="col-sm-12">
                    <select class="form-control" id="datepicker" name="visibility" size="1">
                        <option @if($pg->visibility == "Public")  selected  @endif value="Public">Public</option>
                        <option @if($pg->visibility == "Private")  selected  @endif value="Private">Private</option>
                    </select>
                  </div>
             </div>

             <div class="form-group">
                    <label class="col-xs-12" for="example-select">Publish</label>
                     <div class="col-sm-12">
                            <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" value="{{ $pg->publish }}" name="publish" />
                            <input type='hidden' class="form-control" id="publish" value="{{ $pg->publish }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        {{-- <input class="js-datepicker form-control" type="text" id="datepicker" name="publish" > --}}
                     </div>
            </div>

       
                               
           </div>
          </div>
        </div>

                 <!-- post btn here --> 
                 <div class="form-group">
                  <div class="col-xs-12">
                          {{ Form::hidden('_method','PUT')}}
                          <a href="/admin/page" class="btn btn-secondary">Back</a>
                          {{ Form::submit('Update',['class'=>'btn btn-danger'] ) }}
  
                      {{-- <button class="btn btn-sm btn-primary" type="submit" name="submit">Update Category</button> --}}
                   </div>
              </div>
     {!! Form::close() !!}
     
        </div>
    </div>
    </div>
</div>

                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            @endsection
        