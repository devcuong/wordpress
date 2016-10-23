<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				 

				 
							 
								<h2 class="border-title"><span> <i class="fa fa-windows"></i> <?php the_title(); ?></span> </h2>
								<span class="date-r "><i class="fa fa-calendar"></i>Đăng ngày:<?php the_time('d/m/ Y'); ?></span>
								<div class="clear"></div>
								<div class="block-content">
									<a href="<?php the_permalink(); ?>" class="float-left"><?php the_post_thumbnail(); ?></a>
									
									 <?php the_content(); ?> 
								</div>	
							 
					 

					 
 

					 	 

<?php endwhile; // end of the loop. ?>

