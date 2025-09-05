// -----------------------------

//   js index
/* =================== */
/*  
    ## preloader
    ## Counter Up
    ## sticky
    ## SmartMenu Nav
    ## Countdown 
    ## smooth scroll
    ## WOW
    ## Sidepanel JS
    ## owl carousel
    ## Hero Slider JS
    ## Youtube Player JS
    ## Full Screen Search JS
    ## Contact Form

    

*/
// -----------------------------
(function($) {
    "use strict";



    /*---------------------
        preloader
    --------------------- */

    $(window).on('load', function() {
        $('#preloader').fadeOut('slow', function() {
            $(this).remove();
            // Counter Up
            $('.counter-up').counterUp();
        });

    });




    /*-----------------
    sticky
    -----------------*/
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 85) {
            $('header').addClass('navbar-fixed-top');
        } else {
            $('header').removeClass('navbar-fixed-top');
        }
    });

    
    /*----------------------------
     SmartMenu Nav
    ------------------------------ */
    $('#grerbinMenu').smartmenus({
        subMenusSubOffsetX: 6,
        subMenusSubOffsetY: -8
    });



    $(function() {
        var $mainMenuState = $('#grerbinMenu-state');
        if ($mainMenuState.length) {
            // animate mobile menu
            $mainMenuState.change(function(e) {
                var $menu = $('#grerbinMenu');
                if (this.checked) {
                    $menu.hide().slideDown(250, function() {
                        $menu.css('display', '');
                    });
                } else {
                    $menu.show().slideUp(250, function() {
                        $menu.css('display', '');
                    });
                }
            });
            // hide mobile menu beforeunload
            $(window).on('beforeunload unload', function() {
                if ($mainMenuState[0].checked) {
                    $mainMenuState[0].click();
                }
            });
        }
    });

    
    
    /*-----------------
    scroll-up
    -----------------*/
    $.scrollUp({
        scrollText: '<i class="fa fa-arrow-up" aria-hidden="true"></i>',
        easingType: 'linear',
        scrollSpeed: 1500,
        animation: 'fade'
    });


    
    /**================================ 
    Countdown 
    ================================**/
    $('.countdown').countdown('2020/5/1', function(event) {
        $('#cday').html(event.strftime('%D <span id="clabel"><br>Days</span>'));
        $('#chour').html(event.strftime('%-H <span id="clabel"><br>Hours</span>'));
        $('#cminute').html(event.strftime('%M <span id="clabel"><br>Minutes</span>'));
        $('#csec').html(event.strftime('%S <span id="clabel"><br>Seconds</span>'));
    });

    /*---------------------
    smooth scroll
    --------------------- */
    $('.smoothscroll').on('click', function(e) {
        e.preventDefault();
        var target = this.hash;

        $('html, body').stop().animate({
            'scrollTop': $(target).offset().top - 80
        }, 1200);
    });


    /*---------------------
    countdown
    --------------------- */
    // $('[data-countdown]').each(function() {
    //     var $this = $(this),
    //         finalDate = $(this).data('countdown');
    //     $this.countdown(finalDate, function(event) {
    //         $this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
    //     });
    // });

    
    /*---------------------
    WOW
    --------------------- */
    if ($('.wow').length > 0) {
        var wowSel = 'wow';
        var wow = new WOW({
            boxClass: wowSel,
            animateClass: 'animated',
            offset: 0,
            mobile: true,
            live: true,
            callback: function(box) {

            },
            scrollContainer: null
        });
        wow.init();
    }
    

    /*---------------------
    Sidepanel JS
    --------------------- */
    $('.sidebar-btn').on('click', function() {
        $('.side-panel').removeClass('hide');
    });
    $('.close-sp').on('click', function() {
        $('.side-panel').addClass('hide');
    });




    // Hero slider background setting
    function sliderBgSetting() {
        if ($(".hero-slider .slide").length) {
            $(".hero-slider .slide").each(function() {
                var $this = $(this);
                var img = $this.find(".slider-bg").attr("src");

                $this.css({
                    backgroundImage: "url(" + img + ")",
                    backgroundSize: "cover",
                    backgroundPosition: "center center"
                })
            });
        }
    }
    sliderBgSetting();

    

    /*---------------------
    owl carousel
    --------------------- */

    // Attorney Carousel
    function attorney_carousel() {
        var owl = $(".attorney-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            nav: true,
            items: 5,
            smartSpeed: 2000,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            center: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                768: {
                    items: 3
                }
            }
        });
    }
    attorney_carousel();


    // Testimonial Carousel
    function testimonial_carousel() {
        var owl = $(".testimonial-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 30,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            nav: true,
            items: 5,
            smartSpeed: 2000,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 2
                }
            }
        });
    }
    testimonial_carousel();


    // Testimonial Carousel 2
    function testimonial2_carousel() {
        var owl = $(".testimonial2-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            nav: true,
            items: 5,
            smartSpeed: 2000,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4000,
            center: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 3
                }
            }
        });
    }
    testimonial2_carousel();

    


    /*---------------------
        Hero Slider JS
    --------------------- */

    if ($('.hero-slider').length > 0) {

        $(window).on('load', function() {
            $('.hero-slider').on('init', function(e, slick) {
                var $firstAnimatingElements = $('.slide:first-child').find('[data-animation]');
                doAnimations($firstAnimatingElements);
            });
            $('.hero-slider').on('beforeChange', function(e, slick, currentSlide, nextSlide) {
                var $animatingElements = $('.slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
                doAnimations($animatingElements);
            });


            function heroSlider() {
                if ($(".hero-slider").length) {
                    $(".hero-slider").slick({
                        autoplay: true,
                        autoplaySpeed: 6000,
                        pauseOnHover: true,
                        arrows: true,
                        prevArrow: '<button type="button" class="slick-prev">Previous</button>',
                        nextArrow: '<button type="button" class="slick-next">Next</button>',
                        dots: true,
                        fade: true,
                        cssEase: 'linear'
                    });
                }
            }
            heroSlider();


            function doAnimations(elements) {
                var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                elements.each(function() {
                    var $this = $(this);
                    var $animationDelay = $this.data('delay');
                    var $animationType = 'animated ' + $this.data('animation');
                    $this.css({
                        'animation-delay': $animationDelay,
                        '-webkit-animation-delay': $animationDelay
                    });
                    $this.addClass($animationType).one(animationEndEvents, function() {
                        $this.removeClass($animationType);
                    });
                });
            }

        });

    }

    


    /*---------------------
        Youtube Player JS
    --------------------- */
    $(window).on('load', function() {
        if ($('.play-1, .play-2').length > 0) {
            $(".play-1, .play-2").yu2fvl();
        }
    });




    /*---------------------
        Full Screen Search JS
    --------------------- */


    if ($('#search-terms').length > 0) {
        // Full Screen Search Form
        var ismobile = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/i) != null
        var touchorclick = (ismobile) ? 'touchstart' : 'click'
        var searchcontainer = document.getElementById('searchcontainer')
        var searchfield = document.getElementById('search-terms')
        var searchlabel = document.getElementById('search-label')

        searchlabel.addEventListener(touchorclick, function(e) { // when user clicks on search label
            searchcontainer.classList.toggle('opensearch') // add or remove 'opensearch' to searchcontainer
            if (!searchcontainer.classList.contains('opensearch')) { // if hiding searchcontainer
                searchfield.blur() // blur search field
                e.preventDefault() // prevent default label behavior of focusing on search field again
            }
            e.stopPropagation() // stop event from bubbling upwards
        }, false)

        searchfield.addEventListener(touchorclick, function(e) { // when user clicks on search field
            e.stopPropagation() // stop event from bubbling upwards
        }, false)

        document.addEventListener(touchorclick, function(e) { // when user clicks anywhere in document
            searchcontainer.classList.remove('opensearch')
            searchfield.blur()
        }, false)

    }

    
    /*---------------------
    Contact Form
    --------------------- */
    $('.cf-msg').hide();
    $('form#cf #submit').on('click', function() {

        var firstName = $('#firstName').val();
        var email = $('#email').val();
        var msg = $('#msg').val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!regex.test(email)) {
            alert('Please enter valid email');
            return false;
        }

        firstName = $.trim(firstName);
        email = $.trim(email);
        msg = $.trim(msg);

        if (firstName != '' && email != '' && msg != '') {
            var values = "firstName=" + firstName + "&email=" + email + " &msg=" + msg;
            $.ajax({
                type: "POST",
                url: "assets/php/mail.php",
                data: values,
                success: function() {
                    $('#firstName').val('');

                    $('#email').val('');
                    $('#msg').val('');

                    $('.cf-msg').fadeIn().html('<div class="alert alert-success"><strong>Success!</strong> Email has been sent successfully.</div>');
                    setTimeout(function() {
                        $('.cf-msg').fadeOut('slow');
                    }, 4000);
                }
            });
        } else {
            $('.cf-msg').fadeIn().html('<div class="alert alert-danger"><strong>Warning!</strong> Please fillup the informations correctly.</div>')
        }
        return false;
    });



    // RTL Switcher
    $('.psg-icon').on('click', function(){
        $(this).parent().toggleClass('active');
    });



}(jQuery));