<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<title><?php wp_title(''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	 
	wp_head();
?>

<link href="<?php echo bloginfo('template_directory'); ?>/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet"> 
<link href="<?php echo bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script> 

</head>

<body <?php body_class(); ?>>
	 
	<header id="top">		
		<div  class="container">

			<div class="row">
				<div class="col-lg-6 logo">  
					<a href="http://chungcumini.com.vn/" title="chung cu mini"><img class="img-responsive" src="<?php echo bloginfo('template_directory'); ?>/images/logochungcu1.png"/></a>   
				</div>
				<div class="col-lg-6 banner ">
					 <img style="margin-left:-10px;" class="img-responsive" src="<?php echo bloginfo('template_directory'); ?>/images/bannerQc2.jpg"/>   
				</div>
			</div>
		</div>
	</header>
	<nav id="menu"  >
		<div class="container"> 
			<div class ="col-lg-12">
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
							
								<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'menu_class' => 'nav navbar-nav navbar-left','walker' => new wp_bootstrap_navwalker()) ); ?>
						 
						</div><!-- /.navbar-collapse -->
					  
				</nav>
			</div>
		 
		</div>
 
	</nav><!-- #header -->
	 
    	
	<div class ="clear"></div>
<div  class="container">
			<div class="row duongdan">
	<?php 
if(!is_home()){
if(function_exists(simple_breadcrumb)) {simple_breadcrumb();}} ?> 
	</div>
</div>
	