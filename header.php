<!DOCTYPE html>
<?php 
	if ( is_page('green-web-check') && isset($_GET["url"]) && !empty($_GET["url"]) ) {
		global $greencheckResult, $greencheck;	
		$greencheck = esc_url(trim($_GET["url"]));
		$greencheck = str_replace('http://', '', $greencheck);
		$greencheck = str_replace('https://', '', $greencheck);
		$greencheck = explode("/",$greencheck);

		$response = wp_remote_get('https://api.thegreenwebfoundation.org/greencheck/'.$greencheck[0] . '?nocache=true', ['timeout' => 10]);
		$greencheckResult = json_decode(wp_remote_retrieve_body($response));
	} else { 
		global $greencheckResult;
		$greencheckResult = null; 
	}
?>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( is_page('green-web-check') && isset($greencheckResult) && isset($greencheckResult->green) && $greencheckResult->green ) { ?>
	    <meta property="og:type"            content="article" /> 
	    <meta property="og:url"             content="<?php echo get_permalink(); ?>?url=<?php echo $_GET["url"]; ?>" /> 
	    <meta property="og:title"           content="The Green Web Foundation" /> 	
	    <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/img/good-smiley-fb.png" />
	    <meta property="og:description"    content="The website <?php echo $greencheck[0]?> is hosted green. This hoster is using green energy / compensation for its services." />	     	
	<?php } ?>
	<?php if ( is_page('green-web-check') && isset($greencheckResult) && isset($greencheckResult->green) && !$greencheckResult->green ) { ?>
	    <meta property="og:type"            content="article" /> 
	    <meta property="og:url"             content="<?php echo get_permalink(); ?>?url=<?php echo $_GET["url"]; ?>" /> 
	    <meta property="og:title"           content="The Green Web Foundation" /> 	
	    <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/img/bad-smiley-fb.png" />
	    <meta property="og:description"    content="The website <?php echo $greencheck[0]?> is hosted grey or we are not sure about the greenness of the hoster." />	     	
	<?php } ?>	
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?> 
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="post-<?php the_ID(); ?>" <?php post_class('fullpage'); ?>>
		<div class="section">
			<header>
				<div class="container top-navigation">
					<div class="row">
						<h2 class="hidden">The Green Web Foundation</h2>
						<div class="logo col-md-2 col-sm-2 col-xs-5">
							<a href="<?php echo get_home_url() ?>" title="go to home"><img width="118" height="68" alt="logo greenweb" src="<?php echo get_stylesheet_directory_uri(); ?>/img/top-logo-greenweb.png"></a>
						</div>			
						<div class="col-md-10 col-sm-10 col-xs-7 navigation">
							<nav class="menu nav-collapse">
								<?php wp_nav_menu( array(	'menu' => 'Menu Left',
															'container' => false,
															'menu_class' => 'primary',														
															'depth' => 1
														)
												 ); ?>
								<?php wp_nav_menu( array(	'menu' => 'Menu Right',
															'container' => false,
															'menu_class' => 'second',
															'depth' => 1
														)
												 ); ?>																								
							</nav>
						</div>
					</div>
				</div>
				
				<div class="tagline">
					<div class="container">		
						<div class="row">
							<div class="col-md-12">
								<span>Together towards a green web</span>
							</div>
						</div>
					</div>
				</div>
						
			</header>
