(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });

   // Initialize Owl Carousels
    $(".tranding-carousel, .carousel-item-1, .carousel-item-2, .carousel-item-3, .carousel-item-4").each(function () {
        var $this = $(this);
        var itemsToShow = 1;
        var autoplaySpeed = 1000;
        var smartSpeed = 1000;

        if ($this.hasClass('carousel-item-1')) {
            itemsToShow = 1;
            autoplaySpeed = 1500;
            smartSpeed = 1500;
        } else if ($this.hasClass('carousel-item-2')) {
            itemsToShow = 2;
            autoplaySpeed = 1000;
            smartSpeed = 1000;
        } else if ($this.hasClass('carousel-item-3')) {
            itemsToShow = 3;
            autoplaySpeed = 1000;
            smartSpeed = 1000;
        } else if ($this.hasClass('carousel-item-4')) {
            itemsToShow = 4;
            autoplaySpeed = 1000;
            smartSpeed = 1000;
        } else {
            itemsToShow = 1;
            autoplaySpeed = 1000;
            smartSpeed = 1000;
        }

        $this.owlCarousel({
            autoplay: true,
            smartSpeed: smartSpeed,
            items: itemsToShow,
            dots: false,
            loop: true,
            nav: true,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: itemsToShow
                },
                992: {
                    items: itemsToShow
                },
                1200: {
                    items: itemsToShow
                }
            }
        });
    });

    // Preloader
    $(window).on('load', function() {
        $('.preloader').fadeOut('slow');
    });

    // Sticky Navbar
    var header_navbar = $(".navbar-area");
    var sticky = header_navbar.offset().top;
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > sticky) {
            header_navbar.addClass("sticky");
        } else {
            header_navbar.removeClass("sticky");
        }

        var backToTop = $(".scroll-top");
            if ($(window).scrollTop() > 50) {
                backToTop.css("display", "flex");
            } else {
                backToTop.css("display", "none");
         }
    });

    // Smooth Scroll for Menu Links
    $('.page-scroll').on('click', function(event) {
        event.preventDefault();
        var target = $(this.hash);
        $('html, body').animate({
            scrollTop: target.offset().top - 60
        }, 1000);
    });

    // Navbar Collapse Close on Click
    $(".page-scroll").on("click", function() {
        $(".navbar-collapse").removeClass("show");
        $(".navbar-toggler").removeClass("active");
    });

    $(".navbar-toggler").on("click", function() {
        $(this).toggleClass("active");
    });

    // WOW.js Initialization
    new WOW().init();

    // Counter Up Initialization
    $('.counter').counterUp({
        delay: 10,
        time: 2000
    });

    // Scroll to Top
    $('.scroll-top').on('click', function() {
        $('html, body').animate({ scrollTop: 0 }, 'slow');
        return false;
    });

})(jQuery);
