<?php
add_theme_support( 'post-thumbnails' ); 	
add_image_size( 'news-thumb', 360, 150, true );

/* Register navigation */
add_action( 'init', 'register_my_menu' );	
function register_my_menu() {
  register_nav_menu('tgwf-main-navigation',__( 'TGWF Main Navigation' ));
  register_nav_menu('tgwf-secondary-navigation',__( 'TGWF Secondary Navigation' ));	  
}

/* Register our sidebars and widgetized areas. */
function tgwf_widgets_init() {
	register_sidebar( array(
		'name' => 'Footer left',
		'id' => 'footer_1',
		'before_widget' => '<div>',
 		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );	

	register_sidebar( array(
		'name' => 'Footer middle',
		'id' => 'footer_2',
		'before_widget' => '<div>',
 		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );	

}
add_action( 'widgets_init', 'tgwf_widgets_init' );

/* Register shortcodes */
function button_shortcode( $atts, $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'url' => '#',
			'target' => '_self'
		), $atts )
	);
   return '<a class="clearfix" href="' . $url . '" target="' . $target . '"><span class="cta pull-right">' . do_shortcode($content) . '<span class="fa fa-chevron-right"></span></span></a>';
}
add_shortcode( 'button', 'button_shortcode' );

function green_shortcode( $atts, $content = null ) {
   return '<span class="tgw-green">' . do_shortcode($content) . '</span>';
}
add_shortcode( 'green', 'green_shortcode' );

// Add Shortcode
function icon_round_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'icon' => 'circle-o'
		), $atts )
	);
	
	return '<span class="fa-stack fa-lg">
		  		<i class="fa fa-circle fa-stack-2x"></i>
		  		<i class="fa fa-' . $icon . ' fa-stack-1x fa-inverse"></i>
		  	</span>';
}
add_shortcode( 'icon_round', 'icon_round_shortcode' );	

function one_third_shortcode( $atts, $content = null ) {
   return '<div class="col-md-4 col-sm-4">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_third', 'one_third_shortcode' );

// Add Shortcode
function table_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'class' => '',
		), $atts )
	);

	// Code
return '<table class="table ' . $class . '"><tbody>' . do_shortcode($content) . '</tbody></table>';
}
add_shortcode( 'table', 'table_shortcode' );

function tr_shortcode( $atts, $content = null ) {
   return '<tr>' . do_shortcode($content) . '</tr>';
}
add_shortcode( 'tr', 'tr_shortcode' );

