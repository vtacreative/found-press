<?php
/* ==========================================================================
   Header
   ========================================================================== */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="description" content="Your company description">
		<meta name="keywords" content="Your, Company, Keywords">
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
		<!--[if lt IE 9]>  
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->  
	</head>
	<body <?php body_class(); ?>>
	<div id="page" class="hfeed">
		<div class="row">
	    <div class="twelve columns panel">
      	<header role="banner">
					<hgroup>
						<h1><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display' )); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
						<h2><?php bloginfo( 'description' ); ?></h2>
					</hgroup>

					<nav role="navigation">
						<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
						<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					</nav><!-- #site-navigation -->

					<?php $header_image = get_header_image();
					if ( ! empty( $header_image ) ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
					<?php endif; ?>
				</header>
	    </div>
	  </div><!--/.row-->