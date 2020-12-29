<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Blog</title>
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
     <h1 class="sign_title wine2upc">Our Blog</h1>
     <p class="wine2upc ">Be informed about our latest findings and wine tutorials</p>
     </div>
    </div>
    <img src="/page_assets/img/Wine2Utopb.svg" class="lefteffecttop" alt="">
  </div>
</section>

<!-- Featured Story -->
@if($featured)
   <section>
     <div class="container-fluid">
       <div class="row">
         <div class="col-12 px-0">
           <!-- <img src="/page_assets/img/blogsample.jpg" class="w-100" alt=""> -->
           <div class="wine2u-konko">
             <a href="/blog/{{ $featured->slug }}"><img src="/blog_images/{{ $featured->pic }}" class="vasimg"> 
             <div class="overlay-light-black"></div>
              <div class="text-containm ">
               <h1 class="f_titile my-4">Featured Story</h1>
               <p class="wine_wc"> {{ date('d M, Y', strtotime($featured->created_at)) }}</p>
               <p class="f_titile_p  mb-4"> {{ ucwords($featured->title) }} </p>

               <a href="/blog/{{$featured->slug}}"  class="btn btn-wine3u px-5">Read more</a>
            
            </div>
            </a>
            </div>
         </div>
       </div>
     </div>
   </section>
@endif
<!-- Featured Story -->



<!-- Blogs -->
   <section class="my-5">
     <div class="container ">
       <div class="row">
         <div class="col-12  text-center">
           <h1  class="sign_title">Wine News From Around The Globe</h1>
         </div>
       </div>

       <div class="row my-5">
          @forelse ($blogs as $blog)
            <div class="col-12 col-md-4 px-md-4 mb-4">
                <a href="/blog/{{$blog->slug}} ">
                    <img src="/blog_images/{{ $blog->pic }}" class="bolg_img mb-2" alt="{{ ucwords($blog->title)}}">
                    <p class="f_titile_p2 mb-0 py-3"> {{ ucwords($blog->title)}} </p>
                    <p class="f_titile_p3"> {{ strwords($blog->content, 150) }} </p>
                </a>
                <div class="">
                    <span class="pr-2"><img src="/page_assets/img/wine2ulogo.svg" class="userside_blog" alt=""></span>
                    <span class="pr-2"> {{ ucwords($blog->author)}} </span>
                </div>
            </div>

          @empty

            <div class="col-12 col-md-12 px-md-12 mb-4">
                <h5> No blog, Please try again </h5>
            </div>
              
          @endforelse


         <div class="col-12 text-center m-0">
          {{ $blogs->links("pages.includes.paginate_style") }}
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