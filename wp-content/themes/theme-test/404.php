<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
	<div id="main-min">
		<div id="container">
			<div id="content" role="main">
			<div class="breadcrumbs">
							<?php if(function_exists('bcn_display'))
                            {
                                bcn_display();
                            }?>
			   </div> 	

		 

			<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
				 
			</div><!-- #post-0 -->

			</div><!-- #content -->
				<h2 class="entry-title">  </h2>
				
				 
				
	</div><!-- #container -->
				
<?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>