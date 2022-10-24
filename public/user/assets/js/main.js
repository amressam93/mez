(function($) {
    "use strict";

    /*--
        Off Canvas Menu
    -----------------------------------*/
    /*Variables*/
    var $offCanvasNav = $('.offcanvas-menu'),
    $offCanvasNavSubMenu = $offCanvasNav.find('.sub-menu, .mega-menu, .menu-item ');

    /*Add Toggle Button With Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.parent().prepend('<span class="mobile-menu-expand"></span>');

    /*Close Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.slideUp();

    /*Category Sub Menu Toggle*/
    $offCanvasNav.on('click', 'li a, li .mobile-menu-expand, li .menu-title', function(e) {
        var $this = $(this);
        if (($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('mobile-menu-expand'))) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length) {
                $this.parent('li').removeClass('active-expand');
                $this.siblings('ul').slideUp();
            } else {
                $this.parent('li').addClass('active-expand');
                $this.closest('li').siblings('li').find('ul:visible').slideUp();
                $this.closest('li').siblings('li').removeClass('active-expand');
                $this.siblings('ul').slideDown();
            }
        }
    });

    $( ".sub-menu, .mega-menu, .menu-item" ).parent( "li" ).addClass( "menu-item-has-children" );

    /*----------------------------
    	TOP Menu Stick 
    ------------------------------ */
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 1) {
            $('#sticky-header').addClass("sticky");
        } else {
            $('#sticky-header').removeClass("sticky");
        }
    });


    /*----------------------------
     jQuery MeanMenu
    ------------------------------ */
    $(".product-menu-title").on("click", function() {
        $(".product_vmegamenu").slideToggle(500);
    });



    /*----------------------------
    	favourite-carousel
    ------------------------------ */
    $(".favourite-carousel").owlCarousel({
        autoPlay: false,
        rtl:true,
        slideSpeed: 2000,
        dots: false,
        nav: true,
        items: 4,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsiveClass:true,
        responsive:{
            0:{
                items: 1,
            },
            576:{
                items: 2,
            },
            768:{
                items: 3,
            },
            992:{
                items: 4,
            }
        }
    });

    /*----------------------------
    	favourite-carousel-2
    ------------------------------ */
    $(".favourite-carousel-2").owlCarousel({
        autoPlay: false,
        rtl:true,
        slideSpeed: 2000,
        dots: false,
        nav: true,
        items: 4,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsiveClass:true,
        responsive:{
            0:{
                items: 1,
            },
            576:{
                items: 2,
            },
            768:{
                items: 3,
            },
            992:{
                items: 3,
            }
        }
    });

    /*----------------------------
    	fproduct-carousel
    ------------------------------ */
    $(".fproduct-carousel").owlCarousel({
        autoPlay: false,
        rtl:true,
        slideSpeed: 2000,
        dots: false,
        nav: true,
        items: 4,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [992, 3],
        itemsTablet: [768, 3],
        itemsMobile: [576, 1],
        responsiveClass:true,
        responsive:{
            0:{
                items: 2,
            },
            576:{
                items: 2,
            },
            768:{
                items: 3,
            },
            1200:{
                items: 4,
            }
        }
    });

    /*----------------------------
    	new-product-carousel
    ------------------------------ */
    $(".new-product-carousel").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        rtl:true,
        dots: false,
        nav: true,
        items: 4,        
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsiveClass:true,
        responsive:{
            0:{
                items: 1,
            },
            576:{
                items: 2,
            },
            768:{
                items: 3,
            },
            992:{
                items: 3,
            },
            1200:{
                items: 4,
            }
        },
    });

    /*----------------------------
     fsingle-product-carousel
    ------------------------------ */
    $(".fsingle-product-carousel").owlCarousel({
        autoPlay: false,
        slideSpeed: 200,
        rtl:true,
        dots: false,
        nav: true,
        items: 1,
        transitionStyle: "backSlide",
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsiveClass:true,
        responsive:{
            0:{
                items: 1,
            },
            576:{
                items: 2,
            },
            768:{
                items: 2,
            },
            992:{
                items: 1,
            }
        },
    });
    /*----
    /*----------------------------
     fsingle-product-carousel-3
    ------------------------------ */
    $(".fsingle-product-carousel-3").owlCarousel({
        autoPlay: false,
        slideSpeed: 200,
        rtl:true,
        dots: false,
        nav: true,
        items: 1,
        transitionStyle: "backSlide",
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [576, 1],
    });

    /*----------------------------
     top-product-carousel
    ------------------------------ */
    $(".top-product-carousel").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        rtl:true,
        dots: false,
        nav: true,
        items: 4,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsiveClass:true,
        responsive:{
            0:{
                items: 1,
            },
            576:{
                items: 2,
            },
            768:{
                items: 3,
            },
            992:{
                items: 3,
            },
            1200:{
                items: 4,
            }
        },
    });
    /*----------------------------
     top-product-carousel
    ------------------------------ */
    $(".hm-four").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        rtl:true,
        dots: false,
        nav: true,
        items: 4,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        itemsMobile: [576, 1],
        responsiveClass:true,
        responsive:{
            0:{
                items: 1,
            },
            576:{
                items: 2,
            },
            768:{
                items: 3,
            },
            992:{
                items: 3,
            },
            1200:{
                items: 4,
            }
        },
    });

    /*----------------------------
     popular-product-carousel
    ------------------------------ */
    $(".popular-product-carousel").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        rtl:true,
        dots: false,
        nav: true,
        items: 3,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [576, 2],
        responsiveClass:true,
        responsive:{
            0:{
                items: 1,
            },
            576:{
                items: 2,
            },
            768:{
                items: 1,
            },
            992:{
                items: 3,
            },
            1200:{
                items: 3,
            }
        },
    });

    /*----------------------------
    	blog-carousel
    ------------------------------ */
    $(".blog-carousel").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        rtl:true,
        dots: false,
        nav: true,
        items: 2,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsiveClass:true,
        responsive:{
            0:{
                items: 1,
            },
            576:{
                items: 2,
            },
            768:{
                items: 1,
            },
            992:{
                items: 2,
            },
            1200:{
                items: 2,
            }
        },
    });

    /*----------------------------
    	brand-carousel
    ------------------------------ */
    $(".brand-carousel").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        rtl:true,
        dots: false,
        nav: true,
        items: 5,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsiveClass:true,
        responsive:{
            0:{
                items: 2,
            },
            576:{
                items: 3,
            },
            768:{
                items: 4,
            },
            992:{
                items: 4,
            },
            1200:{
                items: 5,
            }
        },
    });

    /*----------------------------
    	top-seller-carousel
    ------------------------------ */
    $(".top-seller-carousel").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        rtl:true,
        dots: false,
        nav: true,
        items: 1,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [980, 1],
        itemsTablet: [768, 1],
        itemsMobile: [480, 1],
    });

    /*----------------------------
        blog-carouse-2
    ------------------------------ */
    $(".blog-carousel-2").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        rtl:true,
        dots: false,
        nav: true,
        items: 3,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        responsiveClass:true,
        responsive:{
            0:{
                items: 1,
            },
            576:{
                items: 1,
            },
            768:{
                items: 2,
            },
            992:{
                items: 2,
            },
            1200:{
                items: 3,
            }
        },
    });

    /*----------------------------
        owl active
    ------------------------------ */
    $("#owl-demo").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        rtl:true,
        dots: false,
        nav: true,
        items: 4,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
    });

    /*----------------------------
        price-slider active
    ------------------------------ */
    $("#slider-range").slider({
        range: true,
        min: 16.00,
        max: 61.00,
        values: [16.00, 600],
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));

    /*--------------------------
    	countdown
    ---------------------------- */
    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
        });
    });
    /*--------------------------
    	about-counter
    ---------------------------- */
    $('.about-counter').counterUp({
        delay: 10,
        time: 4000
    });

    /*--------------------------
        scrollUp
    ---------------------------- */
    // hide #back-top first
    $("#back-top").hide();
    // fade in #back-top
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 300) {
            $('#back-top').fadeIn(300);
        } else {
            $('#back-top').fadeOut(300);
        }
    });
    // scroll body to 0px on click
    $('#back-top').on('click', function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

})(jQuery);