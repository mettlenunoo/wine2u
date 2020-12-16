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
                               Edit User 
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Users</li>
                                <li><a class="link-effect" href="/admin/user">All User</a></li>
                            </ol>
                        </div>
                    </div>
                 </div>

                @include('admin.message')
                <!-- Page Content -->
                <div class="content animated fadeInLeft">
                    <div class="row">
                         <div class="col-md-8">
                            <!-- Default Elements -->
                            <div class="block">
                               
                    <div class="block-content">
                      {{-- <form method="POST" action="{{ route('register') }}" accept-charset="UTF-8" class="form-horizontal push-10-t" enctype="multipart/form-data">
                            @csrf --}}
                     {!! Form::open(['action' => ['userController@update', $user->id ], 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t']) !!}
                                        
                     <div class="form-group">
                      
                        <div class="col-sm-6">
                          <label class="col-xs-12" for="example-text-input">Username*</label>
                        <input type="text" placeholder="Username"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                          @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        
                        <div class="col-sm-6">
                            <label class="col-xs-12" for="example-text-input">Email*</label>
                        <input type="text"  name="email" placeholder="Email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>

                     </div>

                       {{-- <div class="form-group">
                         <div class="col-sm-6">
                          <label class="col-xs-12" for="example-text-input">Password*</label>
                          <input class="form-control" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                        </div>
                        
                        <div class="col-sm-6">
                            <label class="col-xs-12" for="example-text-input">Confirm Password*</label>
                            <input class="form-control" type="password" placeholder="COnfirm Password"  name="password_confirmation" required autocomplete="new-password">
                        </div>
                     </div> --}}

            <div class="form-group">
                 <div class=" block-content-full">
                        <label class="col-xs-12" for="example-text-input">Bio</label>
                                    <!-- Summernote Container -->
                 <textarea class="js-summernote" name="bio"> {{ $user->bio }}</textarea>
                                    
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
                                     <input type="file" id="imageupload" name="pic"  >  
                                     <div id="preview-image"><img src="{{ asset('user_pic/'.$user->pic) }}" class="tableimage"></div>
                                </div>
                            </div>
        
                        </div>


                        <div class="block">    
                            <div class="block-content">
                            <div class="form-horizontal">
                                    <div class="form-group">
                                            <label class="col-xs-12" for="example-select">Phone Number</label>
                                            <div class="col-sm-12">
                                            <input class="form-control" type="text"  name="phone" placeholder="Contact Number" value="{{ $user->phone }}" required>
                                            </div>
                                    </div>           
                                </div>
                            </div>
                        </div>


       <div class="block">        
         <div class="block-content">
           <div class="form-horizontal">                      
            
              <div class="form-group">
                <label class="col-xs-12" for="example-select">Account Status</label>
                <div class="col-sm-12">
                      <select class="form-control" id="example-select" name="status" size="1">

                          <option  @if($user->status == "Active") selected @endif value="Active">Active</option>
                          <option  @if($user->status == "Inactive") selected @endif value="Inactive">Inactive</option>

                      </select>
                </div>
              </div>
              
              <div class="form-group">
                  <label class="col-xs-12" for="example-select">Account type</label>
                  <div class="col-sm-12">
                        <select class="form-control" id="example-select" name="type" size="1">
                            <option @if($user->type == "User") selected @endif value="User">User</option>
                            <option @if($user->type == "Administrator") selected @endif value="Administrator">Administrator</option>
                            <option @if($user->type == "Super Administrator") selected @endif value="Super Administrator">Super Administrator</option>
                        </select>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12" for="example-select">Select Shop</label>
                    <div class="col-sm-12">
                          <select class="form-control" id="example-select" name="shop" size="1" required>
                              <option >None</option>
                              @foreach ($shops as $shop)
                                  <option value="{{ $shop->id}}" @if($shop->id == $user->shop_id ) selected @endif>{{ $shop->shop_name}}</option>
                              @endforeach
                          </select>
                    </div>
                  </div>
                

              {{-- <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Send User Notification	</label> 
                      <div class="col-sm-12">
                      <label class="form-check-label" for="exampleCheck1">
                        <input type="checkbox" class="form-check-input" name="sendEMail">
                        Send the new user an email about their account.
                       </label>
                     </div>
               </div>  --}}
                               
           </div>
          </div>
        </div>

                 <!-- post btn here --> 
            <div class="form-group">
                <div class="col-xs-12">
                        {{ Form::hidden('_method','PUT')}}
                        <a href="/admin/user" class="btn btn-secondary">Back</a>
                        {{ Form::submit('Update',['class'=>'btn btn-danger'] ) }}
                   {{-- <button class="btn btn-sm btn-primary  pull-right" type="submit" name="submit">Publish</button> --}}
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
        