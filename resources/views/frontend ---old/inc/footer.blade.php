<link rel="stylesheet" href="{{ asset('css/flag-icon.min.css') }}">
<footer>
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center col-small-offset-3">
<img src="{{ asset('images/white-logo.png')}}" class="img-responsive">
<p>JOIN OUR MAILING LIST FOR NEWS, DISCOUNTS, & EVERYTHING HAUTE VIE</p>
<form class="input-group" id="subscribe_form">
<input type="email" class="form-control" id="subscribe_email" placeholder="ENTER YOUR EMAIL ADDRESS" required>

<span class="input-group-btn">

<button class="btn" id="subscribe_btn" type="submit">SEND</button>
</span>
</form>
</div>


<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

<ul class="footer-links"> 
@foreach ($pg as $page)

<li><a href="/{{ strtolower($shop->country)}}/page/{{ strtolower($page->slug) }}">{{ strtoupper($page->title) }}</a></li>
{{-- <li><a href="">DELIVERY & RETURNS</a></li>
<li><a href="">ORDER STATUS</a></li>
<li><a href="">PAYMENT OPTIONS</a></li>
<li><a href="">TERMS & CONDITIONS</a></li> --}}

@endforeach

</ul>


</div>




<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pad-up-md">
<h5>CONNECT WITH US:</h5>
<ul class="social-links">

<li>
<a href="https://www.facebook.com/hautevieafrica
" target="new">
<i class="fa fa-facebook"></i>
</a>
</li>
<li>
<a href="https://www.instagram.com/hautevie_africa/
" target="new">
<i class="fa fa-instagram"></i>
</a>
</li>
<li>
<a href="https://twitter.com/Hautevie_africa
" target="new">
<i class="fa fa-twitter"></i>
</a>
</li>
<!--<li>
<a href="" target="new">
<i class="fa fa-pinterest"></i>
</a>
</li>-->
</ul>
<br>
<p>

@foreach($shops as $shp)
<a  href="/{{ strtolower($shp->country)}}" style="color:#fff;cursor:pointer;text-decoration:none !important;" class="country-btn">
<span><img src="{{ asset('img/icons/'.strtolower($shp->country.'.svg'))}}" width="20" alt="">  {{ strtoupper($shp->country) }}</span>
{{-- <i class="flag-icon flag-icon-{{ strtolower($shp->country) }}"></i> {{ strtoupper($shp->country) }} --}}
</a>
@endforeach

{{-- <form action="" method="POST" style="display: inline-block;">
<input type="hidden" name="country_name" value="2">
<button   style="color:#fff;cursor:pointer;text-decoration:none !important;" class="country-btn"><i class="fa fa-globe"></i> WORLDWIDE</button>
</form> --}}


</p>
<img src="{{ asset('images/plans-grayscale.png')}}" class="img-responsive">
</div>
</div>
</div>
</div>
<div class="row copyright">
<hr>
<p class="small">&copy; 2018 ALL RIGHTS RESERVED. DESIGNED BY <a href="http://effectstudios.co/" target="new">EFFECTSTUDIOS</a></p>
</div>
</div>
</footer>

<!-- Cookie Ticker-->
@if (Cookie::get('cookies') == null ) 
<div class="cookies" id="cookies">
<div class="container">
<div class="row">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<p>In order to give you the best experience, our website uses cookies. By continuing to use this site, you agree to our use of cookies.</p>
<button name="cookies" id="cookie" onclick="hideCookie()">Accept</button>
<a href="">More Information</a>
</div>

</div>
</div>
</div>
@endif

<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script> 
{{-- custom Js --}}
<script src="{{ asset('custom_js/script.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- First try for the online version of jQuery-->
{{-- <script src="http://code.jquery.com/jquery.js"></script> --}}


<!-- If no online access, fallback to our hardcoded version of jQuery -->
<script>window.jQuery || document.write('<script src="js/jquery-1.11.3.min.js"><\/script>')</script>

<!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/owl.carousel.min.js')}}"></script>


<script type="text/javascript">
$(document).ready(function(){
$('.trigger-nav').click(function(){
$('.navigation-small').removeClass('go-out-left');
})
$('.close-nvs').click(function(){
$('.navigation-small').addClass('go-out-left');
})
$('.open-search').click(function(){
$('.search-box').toggleClass('pull-up');
})
})
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-49735433-49"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-49735433-49');
</script> --}}



{{-- <script>
function myFunction(){

var email = document.getElementById("email").value;
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  

if(email.match(mailformat) && email != "" ){

$.ajax({
type:'post',
url:'insertemail.php',
data:{
//item_src:img_src,
email:email

},
success:function(response){

//window.location.replace('cart.php');
toastr.success('Thank you for Subscribing!');
document.getElementById("email").value = "";
}
});


}else{
toastr.success('Incorrect Email Address');
}


}

</script> --}}