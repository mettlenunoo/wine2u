// const {
//     filter
// } = require("lodash");


$(document).ready(function () {
    $(".owl-gallery").owlCarousel({
        center: true,
        loop: true,
        autoplay: false,
        items: 1,
        lazyLoad: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: false,
        nav: true,
        navText: [
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>",
        ],
        dots: false,
        pagination: false,
        animateOut: "fadeOut",
        animateIn: "fadeIn",

        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 1,
            },

            1200: {
                items: 1,
            },
        },
    });

    /*how it works*/
    $(".owl-hit").owlCarousel({
        center: true,
        loop: true,
        autoplay: true,
        items: 1,
        lazyLoad: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        nav: false,
        navText: [
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>",
        ],
        dots: false,
        pagination: false,
        animateOut: "fadeOut",
        animateIn: "fadeInRight",

        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 1,
            },

            1200: {
                items: 1,
            },
        },
    });

    $(".owl-wineslide").owlCarousel({
        center: true,
        margin: 20,
        loop: true,
        autoplay: true,
        items: 1,
        lazyLoad: true,
        autoplayTimeout: 7000,
        autoplayHoverPause: false,
        nav: false,
        navText: [
            "<i class='fa fa-angle-left fa-2x'></i>",
            "<i class='fa fa-angle-right fa-2x'></i>",
        ],
        dots: true,
        pagination: false,
        // autoHeight: true,
        animateOut: "fadeOutLeft",
        animateIn: "fadeInRight",

        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 1,
            },

            1200: {
                items: 1,
            },
        },
	});
	
	const privacyPolicy = document.getElementById("privacy-policy");

	if(privacyPolicy) {
		const closePolicy = document.getElementById("close-cookies");
		closePolicy.addEventListener("click", function(){
			privacyPolicy.style.opacity = 0;

			setTimeout(function() {
				privacyPolicy.style.display = "none";
			}, 1000);
		})
	}
});