function td_shortcode( $atts, $content = null ) {
   return '<td>' . do_shortcode($content) . '</td>';
}
add_shortcode( 'td', 'td_shortcode' );


	/* Register homepage shortcodes */
	function tgwf_actions_shortcode( $atts , $content = null ) {
		return '<!-- Actions -->
				<article>
					<div class="container call-to-actions" id="article">
						<div class="row">'. do_shortcode($content) .'</div>
					</div>
				</article>';	
	}
	add_shortcode( 'tgwf_actions', 'tgwf_actions_shortcode' );	
	
	function tgwf_visual_smile_shortcode() {
		return '<!-- Visual smile -->
				<div class="visual-smile-wrapper">
					<div class="container visual-smile">
						<div class="row">
							<img class="img-responsive wow bounceInUp" data-wow-offset="150" src="' . get_stylesheet_directory_uri() . '/img/smile-on-face-green-hosting.png" alt="Green webhosting makes us smile">
						</div>
					</div>
				</div>';	
	}
	add_shortcode( 'tgwf_visual_smile', 'tgwf_visual_smile_shortcode' );
	
	function tgwf_visual_app_shortcode( $atts , $content = null ) { 
		
		// Attributes
		extract( shortcode_atts(
			array(
				'image' => get_stylesheet_directory_uri() .'/img/green-web-app.png'
			), $atts )
		);		
	?>
		<!-- Visual app -->
		<?php return '	<a id="the-green-web-app" class="scroll-anchor"></a>
						<section class="tgw-light-grey-bg page-scroll">
							<div class="container visual-app">
								<div class="row">
									<div class="col-md-6 col-sm-6 google">
										<img class="img-responsive" src="'. $image .'" alt="The Green Web App">
									</div>
									<div class="col-md-6 col-sm-6 details">
										' . do_shortcode($content) . ' 
									</div>				
								</div>
							</div>
						</section>';
	}
	add_shortcode( 'tgwf_visual_app', 'tgwf_visual_app_shortcode' );
	
	// Add Shortcode
	function tgwf_mission_shortcode( $atts , $content = null ) {
	
		// Attributes
		extract( shortcode_atts(
			array(
				'mission' => 'Together we make&nbsp;<br>80% of the internet&nbsp;<br>green in 5 years'
			), $atts )
		);
		
		return '<section>
					<div class="container-fluid who-are-we">
						<div class="row tgw-light-grey-bg">
							<div class="mission col-md-6 col-sm-6 tgw-green-bg text-right">
								<h2 class="wow slideInLeft"><span class="headliner">Mission:</span>&nbsp;<br>'. $mission .'</h2>									
							</div>
			
							<div class="details col-md-6 col-sm-6 tgw-light-grey-bg ">
								<div class="col-md-8">'. do_shortcode($content) .'</div>	
							</div>
						</div>
					</div>
				</section>';
	}
	add_shortcode( 'tgwf_mission', 'tgwf_mission_shortcode' );	

	/* Custom scripts */
	function customScriptStyles() {
		/* Clean up unused styles & scripts */
		wp_deregister_script( 'jquery' );
		
		/* Enqueue styles */		
		wp_enqueue_style( 'tgwf-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' , array(), '1.0', 'all' );
		wp_enqueue_style( 'tgwf-style',get_stylesheet_uri('tgwf-bootstrap'), array(), '1.0' , 'all' );
		wp_enqueue_style( 'tgwf-font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '1.0' , 'all' );
		wp_enqueue_style( 'tgwf-google-font-lato','//fonts.googleapis.com/css?family=Lato:100,300,400,700', array(), '1.0' , 'all' );
		wp_enqueue_style( 'tgwf-google-font-raleway','//fonts.googleapis.com/css?family=Raleway:400,600', array(), '1.0' , 'all' );
		wp_enqueue_style( 'tgwf-navigations', get_stylesheet_directory_uri() . '/css/responsive-nav.css' , array(), '1.0', 'all' );		
		
		/* Enqueue scripts */
		wp_enqueue_script( 'tgwf-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js' , array(), '', false );
		wp_enqueue_script( 'tgwf-jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js' , array('tgwf-jquery'), '', true );			
		wp_enqueue_script( 'tgwf-nav', get_stylesheet_directory_uri() . '/js/responsive-nav.min.js' , array(), '1.0', false );
		wp_enqueue_script( 'tgwf-slimscroll', get_stylesheet_directory_uri() . '/js/jquery.slimscroll.min.js' , array('tgwf-jquery-ui'), '1.0', true );
		wp_enqueue_script( 'tgwf-smoothscroll', get_stylesheet_directory_uri() . '/js/jquery.easing.min.js' , array('tgwf-jquery'), '1.0', true );	
		
		if ( is_front_page() ) {
			/* Enqueue styles */	
			wp_enqueue_style( 'tgwf-fullpage', get_stylesheet_directory_uri() . '/css/jquery.fullPage.css' , array(), '1.0', 'all' );		
			wp_enqueue_style( 'tgwf-animate', get_stylesheet_directory_uri() . '/css/animate.css' , array(), '1.0', 'all' );
			
			/* Enqueue scripts */			
			wp_enqueue_script( 'tgwf-chartjs', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js' , array('tgwf-jquery'), '1.0', true );
			wp_enqueue_script( 'tgwf-fullpage', get_stylesheet_directory_uri() . '/js/jquery.fullPage.min.js' , array('tgwf-jquery'), '1.0', true );
			wp_enqueue_script( 'tgwf-wow', get_stylesheet_directory_uri() . '/js/wow.min.js' , array('tgwf-jquery'), '1.0', false );
			wp_enqueue_script( 'tgwf-covervid', get_stylesheet_directory_uri() . '/js/covervid.js' , array('tgwf-jquery'), '1.0', true );
			wp_enqueue_script( 'tgwf-fire-covervid', get_stylesheet_directory_uri() . '/js/fire-covervid.js' , array('tgwf-covervid'), '1.0', true );
			wp_enqueue_script( 'tgwf-moment', get_stylesheet_directory_uri() . '/js/moment.js' , array('tgwf-jquery'), '', false );	 
			wp_enqueue_script( 'tgwf-numeral', get_stylesheet_directory_uri() . '/js/numeral.js', array(), '1.0', true );			
			wp_enqueue_script( 'tgwf-app-link', get_stylesheet_directory_uri() . '/js/browserdetect.js' , array(), '1.0', true );  	
		}
	}
	add_action('wp_enqueue_scripts', 'customScriptStyles');

function footerScripts() { ?>
<script type="text/javascript">
	/* Make navigation sticky */
	var stickyNavTop = 40;  	  
	var stickyNav = function(){  
		var scrollTop = $(window).scrollTop(); 
		if (scrollTop > stickyNavTop) {   
			$('header').addClass('sticky');
		} else {  
			$('header').removeClass('sticky');		    			      
		}  
	};  
	stickyNav();  
	$(window).scroll(function() {  
		stickyNav();  
	});
	
	/* Activate hamburger menu */
	var navigation = responsiveNav(".nav-collapse", {
		animate: false,
		openPos: "static",
		open: function(){
			$('header').toggleClass('opened');
		},
		close: function(){
			$('header').toggleClass('opened');
		}		    
	});
</script>
<?php if ( is_front_page() ): ?>
<script type="text/javascript">
	new WOW().init();
	
	//distill anchor from link
	jQuery.fn.exists = function(){return this.length>0;}
	if ($('nav ul li a[title="app"]').exists() ) {
		var link = $('nav ul li a[title="app"]').attr('href');	    	
		var anchorLink = link.substr(link.indexOf('#'),link.length - link.indexOf('#'));
		$('nav ul li a[title="app"]').attr('href',anchorLink);	    	
		$('nav ul li a[title="app"]').addClass('page-scroll');
	}
	
	
	$('a.page-scroll').bind('click', function(event) {
		var $anchor = $(this);
		$("html, body").stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 1500, 'easeInOutExpo');
		event.preventDefault();
	});		    	
	
	$(document).ready(function(){
		activityFeed();
		getTotalStats();
		$('.visual-app .cta').parent().attr("href", BrowserDetect.link);
	});
	
</script>    
<?php endif; ?>

<?php if ( is_page('directory') ) { ?>
<script type="text/javascript">
	$(document).ready(function() {
		attachDirectory();
	});
</script>
<?php } ?> 

<?php if ( is_page('green-web-check') ) { ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.call-download .cta').attr("href", BrowserDetect.link);
	});
</script>
<?php } ?>     

<?php }
	add_filter( 'wp_footer', 'footerScripts' );
	