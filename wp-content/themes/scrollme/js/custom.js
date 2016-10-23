/**
 * For user experience
 */

jQuery(document).ready(function ($) {
    //Navigation toggle
    $('#toggle').click(function () {
        $(this).toggleClass('on');
        $('#colophon').toggleClass('fp-show');
    });

    $('.service-content:first').show();
    $('.service-tab:first').addClass('sm-active');

    $('.service-tab').click(function(){
    	var serviceId = $(this).attr('href');
    	$('.service-content').hide();
    	$(serviceId).show();
    	$('.service-tab').removeClass('sm-active');
    	$(this).addClass('sm-active');
    	return false;
    });

/*
    if( $(window).width() < 691 ) {
        $('#toggle').addClass('on');
    }

     $('#menu li a').click(function () {
         var win_width = $(window).width();
         if( win_width < 691 ) {
             $('#menu').hide();
             $('#toggle').toggleClass('on');
         }

     });
*/

    $('a.port-lbox-link').nivoLightbox();

    $(window).load(function () {
        $(window).resize(function () {
            var windowHeight = $(window).height();
            $('.slider-section .bx-viewport, .slider-section .bx-slides').height(windowHeight);
        }).resize();
    });


    // Bxslider Home
    $('.scrollme-slider').bxSlider({
        auto: true,
        pager: true,
        mode: sBxslider.transition,
        controls: false,
        pause: sBxslider.pause,
        speed: sBxslider.speed
    });

    // Number Counter
    $('.ak-counter').each(function () {
        var elm = $(this);
        var color = elm.attr("data-fgColor");
        var perc = elm.attr("value");
        $('.ak-counter').knob({
            angleArc: 180,
            readOnly: true,
            angleOffset: -90
        });

        $({value: 0}).animate({value: perc}, {
            duration: 1000,
            easing: 'swing',
            progress: function () {
                elm.val(Math.ceil(this.value)).trigger('change')
            }
        });


        //circular progress bar color
        $(this).append(function () {
            elm.parent().parent().find('.circular-bar-content').css('color', color);
            elm.parent().parent().find('.circular-bar-content label').text(perc + '%');
        });
    });

    // Animate counter widget when viewed
    startKnob =  function() {
        $('.ak-counter').each(function () {
            $(this).each(function () {
                $(this).animate({
                    value: $(this).data('number')
                }, {
                    duration: 2500,
                    easing: 'swing',
                    progress: function () {
                        $(this).val(Math.round(this.value)).trigger('change');
                    }
                });
            });
        });

    }

    $('.widget_scrollme-number-counter').one('inview', startKnob);

        var $container = $('#portfolio').imagesLoaded( function() {
    
        if( $('#portfolio-wrap').length > 0 ){
            
      	  GetMasonary();	
            
        	$container.isotope({
                layoutMode: 'packery',
                itemSelector: '.item',
                gutter:0,
                transitionDuration: "0.5s"
        	});     
        	
            $(window).on( 'resize', function () {
        	   GetMasonary();
        	});
        }
	});
    
    
    // Pre Loader
    $(window).load(function () {
        // Animate loader off screen
        $(".scrollme-preloader").fadeOut("slow");
    });

    // Scroll Sections
    if($('body').hasClass('page-template-tpl-home')){
        $('#fullpage').fullpage({
    
            //Custom selectors
            sectionSelector: '.scrollme-main-section',
            slideSelector: '.sec-slide',
    
            // Scrolling
            loopHorizontal: false,
            autoScrolling: false,
            responsiveWidth: 768,
    
            // Navigation
            menu: '#site-navigation',
    
            //Accessibility
            recordHistory: true,
    
            // Events
            afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){
                if( slideIndex == 0 ) {
                    $('.header-wrapper').addClass('hide-header').removeClass('show-header');
                    //$('.header-wrapper').hide(400);
                    $('#colophon').removeClass('fp-show');
                }else {
                    $('.header-wrapper').addClass('show-header').removeClass('hide-header');
                    //$('.header-wrapper').show(400);
                    $('#colophon').addClass('fp-show');
                }
    
                $('#site-navigation li').removeClass('current-menu-item');
                if( document.location.hash ) {
                    $('a[href="' + document.location + '"]').parent().addClass('current-menu-item');
                }else {
                    $('a[href="' + document.location + '#home"]').parent().addClass('current-menu-item');
                }
            },
    
            afterLoad: function(anchorLink, index){
                if( index == 1 ){
                    $('.header-wrapper').addClass('hide-header').removeClass('show-header');
                    //$('.header-wrapper').hide();
                    $('#colophon').removeClass('fp-show');
                }else {
                    $('.header-wrapper').addClass('show-header').removeClass('hide-header');
                    //$('.header-wrapper').show();
                    $('#colophon').addClass('fp-show');
                }
            }
        });
    }

    $('.toggle-nav').click(function(){
    	$('.site-footer').addClass('scroll-show').addClass('fp-show');
    });

    $('#toggle').click(function(){
    	$('.site-footer').removeClass('scroll-show');
    	$(this).addClass('on');
    });

    $(".s-panel-inner").mCustomScrollbar({
        theme: "dark-thin",
        axis:"y" // horizontal scrollbar
    });


    function GetMasonary(){
    var winWidth = window.innerWidth;
		columnNumb = 1;			
		var attr_col = $('#portfolio').attr('data-col');
			
		 if (winWidth >= 1466) {
			
			
			$('#portfolio-wrap').css( {width : $('#portfolio-wrap').parent().width() - 20 + 'px'});
			$('#portfolio-wrap.no-gutter').css( {width : $('#portfolio-wrap').parent().width() + 4 + 'px'});			
			var portfolioWidth = $('#portfolio-wrap').width();
			
			if (typeof attr_col !== typeof undefined && attr_col !== false) {
				columnNumb = $('#portfolio').attr('data-col');
			} else columnNumb = 3;
			
			postHeight = window.innerHeight
			postWidth = Math.floor(portfolioWidth / columnNumb)			
			$container.find('.item').each(function () { 
				$('.item').css( { 
					width : postWidth * 1 - 20 + 'px',
					height : postWidth * 1 - 20 + 'px',
					margin : 10 + 'px' 
				});
				$('.no-gutter .item').css( {
					width : postWidth + 'px',
					height : postWidth + 'px',
					margin : 0 + 'px' 
				});
				$('.item.wide').css( { 
					width : postWidth * 2 - 20 + 'px',
					height : postWidth * 2 - 20 + 'px'
				});
				$('.no-gutter .item.wide').css( { 
					width : postWidth * 2  + 'px',
					height : postWidth * 2  + 'px' 
				});
			});
			
			
		} else if (winWidth > 1024) {
			
			$('#portfolio-wrap').css( {width : $('#portfolio-wrap').parent().width() - 40 + 'px'});
			$('#portfolio-wrap.no-gutter').css( {width : $('#portfolio-wrap').parent().width() + 4 + 'px'});			
			var portfolioWidth = $('#portfolio-wrap').width();
						
			if (typeof attr_col !== typeof undefined && attr_col !== false) {
				columnNumb = $('#portfolio').attr('data-col');
			} else columnNumb = 3;
			
			postHeight = window.innerHeight
			postWidth = Math.floor(portfolioWidth / columnNumb)			
			$container.find('.item').each(function () { 
				$('.item').css( { 
					width : postWidth - 20 + 'px',
					height : postWidth  - 20 + 'px',
					margin : 10 + 'px' 
				});
				$('.no-gutter .item').css( {
					width : postWidth + 'px',
					height : postWidth + 'px',
					margin : 0 + 'px' 
				});
				$('.item.wide').css( { 
					width : postWidth * 2 - 20 + 'px',
					height : postWidth * 2 - 20 + 'px'
				});
				$('.no-gutter .item.wide').css( { 
					width : postWidth * 2 + 'px',
					height : postWidth * 2 + 'px' 
				});
			});
			
			
		} else if (winWidth > 767) {
			
			$('#portfolio-wrap').css( {width : $('#portfolio-wrap').parent().width() - 40 + 'px'});
			$('#portfolio-wrap.no-gutter').css( {width : $('#portfolio-wrap').parent().width() + 4 + 'px'});			
			var portfolioWidth = $('#portfolio-wrap').width();
			
			columnNumb = 2;
			postWidth = Math.floor(portfolioWidth / columnNumb)			
			$container.find('.item').each(function () { 
				$('.item').css( { 
					width : postWidth - 20 + 'px',
					height : postWidth  - 20 + 'px',
					margin : 10 + 'px' 
				});
				$('.no-gutter .item').css( {
					width : postWidth + 'px',
					height : postWidth + 'px',
					margin : 0 + 'px' 
				});
				$('.item.wide').css( { 
					width : postWidth * 2 - 20 + 'px',
					height : postWidth * 2 - 20 + 'px'
				});
				$('.no-gutter .item.wide').css( { 
					width : postWidth * 2 + 'px',
					height : postWidth * 2 + 'px' 
				});					
			});
			
			
		}	else if (winWidth > 479) {
			
			$('#portfolio-wrap').css( {width : $('#portfolio-wrap').parent().width() - 40 + 'px'});
			$('#portfolio-wrap.no-gutter').css( {width : $('#portfolio-wrap').parent().width() + 'px'});			
			var portfolioWidth = $('#portfolio-wrap').width();
			
			columnNumb = 1;
			postWidth = Math.floor(portfolioWidth / columnNumb)			
			$container.find('.item').each(function () { 
				$('.item').css( { 
					width : postWidth - 20 + 'px',
					height : postWidth  - 20 + 'px',
					margin : 10 + 'px' 
				});
				$('.no-gutter .item').css( {
					width : postWidth + 'px',
					height : postWidth + 'px',
					margin : 0 + 'px' 
				});
				$('.item.wide').css( { 
					width : postWidth  - 20 + 'px',
					height : postWidth  - 20 + 'px'
				});
				$('.no-gutter .item.wide').css( { 
					width : postWidth  + 'px',
					height : postWidth  + 'px' 
				});
			});	
		}
		
		else if (winWidth <= 479) {
			
			$('#portfolio-wrap').css( {width : $('#portfolio-wrap').parent().width() - 10 + 'px'});
			$('#portfolio-wrap.no-gutter').css( {width : $('#portfolio-wrap').parent().width() + 'px'});			
			var portfolioWidth = $('#portfolio-wrap').width();
			
			columnNumb = 1;
			postWidth = Math.floor(portfolioWidth / columnNumb)			
			$container.find('.item').each(function () { 
				$('.item').css( { 
					width : postWidth - 10 + 'px',
					height : postWidth  - 10 + 'px',
					margin : 5 + 'px' 
				});
				$('.no-gutter .item').css( {
					width : postWidth + 'px',
					height : postWidth + 'px',
					margin : 0 + 'px' 
				});
				$('.item.wide').css( { 
					width : postWidth  - 10 + 'px',
					height : postWidth  - 10 + 'px'
				});
				$('.no-gutter .item.wide').css( { 
					width : postWidth  + 'px',
					height : postWidth  + 'px' 
				});
			});
			
			
		}		
		return columnNumb;
    }

});