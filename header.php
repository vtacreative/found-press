<?php
/* Header */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	
	<meta charset="utf-8">
	
	<title>Your Title Here</title>
	
	<meta name="description" content="<?php echo COMPANY_NAME; ?>">
	
	<meta name="keywords" content="Your, Company, Keywords">
	
	<meta name="viewport" content="width=device-width">
	
	<link rel="shortcut icon" href="/wp-content/themes/fp-child/img/favicon.ico">
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<?php wp_head(); ?>
	
	<!-- POLYFILLS TO ADDRESS IE8's LACK OF MEDIA QUERY SUPPORT
	 		 http://foundation.zurb.com/forum/posts/241-foundation-5-and-ie8 -->
	<!--[if lt IE 9]>  
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
  <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
  <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- GOOGLE ANALYTICS IF NEEDED
	<script>
	    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	    s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>-->
	
</head>

<body <?php body_class(); ?>>
	
	<a id="top"></a>
	
	<div id="page" class="hfeed">
		
		<div class="header-container">
			
			<div class="row">
				
	      <header class="large-4 columns" role="banner">
						
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo bloginfo('description'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/<?php echo COMPANY_SLUG; ?>-header-logo.png"></a>
					
				</header>
				

				<nav class="large-8 columns">
					
					<!-- remove 'text-right' class to float primary navigation back to the left -->
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'nav table', 'sort_column' => 'menu_order' ) ); ?>
					
				</nav>

				<?php $header_image = get_header_image();
				
				if ( !empty ( $header_image ) ) : ?>
				
					<a href="<?php echo esc_url(home_url('/')); ?>">
						
						<img src="<?php echo esc_url($header_image); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="found-press. get started fast with foundation 5">
						
					</a>
					
				<?php endif; ?>
				
			</div>
			
		</div><!--/.header-container-->