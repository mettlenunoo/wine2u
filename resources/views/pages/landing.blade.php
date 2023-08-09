<!doctype html>
<html lang="en">

<head>
    <title>Wine2u | Landing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- include navigation -->
    @include("pages.includes.nav-links")
    <!-- include navigation -->


    <nav class="fixed-top  pt-3">
        <div class="container">
            <div class="row">
                <div class="col-12  text-center">
                    <a href="/index">
						<img src="/page_assets/img/wine2ulogo.svg" class="navbar-band" alt="" width="100">
					</a>
                </div>
            </div>
        </div>
    </nav>


	<div class="">
        <div class="landing-wrapper">
            <div class="landing-slider">
                {{-- <img src="page_assets/img/landing-1.jpg" alt="First slide"> --}}
                <img src="page_assets/img/landing-2.jpg" alt="Second slide">
                <img src="page_assets/img/landing-5.jpg" alt="Third slide">
                <img src="page_assets/img/landing-7.jpg" alt="Fourth slide">
            </div>
            <div class="overlay-light-black-two"></div>
            <div class="container p-relative">
                <div class="mw-450 text-center">
                    <h1 class="mb-3 libre">
                        Your Palate, <br>
                        Our Passion.
                    </h1>
                    <p class="mb-4">Shop the latest releases of wine along with exclusive offers, rare and limited edition wines, as well as the latest merchandise from our tasting rooms.</p>
                    <a  class="libre" href="/site">ENTER SITE</a>
                </div>
            </div>
        </div>
    </div>


    {{-- <section class="main-landing d-none">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item  active">
                    <img class="d-block w-100 landingimg " src="page_assets/img/landing-1.jpg" alt="First slide">
                </div>
                <div class="carousel-item ">
                    <img class="d-block w-100 landingimg" src="page_assets/img/landing-2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 landingimg" src="page_assets/img/landing-3.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 landingimg" src="page_assets/img/landing-4.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 landingimg" src="page_assets/img/landing-5.jpg" alt="Third slide">
                </div>
                <div class="container main-fix">
                    <div class="row">
                        <div class="row landing-fix justify-content-center">
                            <div class="col-12 text-center ">
                                <!-- <h1 class="land_titile">Your Palette, <br>
                                    Our Passion.</h1>
                                <p class="my-4 landing-sm-text">Shop rare, limited and latest releases of wine along with exclusive
                                    offers from our tasting rooms.</p> -->
                                <p class="landing_p " data-toggle="modal" data-target="#check-age">ENTER SITE</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="container  ">
                <div class="row">
                    <div class="col-12 col-md-6 text-center ">
                        <h1 class="land_titile">Your Palette, <br>
                            Our Passion.</h1>
                        <p class="my-4">Shop rare, limited and latest releases of wine along with exclusive offers from
                            our tasting rooms.</p>
                        <p class="landing_p" data-toggle="modal" data-target="#check-age">ENTER SITE</p>
                    </div>
                </div>
            </div> -->
    </section> --}}


    <!-- modal age verification -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="check-age" tabindex="-1" aria-labelledby="check-ageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class=" modal-content-wine2u">
                <div class="modal-header-wine2u d-flex justify-content-center mt-5">
                    <h1 class="sign_title wine2upc">Age Verification </h1>
                </div>
                <div class="text-center mb-2">
                    <img src="/page_assets/img/shortdash.svg" alt="">
                </div>
                <div class="modal-body text-center">
                    <p>Want to join us on this journey?<br>You must be at least 18+ to access this site.</p>
                </div>
                <div class="modal-footer-wine2u d-flex justify-content-center mb-5 ">
                    <form method="POST" action="{{ route('age-verification') }}">
                        @csrf
                        <button type="submit" class="btn btn-wine2u_2  px-5 mx-2 ">Yes</button>
                        <a href="/age-verification/below-18" class="btn btn-wine2u    mx-2">I’m below 18</a>
                        {{-- <a href="/age-verification/below-18"  class="btn btn-wine2u    mx-2" data-dismiss="modal">I’m below 18</a> --}}

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal age verification -->

    <!-- footer includes -->
    @include("pages.includes.footer-links")
    <!-- footer includes -->

    </body>

</html>
