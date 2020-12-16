<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Single Blog Post 1 </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

  
   <!-- include navigation -->
   @include("pages.includes.nav-links")
   @include("pages.includes.navigation")
  <!-- include navigation -->


<!-- Featured Story -->
   <section class="spaceup">
     <div class="container-fluid">
       <div class="row">
         <div class="col-12 px-0">
           <div class="wine2u-konko">
             <img src="/page_assets/img/singleblog1.jpg" class="vasimg"> 
             <div class="overlay-light-black"></div>
               <div class="row">
                 <div class="col-12 col-md-9 mx-auto">
                 <div class="text-contain2 ">
                  <p class="wine_wc">  <span><img src="/page_assets/img/microdash.svg" alt=""></span> 
                    @foreach ($blog->categories as $category)
                        {{ ucwords($category->title) }} 
                    @endforeach
                   </p>
                  <h1 class="f_titile my-3 pb-2">{{ ucwords($blog->title) }}  </h1>
                  <a href=""><img src="/page_assets/img/Ellipse17.svg" class="userside_blog" alt=""></a>
                  <div class="blogtextandicon">
                  <h5 class="wine_wc mb-1">{{ ucwords($blog->author) }}</h5>
                  <p class=" f_titile_p3 wine_wc">{{ date('d M, Y', strtotime($blog->created_at)) }}</p>
                  </div>
                  </div>
       
                 </div>
               </div>
            </div>
         </div>
       </div>
     </div>
   </section>
<!-- Featured Story -->


<!-- content -->
 <section class="my-5">
   <div class="container pt-5">
     <div class="row">
         <div class="col-12 col-md-9  mx-auto">

          {!! ucfirst($blog->content) !!}

         </div>
     </div>
   </div>
 </section>
<!-- content -->



<!-- You may also like -->
   <section class="my-5">
     <div class="container pt-5">
       <div class="row">
         <div class="col-12 ">
           <h1  class="sign_title">You may also like</h1>
         </div>
       </div>

       <div class="row my-5">
        @foreach ($relatatedBlog as $rBlog)
            
          <div class="col-12 col-md-4 px-md-4 mb-5">
            <a href="/blog/{{ $rBlog->slug }}">
            <img src="/blog_images/{{ $rBlog->pic }}" class="bolg_img mb-2" alt="{{ ucwords($rBlog->title)}}">
            <p class="f_titile_p2 mb-0 py-3">{{ ucwords($rBlog->title)}}</p>
            <p class="f_titile_p3">{{ strwords($rBlog->content, 150) }}</p>
              </a>
              <div class="">
              <span class="pr-2"><img src="/page_assets/img/Ellipse17.svg" class="userside_blog" alt=""></span>
              <span class="pr-2">{{ ucwords($rBlog->author)}}</span>
              </div>
          </div>

         @endforeach

         {{-- <div class="col-12 col-md-4 px-md-4 mb-5">
           <a href="#">
           <img src="/page_assets/img/blogthum2.jpg" class="bolg_img mb-2" alt="">
           <p class="f_titile_p2 mb-0 py-3">Wine tasting events.</p>
           <p class="f_titile_p3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </a>
            <div class="">
            <span class="pr-2"><a href=""><img src="/page_assets/img/Ellipse17.svg" class="userside_blog" alt=""></a></span>
            <span class="pr-2"><a href="" class="f_titile_p3">Joan Appleseed</a></span>
            </div>
         </div>


         <div class="col-12 col-md-4 px-md-4 mb-5">
           <a href="#">
           <img src="/page_assets/img/blogthum3.jpg" class="bolg_img mb-2" alt="">
           <p class="f_titile_p2 mb-0 py-3">Wine tasting events.</p>
           <p class="f_titile_p3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </a>
            <div class="">
            <span class="pr-2"><a href=""><img src="/page_assets/img/Ellipse17.svg" class="userside_blog" alt=""></a></span>
            <span class="pr-2"><a href="" class="f_titile_p3">Joan Appleseed</a></span>
            </div>
         </div>

         --}}
         


       </div>
     </div>
   </section>
<!-- You may also like -->



<!-- footer includes -->
@include("pages.includes.footer")
@include("pages.includes.footer-links")
 <!-- footer includes -->

  </body>
</html>