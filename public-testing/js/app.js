
$(document).ready(function($){

	$('.owl-hit').owlCarousel({
		center: false,
		loop:true,
		autoplay:true,
		items:2,
		lazyLoad: true,
		autoplayTimeout:7000,
		autoplayHoverPause:false,
		margin:200,
		nav:true,
		navText : ["<i class='fa fa-angle-left fa-2x'></i>","<i class='fa fa-angle-right fa-2x'></i>"],
		dots: false,
		pagination: false,
		animateOut: 'fadeOutLeft',
		animateIn: 'fadeInRight',
		responsive:{
			0:{
				items:1
			},
			768:{
				items:1
			},
			992:{
				items:1
			},
			1200:{
				items:1
			}
		}
	 });

	$(window).scroll(function(){
		$scrol = $(document).scrollTop();
		console.log($scrol);
		if ($scrol > 1)
		{
			$('.navbar').addClass('shrink');
			$('.navbar').addClass('fixed-top');
			// $('.nav-link').addClass('wwww');
		}
		else
		{
			$('.navbar').removeClass('shrink');
			// $('.nav-link').removeClass('wwww');
		}
	});

	/********************************************\
				One Nice Scrolling NaveBar
	\********************************************/

	 $('.nav li a').on('click',function() {
   	 if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    	&& location.hostname == this.hostname) {
     		 var $target = $(this.hash);
     		 $target = $target.length && $target
     	 || $('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
       		 var targetOffset = $target.offset().top;
        $('html,body').animate({scrollTop: targetOffset}, 800);
       return false;
      }
    }
  });
});


