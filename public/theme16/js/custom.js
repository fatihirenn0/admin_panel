
(function ($) {
	'use strict';

	// Elements Animation
	AOS.init({
		disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  		duration: 1000, // values from 0 to 3000, with step 50ms
		once: true, // whether animation should happen only once - while scrolling down
	})

		ma5menu({
			menu: '.main_menu',
			activeClass: 'current',
			footer: '.slide_navi',
			position: 'right',
			closeOnBodyClick: true
		});
	
	
	$(window).on("scroll", function() {
		if($(window).scrollTop() > 50) {
			$(".header").addClass("sticky");
		} else {
			//remove the background property so it comes transparent again (defined in your css)
		   $(".header").removeClass("sticky");
		}
	});

	// Youtube
	var $ytvideoTrigger = $(".ytplay_btn");
	$ytvideoTrigger.on("click", function(evt) {  
		$(".ytube_video").addClass("play");
		$("#ytvideo")[0].src += "?autoplay=1";
	});
	
	// Aside info bar
	$('.aside_open').click(function(e){
		e.preventDefault();
		$('.aside_info').css("left", "0px");
	});

	$('.aside_close').click(function(e){
		e.preventDefault();
		$('.aside_info').css("left", "-500px");
	});
	
	new Swiper('.swiper_one', {
		// Optional parameters
		direction: 'horizontal',
		autoHeight: true,
		loop:true, 
		autoplay: {
			delay: 7000,
		  },
		  effect: 'fade',
		  fadeEffect: {
			crossFade: true
		  },
		// If we need pagination
		pagination: {
		  el: '.swiper-pagination',
		},
	  
		// Navigation arrows
		navigation: {
		  nextEl: '.swiper-button-next',
		  prevEl: '.swiper-button-prev',
		},
	  
		// And if we need scrollbar
		scrollbar: {
		  el: '.swiper-scrollbar',
		}, 
	  });

	 // Swiper: Slider
	 new Swiper('.swiper_post .swiper', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 0,
		// Navigation arrows
		navigation: {
		  nextEl: '.swiper-button-next',
		  prevEl: '.swiper-button-prev',
		},
		// If we need pagination
		pagination: {
		  el: '.swiper-pagination',
		  clickable: true
		},
        breakpoints: {
            600: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            991: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 15
            }
        }
    });
	// Swiper: Slider
	new Swiper('.swiper_team .swiper', {
	   loop: true,
	   slidesPerView: 1,
	   spaceBetween: 0,
	   // If we need pagination
	   pagination: {
		 el: '.swiper-pagination',
		 clickable: true
	   },
	   breakpoints: {
		600: {
			slidesPerView: 1,
			spaceBetween: 0
		},
		991: {
			slidesPerView: 2,
			spaceBetween: 30
		},
		1200: {
			slidesPerView: 3,
			spaceBetween: 30
		}
	   }
   });
	
	 // Swiper: Slider
	 new Swiper('.swiper_testimonial .swiper', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
		// Navigation arrows
		navigation: {
		  nextEl: '.swiper-button-next',
		  prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		},
    });
	// accordion
	$(".accordion").on("click",".accordion_tab", function () {
		$(this).next().slideDown();
		$(".accordion_info").not($(this).next()).slideUp();
	});

	$(".accordion").on("click",".item", function () {
		$(this).addClass("active").siblings().removeClass("active");
	});



        // Isotope Portfolio
      //  var iso = $grid.data('isotope');
        //var $filterCount = $('.filter-count');
$(window).on('load', function(){
		var $grid = $('.grid').isotope({
			itemSelector: '.grid-item', 
			percentPosition: true,
			layoutMode: 'masonry',
			transformsEnabled: true,
			transitionDuration: "700ms",
			resize: true,
			fitWidth: true,
			columnWidth: '.grid-sizer',
		});

        // bind filter button click
        $('.filters-button-group .button').on( 'click', function() {
            var filterValue = $( this ).attr('data-filter');
            // use filterFn if matches value
            $grid.isotope({ filter: filterValue });
          
        });

        // change is-checked class on buttons
        $('.filters-button-group').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
            });
		});	
    });

		

 
	

})(jQuery);
	