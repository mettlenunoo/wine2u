<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Login</title>
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
         <h1 class="sign_title">Login</h1>
         <p>Thank you for your interest in Wine 2 U. Please complete the form below <br>
           to join our Preferred Customer List. </p>
          @include('pages.message')
       </div>
 
       <form method="POST" action="{{ route('customer-sign-in') }}">
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

        <div class="form-row">
        <div class="form-group col-12 ">
          <label for="Signup_Password1">Password</label>
          <input type="password" class="form-control form-control-wine2u @error('password') is-invalid @enderror" name="password" id="Signup_Password1" placeholder="Enter your Password">
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group col-12 text-right">
          <a href="/account/password/reset"><small>I forgot my password</small></a>
        </div>

        </div>

        <div class="text-right">
        <button type="submit" class="btn btn-wine2u px-5 ">Login</button>
        </div>

       
     


      <div class="text-center mt-5">
         {{-- <p>Or Sign Up With</p> --}}
         {{-- <span class="px-2"><a href="/sign-in/google"><img src="/page_assets/img/googlesign.svg" alt=""></a></span>
         <span class="px-2"><a href="/sign-in/facebook"><img src="/page_assets/img/facebook.svg" alt=""></a></span> --}}
           @if(isset($_GET['redirect']))

            <input type="hidden" name="redirect" value="checkout">
            <p class="my-4">I don’t have an account.  <a href="/signup?redirect=checkout">Register Me</a> </p>

           @else

            <input type="hidden" name="redirect" value="">
            <p class="my-4">I don’t have an account.  <a href="/signup">Register Me</a> </p>

           @endif
       </div>
           </form>
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