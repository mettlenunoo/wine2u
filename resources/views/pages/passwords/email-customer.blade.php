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
                
                    <form method="POST" action="{{ route('account.customer.password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="signup_Email">Email address</label>
                            <input type="email" class="form-control form-control-wine2u @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"   aria-describedby="emailHelp" placeholder="Enter your Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-wine2u px-5 ">Send Password Reset Link</button>
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