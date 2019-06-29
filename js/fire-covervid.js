$(window).resize(function() {
	var viewportHeight = $(window).height();
	var viewportWidth = $(window).width();			
	
	/* Check if fullpage is possible after resizing window */
	if (viewportHeight < 700 && fullPageActive == true) {
		$.fn.fullpage.destroy('all');
		fullPageActive = false;				
        $('video').get(0).play();	            
	} else {
		if (viewportHeight >= 700 && fullPageActive == false) {
			$('.fullpage').fullpage({
				scrollBar:true,
				autoScrolling: false,
				fitToSection: false,
				afterRender: function () {					
		            $('video').get(0).play();
	            }
			});
			fullPageActive = true;						
		}
	}
	
	/* Check if fullpage is possible after resizing window */
	if ( viewportWidth >= 992 && $('header').hasClass('opened') ) {
		navigation.close();
	}						
});

$(document).ready(function() {

	/* Activate fullpage if height is sufficient */
	var viewportHeight = $(window).height();
	var viewportWidth = $(window).width();				
	if (viewportHeight >= 700) {
		$('.fullpage').fullpage({
			scrollBar:true,
			autoScrolling: false,
			afterRender: function () {
	            //playing the video
	            $('.cover-video').coverVid(1280, 720);			            
	            $('video').get(0).play();		            
	        },
			fitToSection: false
		});
		fullPageActive = true;
	} else { 
		fullPageActive = false;
		/* Activate video if width is sufficient */					
        $('.cover-video').coverVid(1280, 720);
        $('video').get(0).play();			            				
	}
});