document.addEventListener("DOMContentLoaded", function() {
	$('.landing-slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
		autoplay: true,
		fade: true
    });
})