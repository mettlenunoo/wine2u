@extends('admin.layout.app')
@section('content')
            <!-- Main Container -->
            <main id="main-container">
            
                <div class="content">
                    <div class="row items-push">
                        <div class="col-sm-12">
                            <h1 class="page-heading">
                                User Settings  <small>Any change password,Email, Username and profile picture...</small>
                            </h1>
                        </div>
                        @include('admin.message')
                    </div>
                </div>

                    <div class="content">
                        <div class="row">
                        <div class="col-md-8">
                            <!-- Default Elements -->
                            <div class="block">
                               
                                <div class="block-content block-content-narrow">
                    <form method="POST" action="/admin/user/updatepassword" enctype="multipart/form-data"  class="form-horizontal push-30-t push-50" >
                            @csrf
                            <div class="form-group">     
                                <div class="form-material form-material-primary floating">

                                    <input id="currentpassword" type="password" class="form-control{{ $errors->has('currentpassword') ? ' is-invalid' : '' }}" name="currentpassword" required  autofocus>
                                    <label for="password" >{{ __('Current Password ') }}</label>

                                    @if ($errors->has('currentpassword'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('currentpassword') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>


                            <div class="form-group">     
                                    <div class="form-material form-material-primary floating">
                                        
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required >
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                            <label for="newpassword1">New Password</label>
                                            
                                    </div>
                            </div>


                            <div class="form-group">     
                                    <div class="form-material form-material-primary floating">
                                        
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        <label for="newpassword2">Confirm Password</label>
                                            
                                    </div>
                            </div>

                                      
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-sm btn-primary" type="submit" name="change_pass">Update </button>
                                </div>
                            </div>
                         </form>


                                </div>
                            </div>
                            <!-- END Default Elements -->
                        </div>
                  
                    </div>
                    </div>
               
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
 @endsection