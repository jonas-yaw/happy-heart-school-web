/**
    *  flatOwl();
    *  headerFixed();
    *  parallax();
    *  flatIsotopeCourse();
    *  tabs();
    *  countDownTime();
    *  FlatClient();
    *  flatCounter();
    *  testimonialSlider();
    *  testimonialSlider2();
    *  flatEqualizeHeight();
    *  responsiveMenu();
    *  goTop();
    *  VideoPopup();
    *  contentBox();
    *  spacer();
    *  removePreloader();
*/

;(function($) {
    "use strict";

    var owl_one = $('.owl-one');
    owl_one.owlCarousel({
    items:3, 
    // items change number for slider display on desktop
  
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true
    });

    var flatOwl = function() {
        $(window).on('load resize', function() {
            if ( $().owlCarousel ) {
                $('.flat-carousel-box').each(function(){
                    var
                    $this = $(this),
                    auto = $this.data("auto"),
                    item = $this.data("column"),
                    item2 = $this.data("column2"),
                    item3 = $this.data("column3"),
                    item4 = $this.data("column4"),
                    loops = $this.data("loop"),
                    
                    gap = Number($this.data("gap")),
                   
                    dots = $this.data("dots"),
                    nav = $this.data("nav");

                    $this.find('.owl-carousel').owlCarousel({
                        margin: gap,
                        loop:true,
                        dots:dots,
                        nav: nav,
                        navigation : true,
                        pagination: true,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        responsive: {
                            0:{
                                items:item4
                            },
                            600:{
                                items:item3
                            },
                            768:{
                                items:item2
                            },
                            1000:{
                                items:item
                            }
                        }
                    });
                    $('.owl-dot').each(function(){

                        $(this).children('span').html($(this).index()+1);

                        $(this).children('span').addClass(" btn-dots btn-defect");

                    });
                });
            }
        });
    };

    var shuffleme = function() {
        var $grid = $('#grid'), //locate what we want to sort
            $filterOptions = $('.portfolio-sorting li'), //locate the filter categories
            $sizer = $grid.find('.shuffle_sizer'), //sizer stores the size of the items
            init = function() {
                // None of these need to be executed synchronously
                setTimeout(function() {
                    listen();
                    setupFilters();
                }, 100);
                // instantiate the plugin
                $grid.shuffle({
                    itemSelector: '[class*="col-"]',
                    sizer: $sizer
                });
            },
            // Set up button clicks
            setupFilters = function() {
                var $btns = $filterOptions.children();
                $btns.on('click', function(e) {
                    e.preventDefault();
                    var $this = $(this),
                        isActive = $this.hasClass('active'),
                        group = isActive ? 'all' : $this.data('group');
                    // Hide current label, show current label in title
                    if (!isActive) {
                        $('.portfolio-sorting li a').removeClass('active');
                    }
                    $this.toggleClass('active');
                    // Filter elements
                    $grid.shuffle('shuffle', group);
                });
                $btns = null;
            },
            // Re layout shuffle when images load. This is only needed
            // below 768 pixels because the .picture-item height is auto and therefore
            // the height of the picture-item is dependent on the image
            // I recommend using imagesloaded to determine when an image is loaded
            // but that doesn't support IE7
            listen = function() {
                var debouncedLayout = $.throttle(300, function() {
                    $grid.shuffle('update');
                });
                // Get all images inside shuffle
                $grid.find('img').each(function() {
                    var proxyImage;
                    // Image already loaded
                    if (this.complete && this.naturalWidth !== undefined) {
                        return;
                    }
                    // If none of the checks above matched, simulate loading on detached element.
                    proxyImage = new Image();
                    $(proxyImage).on('load', function() {
                        $(this).off('load');
                        debouncedLayout();
                    });
                    proxyImage.src = this.src;
                });
                // Because this method doesn't seem to be perfect.
                setTimeout(function() {
                    debouncedLayout();
                }, 500);
            };
        return {
            init: init
        };
    };

    
    
    var headerFixed = function() {
        var top_height = $('.top-bar').height(),
        hd_height = $('.header').height(); 
        $(window).on('load scroll resize', function() { 
            var header = $(".header");
            var offset = 0;
            if (typeof(header.data('offset')) != 'undefined') {
                offset = header.data('offset');
            }

            $('.header.header-sticky').css('top',0);
            if ( top_height > 0 ){
                if ( $(window).scrollTop() >= top_height + hd_height + 20 ) { 
                    header.addClass('header-sticky');
                } else {  
                    header.removeClass('header-sticky'); 
                }
            }
            else{
                if ( $(window).scrollTop() >= hd_height ) { 
                    header.addClass('header-sticky');
                } else {  
                    header.removeClass('header-sticky'); 
                }
            } 
        });    
    };

    var parallax = function() {
        if ( $().parallax  ) {
            $('.parallax1').parallax("50%", -0.12);
            $('.parallax2').parallax("50%", -0.4);
            $('.parallax3').parallax("50%", -0.9);                
        }
    };

    var flatIsotopeCourse = function() {
        $(".flat-courses").each(function () {
            if ( $().isotope ) {           
                var $container = $('.isotope-courses');
                $container.imagesLoaded(function(){

                    $container.isotope({
                        itemSelector: '.course',
                        transitionDuration: '1s',
                        layoutMode: 'fitRows'
                    });
                });

                $('.flat-filter-isotype li').on('click',function() {                           
                    var selector = $(this).find("a").attr('data-filter');
                    $('.flat-filter-isotype li').removeClass('active');
                    $(this).addClass('active');
                    $container.isotope({ filter: selector });
                    return false;
                });
            };
        });         
    };

    var tabs =  function() {
        $('.flat-tabs').each(function(){
            var 
            list ="",
            title = $(this).find('.item-title'),
            titleWrap = $(this).children('.tab-title') ;

            $(this).find('.tab-title li').filter(':first').addClass('active');
            $(this).find('.tab-content-wrap').children().hide().filter(':first').addClass('active').show();

            $(this).find('.tab-title li').on('click', function(e) {
                var
                idx = $(this).index(),
                content = $(this).closest('.flat-tabs').find('.tab-content-wrap').children().eq(idx);

                $(this).addClass('active').siblings().removeClass('active');
                content.fadeIn('slow').addClass('active').siblings().hide().removeClass('active');

                e.preventDefault();
            });
        });
    };

    var countDownTime =function () {
        $(".count-time").each(function() {
            var day = $(".count-time").data("day"),
                month = $(".count-time").data("month")-1,
                year = $(".count-time").data("year"),
                hour = $(".count-time").data("hour"),
                minute = $(".count-time").data("minutes"),
                second = $(".count-time").data("second");
    
            var countDownDate = new Date(year,month,day,hour,minute,second).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                  var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                $(".days .numb").html(days);
                $(".hours .numb").html(hours);
                $(".minutes .numb").html(minutes);
                $(".seconds .numb").html(seconds);
                
                // If the count down is finished, write some text 
                if (distance < 0) {
                    clearInterval(x);
                    $(".days .numb").html("0");
                    $(".hours .numb").html("0");
                    $(".minutes .numb").html("0");
                    $(".seconds .numb").html("0");
                }
            }, 1000);
        });
    };

    var FlatClient =  function(){
        $('.partner-clients').each(function() {            
            if ( $().owlCarousel ) {                
                $('.slide-client').owlCarousel({
                    loop: true,
                    margin: $('.slide-client').data('gap'),
                    nav: $('.slide-client').data('nav'), 
                    dots: $('.slide-client').data('dots'), 
                    autoplay: $('.slide-client').data('auto'),                    
                    responsive:{
                        0:{
                            items: 2
                        },

                        600: {
                            items: 3
                        },

                        1000: {
                            items: $('.slide-client').data('item')
                        }
                    }
                });
            }
        });
    };
    
    var flatCounter = function() {
        if ( $().countTo ) {
            $('.counter').find('.numb-count').each(function() {
                var to = $(this).data('to'),
                    speed = $(this).data('speed');
              
                $(this).countTo({
                    to: to,
                    speed: speed
                });
            });
        }
    };

    var testimonialSlider = function() {
        $('.flat-testimonials-slider').each(function(){
            $('.flat-testimonials-slider').flexslider({
                animation: "slide",
                controlNav: "thumbnails",
                directionNav: false,
            });
        });   
    }; 

    var testimonialSlider2 = function() {
        $(window).on('load resize',function(){
            $('#carousel-testimonial').each(function(){
                $('#carousel-testimonial').flexslider({
                    animation: "slide",
                    controlNav: true,
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: 110,
                    directionNav:false,
                    itemMargin: 0,
                    asNavFor: '#slider-testimonial'
                });

                $('#slider-testimonial').flexslider({
                    animation: "slide",
                    controlNav: true,
                    animationLoop: false,
                    slideshow: false,
                    directionNav:false,
                    sync: "#carousel-testimonial"
                });
            });  
        });
    }; 

    var flatEqualizeHeight = function() {
        $(window).on('load resize', function () {
            setTimeout(function () {
                $(document).imagesLoaded(function () {
                    if ( matchMedia( 'only screen and (max-width: 767px)' ).matches ) {
                        $('.equalize').equalize({equalize: 'outerHeight', reset: true});
                        $('.equalize.sm-equalize-auto').children().css("height", "");
                        return false;
                    } else if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {
                        $('.equalize').equalize({equalize: 'outerHeight', reset: true});
                        $('.equalize.sm-equalize-auto').children().css("height", "");
                        return false;
                    } else if ( matchMedia( 'only screen and (max-width: 1199px)' ).matches ) {
                        $('.equalize').equalize({equalize: 'outerHeight', reset: true});
                        return false;
                    } else {
                        $('.equalize').equalize({equalize: 'outerHeight', reset: true});
                    }
                });
            }, 500);
        });
    };

    var responsiveMenu = function() {
        var menuType = 'desktop';

        $(window).on('load resize', function() {
            var currMenuType = 'desktop';

            if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {
                currMenuType = 'mobile';
            }

            if ( currMenuType !== menuType ) {
                menuType = currMenuType;

                if ( currMenuType === 'mobile' ) {
                    var $mobileMenu = $('#main-nav').attr('id', 'mainnav-mobi').hide();
                    var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');                    

                    $('.header #header-menu').after($mobileMenu);
                    hasChildMenu.children('ul').hide();
                    hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
                    $('.btn-menu').removeClass('active');

                } else {
                    var $desktopMenu = $('#mainnav-mobi').attr('id', 'main-nav').removeAttr('style');

                    $desktopMenu.find('.submenu').removeAttr('style');
                    $('.header').find('#header-menu').append($desktopMenu);
                    $('.btn-submenu').remove();
                }
            }
        });

        $('.').on('click', function() {         
            $('#mainnav-mobi').slideToggle(300);
            $(this).toggleClass('active');
        });

        $(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
            $(this).toggleClass('active').next('ul').slideToggle(300);
            e.stopImmediatePropagation()
        });
    };

    var goTop =  function() {
        $(window).scroll(function() {
            if ( $(this).scrollTop() > 800 ) {
                $('#scroll-top').addClass('show');
            } else {
                $('#scroll-top').removeClass('show');
            }
        });

        $('#scroll-top').on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 1000 , 'easeInOutExpo');
            return false;
        });
    };
    
    var VideoPopup =  function() {
        $(".fancybox").on("click", function(){
            $.fancybox({
                href: this.href,
                type: $(this).data("type")
            }); 
            return false   
        });
    };

    var contentBox = function() {
        $(window).on('load resize', function() {
            var mode = 'desktop';
            if ( matchMedia( 'only screen and (max-width: 1440px)' ).matches ){
                mode = 'sdesktop';
            } 
            if ( matchMedia( 'only screen and (max-width: 1024px)' ).matches ){
                mode = 'ssdesktop';
            }
            if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ){
                mode = 'mobile';
            } 
            if ( matchMedia( 'only screen and (max-width: 767px)' ).matches ){
                mode = 'smobile';
            }

            $('.themesflat-content-box').each(function(){
                var padding = $(this).data('padding');
                if ( padding ) {
                    if ( mode === 'desktop' ) {
                        $(this).attr('style', 'padding:' + $(this).data('padding'))
                    } else if ( mode === 'sdesktop' ) {
                        $(this).attr('style', 'padding:' + $(this).data('sdesktoppadding'))
                    } else if ( mode === 'ssdesktop' ) {
                        $(this).attr('style', 'padding:' + $(this).data('ssdesktoppadding'))
                    } else if ( mode === 'mobile' ) {
                        $(this).attr('style', 'padding:' + $(this).data('mobipadding'))
                    } else if ( mode === 'smobile' ) {
                        $(this).attr('style', 'padding:' + $(this).data('smobipadding'))
                    }
                }

                var margin = $(this).data('margin');
                if ( margin ) {
                    if ( mode === 'desktop' ) {
                        $(this).attr('style', 'margin:' + $(this).data('margin'))
                    } else if ( mode === 'mobile' ) {
                        $(this).attr('style', 'margin:' + $(this).data('mobimargin'))
                    } else if ( mode === 'smobile' ) {
                        $(this).attr('style', 'margin:' + $(this).data('smobimargin'))
                    }
                }
            })
        });
    };

    var spacer = function() {
        $(window).on('load resize', function() {
            var mode = 'desktop';

            if ( matchMedia( 'only screen and (max-width: 991px)' ).matches )
                mode = 'mobile';

            if ( matchMedia( 'only screen and (max-width: 767px)' ).matches )
                mode = 'smobile';

            $('.flat-spacer').each(function(){
                if ( mode == 'desktop' ) {
                    $(this).attr('style', 'height:' + $(this).data('desktop') + 'px')
                } else if ( mode == 'mobile' ) {
                    $(this).attr('style', 'height:' + $(this).data('mobi') + 'px')
                } else {
                    $(this).attr('style', 'height:' + $(this).data('smobi') + 'px')
                }
            })

        });
    };

    var removePreloader = function() {        
        $(window).on("load", function () {
            $(".loader").fadeOut();
            $("#loading-overlay").delay(500).fadeOut('slow',function(){
                $(this).remove();
            }); 
        });
    };


    
    
// Dom Ready
    $(function() {
      flatOwl();
      shuffleme();
      headerFixed();
      parallax();
      flatIsotopeCourse();
      tabs();
      countDownTime();
      FlatClient();
      flatCounter();
      testimonialSlider();
      testimonialSlider2();
      flatEqualizeHeight();
      responsiveMenu();
      goTop();
      VideoPopup();
      contentBox();
      spacer();
      removePreloader();
      
    });
})(jQuery);


