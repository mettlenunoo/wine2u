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
                               Edit Blog
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>BLog</li>
                                <li><a class="link-effect" href="/admin/blog">All Blog</a></li>
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

                      {!! Form::open(['action' => ['blogController@update', $blog->id ], 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t']) !!}
                                        
                     <div class="form-group">
                       <label class="col-xs-12" for="example-text-input">Title</label>
                        <div class="col-sm-12">
                          <input class="form-control" type="text" id="title" name="title" placeholder="Blog Title" value="{{ $blog->title }}" required>
                        </div>
                     </div>
                 
            <div class="form-group">
                 <div class=" block-content-full">
                        <label class="col-xs-12" for="example-text-input">Content</label>
                                    <!-- Summernote Container -->
                        <textarea class="js-summernote" name="content">{!! $blog->content !!}</textarea>
                                    
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
                                     <label class="" for="example-file-input">Feature Image</label>
                                     <input type="file" id="imageupload" name="pic" >  
                                     <div id="preview-image"><img src="{{ asset('blog_images/'.$blog->pic) }}" class="thumbimage"></div>
                                     
                                </div>
                            </div>
        
                        </div>


                        <div class="block">    
                            <div class="block-content">
                            <div class="form-horizontal">
                                    <div class="form-group">
                                            <label class="col-xs-12" for="example-select">Select Category</label>
                                            <div class="col-sm-12">
                                                    <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.."  multiple  name="category[]"  required="">

                                                    @foreach($categories as $key => $parentCat) 
                               
                                                        <option  disabled > {{ $parentCat->title }} </option>

                                                        @foreach ($parentCat->subCategories as $key => $subCat) 
                         
                                                            @php $wasFound = false; @endphp

                                                            @foreach ($blog->categories as $selPair)
                                                                @if($selPair->id == $subCat->id )
                                                                    <option value="{{ $subCat->id }}" selected > <span aria-hidden="true">—</span>{{ $subCat->title }}</option>
                                                                    @php $wasFound = true @endphp
                                                                @endif
                                                            @endforeach

                                                            @if($wasFound == false)
                                                                <option value="{{ $subCat->id }}" > <span aria-hidden="true">—</span>{{ $subCat->title }}</option>
                                                            @endif
                                                            
                                                        @endforeach
                         
                                                    @endforeach
                         
                         
                         
                                                        {{-- @foreach($categories as $key => $parentCat) 
                                                             <option  disabled > {{ $parentCat->title }} </option>
                                                                 @foreach ($parentCat->subCategories as $key => $subCat) 
                                                                   
                                                                         <option value="{{ $subCat->id }}"> <span aria-hidden="true">—</span>{{ $subCat->title }}</option>
                                                             
                                                                 @endforeach
                                                         @endforeach --}}

                                                      {{-- @foreach ($parent as $item)
                                                       <option value="{{$item->id}}">{{$item->title}}</option>

                                                        @foreach ($categories as $row)

                                                          @if($row->parent == $item->id)
                                                           <option value="{{$row->id}}" @if($blog->category == $row->id ) selected @endif> <span aria-hidden="true">—</span>{{$row->title}}</option>
                                                          @endif

                                                         @endforeach

                                                        @endforeach --}}
                                                    </select>
                                            </div>
                                    </div>           
                                </div>
                            </div>
                        </div>


       <div class="block">        
         <div class="block-content">
           <div class="form-horizontal">                      
             <div class="form-group">
                <label class="col-xs-12" for="example-tags1">Tag</label>
                    <div class="col-xs-12">
                    <input class="js-tags-input form-control" type="text" id="example-tags1" name="tag" value="{{ $blog->tag}}">
                    </div>
             </div>

               <div class="form-group">
                <label class="col-xs-12" for="example-select">Blog Type</label>
                  <div class="col-sm-12">
                     <select class="form-control" id="example-select" name="type" size="1" required>
                          <option @if($blog->type == "Text")  selected  @endif value="Text" >Text</option>
                          <option @if($blog->type == "Video")  selected  @endif value="Video">Video</option>
                      </select>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-12" for="example-tags1">Video Link</label>
                      <div class="col-xs-12">
                      <textarea class="form-control" name="video" cols="30" rows="5" placeholder="<iframe class='embed-responsive-item' src='https://www.youtube.com/embed/zpOULjyy-n8?rel=0' allowfullscreen></iframe>" >{{ $blog->video }}</textarea>
                      </div>
                </div>

            <div class="form-group">
                 <label class="col-xs-12" for="example-select">Visibility</label>
                  <div class="col-sm-12">
                    <select class="form-control" id="datepicker" name="visibility" size="1">
                        <option @if($blog->visibility == "Public")  selected  @endif value="Public">Public</option>
                        <option @if($blog->visibility == "Private")  selected  @endif value="Private">Private</option>
                    </select>
                  </div>
             </div>

             <div class="form-group">
                    <label class="col-xs-12" for="example-select">Publish</label>
                     <div class="col-sm-12">
                            <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" value="{{ $blog->publish }}" name="publish" />
                            <input type='hidden' class="form-control" id="publish" value="{{ $blog->publish }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        {{-- <input class="js-datepicker form-control" type="text" id="datepicker" name="publish" > --}}
                     </div>
            </div>

           
            <div class="form-group">
                    <label class="col-xs-12" for="example-text-input">Author</label>
                     <div class="col-sm-12">
                       <input class="form-control" type="text"  name="author" placeholder="Author"  value="{{ $blog->author }}" required>
                     </div>
            </div>
                               
           </div>
          </div>
        </div>

                 <!-- post btn here --> 
                 <div class="form-group">
                  <div class="col-xs-12">
                          {{ Form::hidden('_method','PUT')}}
                          <a href="/admin/blog" class="btn btn-secondary">Back</a>
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
        