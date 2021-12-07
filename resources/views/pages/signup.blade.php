<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Sign Up</title>
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
         <h1 class="sign_title">Create an account</h1>
         <p>Thank you for your interest in wine2u. Please complete the form below  <br>
to join our Preferred Customer List.</p>
        @include('pages.message');
       </div>
       <form method="POST" action="{{ route('customer-signup') }}">
        @csrf

          <div class="form-row">
          
            <div class="form-group col-12 col-md-6">

                <label for="signup_FirstName">First Name</label>
                <input type="text" class="form-control form-control-wine2u @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" id="signup_FirstName"  placeholder="First Name">
                @error('fname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror

            </div>


            {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> --}}

           
            <div class="form-group col-12 col-md-6">
                <label for="signup_LastName">Last Name</label>
                <input type="text" class="form-control form-control-wine2u @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" id="signup_LastName" placeholder="Last Name">
                @error('lname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
          </div>

            <div class="form-group">
              <label for="signup_Email">Email address</label>
              <input type="email" class="form-control form-control-wine2u @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  id="signup_Email" placeholder="Email address" aria-describedby="emailHelp">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

            </div>

            <div class="form-row">
            <div class="form-group col-12 col-md-6">
              <label for="Signup_Password1">Password</label>
              <input type="password" class="form-control form-control-wine2u @error('password') is-invalid @enderror" name="password" id="Signup_Password1" placeholder="Password">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group col-12 col-md-6">
              <label for="Signup_Password2">Confirm password</label>
              <input type="password" class="form-control form-control-wine2u" name="password_confirmation" id="Signup_Password2" placeholder="Confirm password">
            </div>
            </div>

            <div class="text-right">
              <button type="submit" class="btn btn-wine2u ">Create account</button>
            </div>

     


      <div class="text-center mt-5">
         {{-- <p>Or Sign Up With</p>
          <span class="px-2"><a href="/sign-in/google"><img src="/page_assets/img/googlesign.svg" alt=""></a></span>
          <span class="px-2"><a href="/sign-in/facebook"><img src="/page_assets/img/facebook.svg" alt=""></a></span> --}}
         @if(isset($_GET['redirect']))
            <input type="hidden" name="redirect" value="redirect">
             <p class="my-4">I already have an account. <a href="/sign-in?redirect=checkout">Log me in.</a> </p>
         @else
            <input type="hidden" name="redirect" value="">
            <p class="my-4">I already have an account. <a href="/sign-in">Log me in.</a> </p>

         @endif

        
       </form>
      </div>
          
      </div>

    </div>
    <img src="/page_assets/img/Wine2U404.svg" class="lefteffect404"  alt="">
  </div>
</section>




<!-- footer includes -->
 @include("pages.includes.footer-links")
 <!-- footer includes -->

  </body>
</html>