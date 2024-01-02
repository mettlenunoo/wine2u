@extends('admin.layout.app')
@section('content')

          <!-- Main Container -->
            <main id="main-container">

                  <!-- Page Header -->
             <div class="content bg-gray-lighter"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                    Edit Pair
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Pair</li>
                                <li><a class="link-effect" href="/admin/pair">All Pair</a></li>
                            </ol>
                        </div>
                    </div>
            </div>
          <!-- END Page Header -->

            @include('admin.message')

                    <div class="content animated fadeInLeft">
                        <div class="row">
                        <div class="col-md-4">
                            <!-- Default Elements -->
                            <div class="block">

          <div class="block-content block-content-narrow">
            {!! Form::open(['action' => ['pairingController@update', $pair->id ], 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t']) !!}
            <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <input class="form-control" type="text" id="material-text2" name="title"  value="{{ $pair->title }}"  required >
                            <label for="material-text2">Enter  Title</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="parent" size="1" required>

                                    <option value="0">None</option><!-- Empty value for demostrating material select box -->
                                    @foreach ($parent as $item)
                                       <option  @if($pair->parent == $item->id)  selected @endif value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach

                            </select>
                            <label for="material-select2">Parent</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="position" size="1" required>
                                    @php $totalpairs = count($pairs) + 1; @endphp
                                    @for ($i = 1; $i <= $totalpairs; $i++)
                                        <option @if($pair->position == $i)  selected @endif value="{{$i}}" selected>{{$i}}</option>
                                    @endfor
                            </select>
                            <input class="form-control" type="hidden"  name="i" value="{{$i}}">
                            <label for="material-select2">Position</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material floating">
                            <select class="js-select2 form-control" id="material-select2" name="publish" size="1" required>
                                <option></option><!-- Empty value for demostrating material select box -->
                                <option @if($pair->publish == "Yes")  selected @endif value="Yes">Yes</option>
                                <option @if($pair->publish == "No")  selected @endif value="No">No</option>
                            </select>
                            <label for="material-select2">Publish</label>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material floating">
                        <select class="js-select2 form-control" id="material-select2" name="blog_id" size="1" required>
                              <option></option><!-- Empty value for demostrating material select box -->

                            @foreach ($blogs as $blog)
                               <option @if($pair->blog_id == $blog->id) selected @endif value="{{ $blog->id }}"> {{ $blog->title }} </option>
                            @endforeach

                        </select>
                        <label for="material-select2">Select a Blog</label>
                    </div>
                </div>
             </div>

             <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material floating">
                        <select class="js-select2 form-control" id="material-select2" name="show_on_page"
                            size="1" required>
                            <option></option><!-- Empty value for demostrating material select box -->
                            <option @if($pair->publish == "Yes")  selected @endif value="Yes">Yes</option>
                            <option @if($pair->publish == "No")  selected @endif value="No">No</option>
                        </select>
                        <label for="material-select2">Show On Pairing Page</label>
                    </div>
                </div>
            </div>


             <div class="form-group">
                    <div class="col-sm-12">
                            <label for="material-text2">Category Description. If any</label>
                        <div class="form-material floating">
                            <textarea class="form-control" id="example-textarea-input" name="content" rows="6" placeholder="Content.."> {!! $pair->content !!}</textarea>
                        </div>
                    </div>
             </div>

             <div class="form-group">
                <div class="col-sm-12">
                        <label for="material-text2"> Image</label>
                    <div class="form-material floating">
                            <input class="form-control" type="file"  name="image" accept="image/*" >
                            <br>
                        @if($pair->image != "")
                            <img src="{{asset('images/'.$pair->image)}}" class="thumbimage" >
                        @endif
                    </div>
                </div>
            </div>



            <div class="form-group">
                <div class="col-xs-12">
                    {{ Form::hidden('_method','PUT')}}
                    <a href="/admin/pair" class="btn btn-secondary">Back</a>
                    {{ Form::submit('Update',['class'=>'btn btn-danger'] ) }}
                    {{-- <button class="btn btn-sm btn-primary" type="submit" name="submit">Add New</button> --}}
                </div>
            </div>

        {!! Form::close() !!}
        </div>
    </div>
    <!-- END Default Elements -->
                        </div>
                        <div class="col-md-8">
                            <!-- Normal Form -->
                            <div class="block">
                                <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->

                            <table class="table table-bordered table-striped js-dataTable-full" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="hidden-xs">Slug</th>
                                        <th class="">Show On Page</th>
                                        <th class="hidden-xs">Position</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                 @foreach ($parent as $item)

                                 <tr>
                                        <td class="text-center">{{ $item->title }}</td>

                                        <td class="text-center">{{ $item->slug }}</td>
                                        <td class="text-center">{{ $item->show_on_page }}</td>

                                        <td class="text-center">{{ $item->position }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                            <a href="/admin/pair/{{ $item->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                            {!! Form::open(['action' => ['pairingController@destroy', $item->id ], 'method' => 'POST']) !!}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                             {!! Form::close() !!}
                                            </div>
                                        </td>
                                </tr>

                                @foreach ($pairs as $row)
                                    @if($row->parent == $item->id)
                                        <tr>
                                                <td class="text-center"> <span aria-hidden="true">—</span> {{ $row->title }}</td>

                                                <td class="text-center">{{ $row->slug }}</td>
                                                <td class="text-center">{{ $item->show_on_page }}</td>

                                                <td class="text-center">{{ $row->parent }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                    <a href="/admin/pair/{{ $row->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>

                                                    {!! Form::open(['action' => ['pairingController@destroy', $row->id ], 'method' => 'POST']) !!}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                                    {!! Form::close() !!}

                                                    </div>
                                                </td>
                                        </tr>
                                    @endif

                                @endforeach

                             @endforeach

                                </tbody>
                            </table>
                        </div>
                            </div>
                            <!-- END Normal Form -->


                        </div>
                    </div>
                    </div>
                <!--  -->

                <!-- Page Content -->

                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->


@endsection
