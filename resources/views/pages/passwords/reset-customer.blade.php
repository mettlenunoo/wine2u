<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

  <!-- include navigation -->
    @include("pages.includes.nav-links")
    @include("pages.includes.navigation")
  <!-- include navigation -->

    <section class="sign centerit">
        <div class="container  ">
            <div class="row">
                <div class="col-12 col-md-7 mx-auto  ">
                    
                    <div class="text-center mb-5">
                        <h1 class="sign_title">Reset Password</h1>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                
                    <form method="POST" action="/account/password/reset">

                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                         <div class="form-group">
                            <label for="signup_Email">Email address</label>
                            <input type="email" class="form-control form-control-wine2u @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"   aria-describedby="emailHelp" placeholder="Enter your Email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control form-control-wine2u @error('password') is-invalid @enderror" name="password" placeholder="Password" required  autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
        
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control form-control-wine2u" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                        </div>

                         <div class="text-right">
                            <button type="submit" class="btn btn-wine2u px-5 ">Reset Password</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </section>

 <!-- footer includes -->
   @include("pages.includes.footer-links")
 <!-- footer includes -->

  </body>
</html>