// const {
//     filter
// } = require("lodash");


$(document).ready(function () {
    const siteNav = document.querySelector(".site-nav");
    const openNavSearch = document.querySelector(".open-form-search");
    const navSearchInput = document.querySelector(".nv-form-input");
    const navSearchResult = document.querySelector(".nv-form-results");
    let scrollAmt = window.scrollY;

    navBg();

    window.addEventListener("scroll", function () {
        scrollAmt = window.scrollY;
        navBg();
    })

    if (openNavSearch) {
        const navLogo = document.getElementById("nav-logo");
        openNavSearch.addEventListener("click", function (e) {
            e.preventDefault();
            navSearchInput.classList.toggle("active");
            navSearchResult.classList.toggle("active");
            navLogo.classList.toggle("hide");
        })
    }

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


    /***COOKIE TICKER*/
    const cookieStorage = {
        getItem: (item) => {
            const cookies = document.cookie
                .split(';')
                .map(cookie => cookie.split('='))
                .reduce((acc, [key, value]) => ({
                    ...acc,
                    [key.trim()]: value
                }), {});
            return cookies[item];
        },
        setItem: (item, value) => {
            document.cookie = `${item}=${value};`
        }
    }

    const storageType = cookieStorage;
    const consentPropertyName = 'uf_consent';
    const shouldShowPopup = () => !storageType.getItem(consentPropertyName);
    const saveToStorage = () => storageType.setItem(consentPropertyName, true);

    window.onload = () => {

        const acceptFn = event => {
            saveToStorage(storageType);
            consentPopup.classList.add('hidden');
        }
        const consentPopup = document.getElementById('cookie-ticker');
        const acceptBtn = document.getElementById('accept-cookies');
        const closeBtn = document.getElementById("close-cookies");
        acceptBtn.addEventListener('click', acceptFn);
        closeBtn.addEventListener('click', function () {
            consentPopup.classList.add('hidden');
        });

        if (shouldShowPopup(storageType)) {
            setTimeout(() => {
                consentPopup.classList.remove('hidden');
            }, 2000);
        }

    };
    /* 
	const privacyPolicy = document.getElementById("privacy-policy");

	if(privacyPolicy) {
		const closePolicy = document.getElementById("close-cookies");
		closePolicy.addEventListener("click", function(){
			privacyPolicy.style.opacity = 0;

			setTimeout(function() {
				privacyPolicy.style.display = "none";
			}, 1000);
		})
	}*/

    const windowWidth = window.innerWidth;
    const arrSlider = $(".arr-slides");

    if (windowWidth > 576) {
        $(".arr-slides").owlCarousel({
            center: false,
            margin: 15,
            loop: true,
            autoplay: true,
            items: 3,
            autoplayTimeout: 4000,
            autoplayHoverPause: false,
            nav: false,
            dots: false,
        });
    } else {
        $(".arr-slides").owlCarousel({
            center: false,
            margin: 15,
            loop: true,
            autoplay: true,
            items: 2,
            autoplayTimeout: 4000,
            autoplayHoverPause: false,
            nav: false,
            dots: false,
        });
    }

    $('#arr-left').click(function () {
        arrSlider.trigger('prev.owl.carousel');
    });

    $('#arr-right').click(function () {
        arrSlider.trigger('next.owl.carousel');
    });

    function navBg() {
        if (scrollAmt > 10) {
            siteNav.classList.add("nav-bg");
        } else {
            siteNav.classList.remove("nav-bg");
        }
    }
});
