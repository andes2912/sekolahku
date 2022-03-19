(function($) {

    "use strict";

    // Document ready function 
    $(function() {

        /* Fixing for hover effect at IOS */
        $('*').on('touchstart', function() {
            $(this).trigger('hover');
        }).on('touchend', function() {
            $(this).trigger('hover');
        });

        var priceSlider = document.getElementById('price-range-filter');
        if (priceSlider) {
            noUiSlider.create(priceSlider, {
                start: [20, 80],
                connect: true,
                /*tooltips: true,*/
                range: {
                    'min': 0,
                    'max': 100
                },
                format: wNumb({
                    decimals: 0
                }),
            });
            var marginMin = document.getElementById('price-range-min'),
                marginMax = document.getElementById('price-range-max');

            priceSlider.noUiSlider.on('update', function(values, handle) {
                if (handle) {
                    marginMax.innerHTML = "$" + values[handle];
                } else {
                    marginMin.innerHTML = "$" + values[handle];
                }
            });
        }
        if ($('.gallery-wrapper, #gallery-wrapper').length) {

            $('.gallery-wrapper, #gallery-wrapper').magnificPopup({
                type: 'image',
                delegate: 'a.zoom',
                gallery: {
                    enabled: true
                }
            });
        }

        /*-------------------------------------
         Popup
         -------------------------------------*/

        if ($(".popup-youtube").length) {

            $('.popup-youtube').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        }

        /*-------------------------------------
         On click loadmore functionality
         -------------------------------------*/
        $('.loadmore').on('click', 'a', function(e) {
            e.preventDefault();
            var _this = $(this),
                _parent = _this.parents('.courses-list-wrapper'),
                _target = _parent.find('.courses-list'),
                _set = _target.find('.courses-item.hidden').slice(0, 2); // Here 2 is the limit
            if (_set.length) {
                _set.animate({ opacity: 0 });
                _set.promise().done(function() {
                    _set.removeClass('hidden');
                    _set.show().animate({ opacity: 1 }, 1000);
                });
            } else {
                _this.text('No more item to display');
            }

            return false;
        });

        /*-------------------------------------
         Input Quantity Up & Down activation code
         -------------------------------------*/
        $('#quantity-holder,#quantity-holder2').on('click', '.quantity-plus', function() {

            var $holder = $(this).parents('.quantity-holder');
            var $target = $holder.find('input.quantity-input');
            var $quantity = parseInt($target.val(), 10);
            if ($.isNumeric($quantity) && $quantity > 0) {
                $quantity = $quantity + 1;
                $target.val($quantity);
            } else {
                $target.val($quantity);
            }

        }).on('click', '.quantity-minus', function() {

            var $holder = $(this).parents('.quantity-holder');
            var $target = $holder.find('input.quantity-input');
            var $quantity = parseInt($target.val(), 10);
            if ($.isNumeric($quantity) && $quantity >= 2) {
                $quantity = $quantity - 1;
                $target.val($quantity);
            } else {
                $target.val(1);
            }

        });

        /*-------------------------------------
         Jquery Serch Box
         -------------------------------------*/

        $(document).on('click', '#search-button', function(e) {
            e.preventDefault();

            var targrt = $(this).prev('.search-form');
            targrt.animate({
                width: ["toggle", "swing"],
                height: ["toggle", "swing"],
                opacity: "toggle"
            }, 500, "linear");

            return false;

        });

    });

    /*-------------------------------------
     jQuery MeanMenu activation code
     --------------------------------------*/
    $('nav#dropdown').meanmenu({ siteLogo: "<a href='index.html' class='logo-mobile-menu'><img src='img/mobile-logo.png' /></a>" });

    /*-------------------------------------
     Wow js Active
     -------------------------------------*/
    new WOW().init();

    /*-------------------------------------
     Jquery Scollup
     -------------------------------------*/
    $.scrollUp({
        scrollText: '<i class="fa fa-arrow-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    /*-------------------------------------
     Window load function
     -------------------------------------*/
    $(window).on('load', function() {

        // Page Preloader
        $('#preloader').fadeOut('slow', function() {
            $(this).remove();
        });

        /*-------------------------------------
         jQuery for Isotope initialization
         -------------------------------------*/
        var $container = $('#inner-isotope');
        if ($container.length > 0) {

            var selector = $container.find('.isotop-classes-tab a.current').attr('data-filter');
            console.log(selector);
            // Isotope initialization
            var $isotope = $container.find('.featuredContainer').isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            // Isotope filter
            $container.find('.isotop-classes-tab').on('click', 'a', function() {

                var $this = $(this);
                $this.parent('.isotop-classes-tab').find('a').removeClass('current');
                $this.addClass('current');
                var selector = $this.attr('data-filter');
                $isotope.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;

            });
        }
    }); // end window load function

    /*-------------------------------------
     About Counter
     -------------------------------------*/
    var aboutContainer = $('.about-counter');
    if (aboutContainer.length) {
        aboutContainer.counterUp({
            delay: 50,
            time: 5000
        });

    }

    /*-------------------------------------
     Select2 activation code
     -------------------------------------*/
    if ($('#checkout-form select.select2').length) {
        $('#checkout-form select.select2').select2({
            theme: 'classic',
            dropdownAutoWidth: true,
            width: '100%'
        });
    }

    // Gridrotator
    var riGrid = $('#ri-grid');
    if (riGrid.length) {
        riGrid.gridrotator({
            rows: 3,
            columns: 14,
            animType: 'random',
            animSpeed: 1000,
            interval: 600,
            step: 1,
            w1024: {
                rows: 3,
                columns: 8
            },
            w768: {
                rows: 3,
                columns: 6
            },
            w480: {
                rows: 3,
                columns: 4
            },
            w320: {
                rows: 3,
                columns: 4
            },
            w240: {
                rows: 3,
                columns: 4
            }
        });
    }

    /*-------------------------------------
     Contact Form processing
     -------------------------------------*/
    var contactForm = $('#contact-form');
    if (contactForm.length) {
        contactForm.validator().on('submit', function(e) {
            var _this = $(this),
                target = contactForm.find('.form-response');
            if (e.isDefaultPrevented()) {
                target.html("<div class='alert alert-danger'><p>Please select all required field.</p></div>");
            } else {
                $.ajax({
                    url: "vendor/php/form-process.php",
                    type: "POST",
                    data: contactForm.serialize(),
                    beforeSend: function() {
                        target.html("<div class='alert alert-info'><p>Loading ...</p></div>");
                    },
                    success: function(text) {
                        if (text === "success") {
                            _this[0].reset();
                            target.html("<div class='alert alert-success'><p><i class='fa fa-check' aria-hidden='true'></i>Message has been sent successfully.</p></div>");
                        } else {
                            target.html("<div class='alert alert-danger'><p>" + text + "</p></div>");
                        }
                    }
                });
                return false;
            }
        });
    }

    /*-------------------------------------
     Reservation Form initiating
     -------------------------------------*/
    var questionForm = $('#question-form');
    if (questionForm.length) {

        questionForm.validator().on('submit', function(e) {
            var _this = $(this),
                target = questionForm.find('.form-response');
            if (e.isDefaultPrevented()) {
                target.html("<div class='alert alert-danger'><p>Please select all required field.</p></div>");
            } else {
                $.ajax({
                    url: "vendor/php/question-form-process.php",
                    type: "POST",
                    data: questionForm.serialize(),
                    beforeSend: function() {
                        target.html("<div class='alert alert-info'><p>Loading ...</p></div>");
                    },
                    success: function(text) {
                        if (text === "success") {
                            _this[0].reset();
                            target.html("<div class='alert alert-success'><p>Successfully Send.</p></div>");
                        } else {
                            target.html("<div class='alert alert-danger'><p>" + text + "</p></div>");
                        }
                    }
                });
                return false;
            }
        });

    }

    /*-------------------------------------
     Countdown activation code
     -------------------------------------*/
    $('#countdown').countdown('2020/01/01', function(e) {

        $(this).html(e.strftime("<div class='countdown-section'><h3>%D</h3> <p>Day%!D</p> </div><div class='countdown-section'><h3>%H</h3> <p>Hour%!H</p> </div><div class='countdown-section'><h3>%M</h3> <p>Minute%!M</p> </div><div class='countdown-section'><h3>%S</h3> <p>Second%!S</p> </div>"));

    });

    /*-------------------------------------
     Carousel slider initiation
     -------------------------------------*/
    $('.rc-carousel').each(function() {
        var carousel = $(this),
            loop = carousel.data('loop'),
            items = carousel.data('items'),
            margin = carousel.data('margin'),
            stagePadding = carousel.data('stage-padding'),
            autoplay = carousel.data('autoplay'),
            autoplayTimeout = carousel.data('autoplay-timeout'),
            smartSpeed = carousel.data('smart-speed'),
            dots = carousel.data('dots'),
            nav = carousel.data('nav'),
            navSpeed = carousel.data('nav-speed'),
            rXsmall = carousel.data('r-x-small'),
            rXsmallNav = carousel.data('r-x-small-nav'),
            rXsmallDots = carousel.data('r-x-small-dots'),
            rXmedium = carousel.data('r-x-medium'),
            rXmediumNav = carousel.data('r-x-medium-nav'),
            rXmediumDots = carousel.data('r-x-medium-dots'),
            rSmall = carousel.data('r-small'),
            rSmallNav = carousel.data('r-small-nav'),
            rSmallDots = carousel.data('r-small-dots'),
            rMedium = carousel.data('r-medium'),
            rMediumNav = carousel.data('r-medium-nav'),
            rMediumDots = carousel.data('r-medium-dots'),
            rLarge = carousel.data('r-large'),
            rLargeNav = carousel.data('r-large-nav'),
            rLargeDots = carousel.data('r-large-dots'),
            center = carousel.data('center');

        carousel.owlCarousel({
            loop: (loop ? true : false),
            items: (items ? items : 4),
            lazyLoad: true,
            margin: (margin ? margin : 0),
            autoplay: (autoplay ? true : false),
            autoplayTimeout: (autoplayTimeout ? autoplayTimeout : 1000),
            smartSpeed: (smartSpeed ? smartSpeed : 250),
            dots: (dots ? true : false),
            nav: (nav ? true : false),
            navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>"],
            navSpeed: (navSpeed ? true : false),
            center: (center ? true : false),
            responsiveClass: true,
            responsive: {
                0: {
                    items: (rXsmall ? rXsmall : 1),
                    nav: (rXsmallNav ? true : false),
                    dots: (rXsmallDots ? true : false)
                },
                480: {
                    items: (rXmedium ? rXmedium : 2),
                    nav: (rXmediumNav ? true : false),
                    dots: (rXmediumDots ? true : false)
                },
                768: {
                    items: (rSmall ? rSmall : 3),
                    nav: (rSmallNav ? true : false),
                    dots: (rSmallDots ? true : false)
                },
                992: {
                    items: (rMedium ? rMedium : 5),
                    nav: (rMediumNav ? true : false),
                    dots: (rMediumDots ? true : false)
                },
                1199: {
                    items: (rLarge ? rLarge : 6),
                    nav: (rLargeNav ? true : false),
                    dots: (rLargeDots ? true : false)
                }
            }
        });

    });

    /*-------------------------------------
     Window onLoad and onResize event trigger
     -------------------------------------*/
    $(window).on('load resize', function() {
        //Define the maximum height for mobile menu
        var wHeight = $(window).height(),
            mLogoH = $('a.logo-mobile-menu').outerHeight();
        wHeight = wHeight - 50;
        $('.mean-nav > ul').css('height', wHeight + 'px');

    });

    /*-------------------------------------
     Jquery Stiky Menu at window Load
     -------------------------------------*/
    $(window).on('scroll', function() {

        var s = $('#sticker'),
            w = $('.wrapper'),
            h = s.outerHeight(),
            windowpos = $(window).scrollTop(),
            windowWidth = $(window).width(),
            h1 = s.parent('#header1'),
            h2 = s.parent('#header2'),
            h3 = s.parent('#header3'),
            h3H = h3.find('.header-top-area').outerHeight(),
            topBar = s.prev('.header-top-area');

        if (windowWidth > 767) {
            w.css('padding-top', '');
            var topBarH, mBottom = 0;
            if (h1.length) {
                topBarH = mBottom = h1.find('.main-menu-area').outerHeight();
            } else if (h2.length) {
                mBottom = h2.find('.main-menu-area').outerHeight();
                topBarH = topBar.outerHeight();
            } else if (h3.length) {
                topBarH = topBar.outerHeight();
                if (windowpos <= topBarH) {
                    h3.css('top', '-' + windowpos + 'px');
                }
            }
            if (windowpos >= topBarH) {
                if (h2.length) {
                    s.addClass('stick');
                    topBar.css('margin-bottom', mBottom + 'px');
                }
                if (h3.length) {
                    s.addClass('stick');
                    h3.css('top', '-' + topBarH + 'px');
                }
            } else {
                s.removeClass('stick');
                if (h2.length) {
                    topBar.css('margin-bottom', 0);
                }
            }
        }

    });

    /* Rating selection*/
    $('#review-form').on('click', '.rate-wrapper .rate .rate-item', function() {
        var self = $(this),
            target = self.parent('.rate');
        target.addClass('selected');
        target.find('.rate-item').removeClass('active');
        self.addClass('active');
    });

    /*-------------------------------------
     Accordion for fixing F&Q
     -------------------------------------*/
    var faqAccordion = $('#faq-accordian');
    faqAccordion
        .on('show.bs.collapse', function(e) {
            faqAccordion.find('.panel-heading').removeClass('active');
            $(e.target).parents('.panel').find('.panel-heading').addClass('active');
            faqAccordion.find('.panel-collapse.collapse').slideUp('slow', function() {
                $(this).removeClass('in').css('display', '');
            });
        });

    /*-------------------------------------
     Accordion
     -------------------------------------*/
    var accordion = $('#accordion');
    accordion.find('.panel-collapse').each(function() {
        if ($(this).hasClass('in')) {
            $(this).parents('.panel').find('.panel-heading').addClass('active');
        }
    });
    accordion
        .on('show.bs.collapse', function(e) {
            $(e.target).parents('.panel').find('.panel-heading').addClass('active');
        })
        .on('hide.bs.collapse', function(e) {
            $(e.target).parents('.panel').find('.panel-heading').removeClass('active');
        });

    /* login pop up foem */
    $('#login-button').on('click', function(e) {
        e.preventDefault();
        var self = $(this),
            target = self.next('#login-form');
        if (self.hasClass('open')) {
            target.slideUp('slow');
            self.removeClass('open');
        } else {
            target.slideDown('slow');
            self.addClass('open');
        }
    });

    $('#login-form').on('click', '.form-cancel', function(e) {
        e.preventDefault();
        var self = $(this),
            parent = self.parents('#login-form'),
            loginButton = parent.prev('#login-button');
        parent.slideUp('slow');
        loginButton.removeClass('open');
    });


    /*-------------------------------------
     Google Map
     -------------------------------------*/
    if ($('#googleMap').length) {

        //Map initialize
        var initialize = function() {
            var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: new google.maps.LatLng(-37.81618, 144.95692)
            };
            var map = new google.maps.Map(document.getElementById("googleMap"),
                mapOptions);
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                animation: google.maps.Animation.BOUNCE,
                icon: 'img/map-marker.png',
                map: map
            });
        }

        google.maps.event.addDomListener(window, "load", initialize);
    }

})(jQuery);
