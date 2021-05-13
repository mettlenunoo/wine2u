document.addEventListener("DOMContentLoaded", function () {
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

    $('.fp-slides').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
			},
			{
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
	});
	
	$(".fp-slider #fp-prev").click(function() {
		$(".fp-slides").slick("slickPrev");
	});

	$(".fp-slider #fp-next").click(function() {
		$(".fp-slides").slick("slickNext");
	});
})
