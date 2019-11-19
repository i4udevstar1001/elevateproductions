jQuery(document).ready(function($) {
    $(window).scroll(function(){
	  	if ($(window).scrollTop() >= 200) {
	    	$('.site-header').addClass('sticky-header');
	   	}
	   	else {
	    	$('.site-header').removeClass('sticky-header');
	   	}
	});

	$('.wrap-slide').slick({
	  	dots: false,
	  	infinite: true,
	  	speed: 500,
	  	fade: true,
	  	cssEase: 'linear',
	  	arrows: true
	});

	if ($('.scroll-to-top').length) {
        var scrollTrigger = 200,
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('.scroll-to-top').addClass('active');
                } else {
                    $('.scroll-to-top').removeClass('active');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('.scroll-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    };

    $('.site-header .menu-header').on('click',function(){
    	$(this).closest('.site-header').find('.menu-show').toggleClass('on');
    });
    $('.site-header .slide-menu-overlay').on('click',function(){
    	$(this).closest('.site-header').find('.menu-show').removeClass('on');
    });
    $('.site-header .menu-top .close').on('click',function(){
    	$(this).closest('.site-header').find('.menu-show').removeClass('on');
    });
});