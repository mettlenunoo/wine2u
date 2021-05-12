<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | {{ ucwords($blog->title) }} </title>  <!-- single Blog Post Video Desig -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

   

    <!-- include navigation -->
    @include("pages.includes.nav-links")
    @include("pages.includes.navigation")
   <!-- include navigation -->


  <section class="spaceup">
     <div class="container">
       <div class="row">
          <div class="col-12  mx-auto">
          <p class="">  <span><img src="img/microdashblack.svg" alt=""></span> 
              @foreach ($blog->categories as $category)
                 {{ ucwords($category->title) }} 
              @endforeach
          </p>
          <h1 class="f_titile_blk my-3 pb-2"> {{ ucwords($blog->title) }} </h1>

          <div class="embed-responsive embed-responsive-21by9 my-5">
          <iframe src="{!! $blog->video !!}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen" class="as-background"></iframe>
            
          </div>

          <div>
              {!! ucfirst($blog->content) !!}
          </div>
          </div>
       </div>
     </div>
   </section>


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
           <span class="pr-2"><img src="/page_assets/img/wine2ulogo.svg" class="userside_blog" alt=""></span>
           <span class="pr-2">{{ ucwords($rBlog->author)}}</span>
           </div>
       </div>

      @endforeach



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






