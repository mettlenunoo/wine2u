<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Pairing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

  
   <!-- include navigation -->
   @include("pages.includes.nav-links")
   @include("pages.includes.navigation")
  <!-- include navigation -->


<section class="top_titile_bk  centerit relativetins">
  <div class="container ">
    <div class="row ">
     <div class="col-12 text-center">
     <h1 class="sign_title wine2upc">Food Pairing</h1>
     <p class="wine2upc ">Combine the right food with the right wine to enhance both flavours</p>
     </div>
    </div>
    <img src="/page_assets/img/Wine2Utopb.svg" class="lefteffecttop" alt="">
  </div>
</section>


<!-- Pairing -->
   <section class="my-5">
     <div class="container ">
       <div class="row">
         {{-- <div class="col-12  text-center">
           <h1  class="sign_title">Food Pairing</h1>
         </div> --}}
       </div>

       <div class="row my-5">
          @forelse ($pairings as $pair)

            @foreach ($pair->subPairing as $pairing)
            
                <div class="col-12 col-md-4 px-md-4 mb-4">
                    <a href="/blog/{{$pairing->blog_id}} ">
                        <img src="/images/{{ $pairing->image }}" class="bolg_img mb-2" alt="{{ ucwords($pairing->title)}}">
                        <p class="f_titile_p2 mb-0 py-3"> {{ ucwords($pairing->title)}} </p>
                        {{-- <p class="f_titile_p3"> {{ strwords($blog->content, 150) }} </p> --}}
                    </a>
               
                </div>

            @endforeach

          @empty

            <div class="col-12 col-md-12 px-md-12 mb-4">
                <h5> No blog, Please try again </h5>
            </div>
              
          @endforelse


         <div class="col-12 text-center m-0">
          {{ $pairings->links("pages.includes.paginate_style") }}
         </div>


        
       </div>
     </div>
   </section>
<!-- Blogs -->

<!-- footer includes -->
 @include("pages.includes.footer")
 @include("pages.includes.footer-links")
 <!-- footer includes -->

  </body>
</html>