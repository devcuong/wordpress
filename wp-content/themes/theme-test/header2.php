<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	 
	if ( is_home() || is_front_page() ) 
		echo " ";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

 
<link href="<?php echo bloginfo('template_directory'); ?>/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet"> 
<link href="<?php echo bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
 
</head>

<body <?php body_class(); ?>>
	 
	<div id="top">		
		<div  class="container">
			<div class="row">
				<div class="col-xs-10"><span class="glyphicon glyphicon-envelope"></span>  aaaa@gmail.com ----
					<span class="glyphicon glyphicon-phone"></span>  097373737737
				</div>
				<div class="col-xs-2">
					<i class="fa fa-facebook-square"></i> 
					<i class="fa fa-twitter"></i>  
					<i class="fa fa-vimeo-square"></i> 
					<i class="fa fa-google-plus  "></i> 
				</div>
			</div>
		</div>
	</div>
	<div id="header" class="container">
		 
		<div class="row logo-menu">
			<div class ="col-md-4">
				<img src="<?php echo bloginfo('template_directory'); ?>/images/logo.png"/>
			</div>
			<div class ="col-md-8">
				<nav class="navbar nav-top" role="navigation">
					  
						<!--— -navbar-header để nhóm navbar lại khi toggle để hiển thị trên di động ---->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						</div>

						<!--—các thành phần navbar  ---->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
							
								<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'menu_class' => 'nav navbar-nav navbar-right','walker' => new wp_bootstrap_navwalker()) ); ?>
						 
						</div><!-- /.navbar-collapse -->
					  
				</nav>
			</div>
		</div>

 
	</div><!-- #header -->
	 
    	
	<div class ="clear"></div>

	<div id="main">
