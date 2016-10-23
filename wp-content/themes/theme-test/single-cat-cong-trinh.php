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

		 

			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'single' );
			?>

			</div><!-- #content -->
				<h2 class="entry-title">  </h2>
				
				<?php $orig_post = $post;
				global $post;
				$categories = get_the_category($post->ID);
				if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
				
				$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page'=> 4, // Number of related posts that will be shown.
				'caller_get_posts'=>1,
				'orderby' => 'rand'
				);
				
				$my_query = new wp_query( $args );
				if( $my_query->have_posts() ) {
				echo '<div id="related_posts"><h3>Công trình liên quan :</h3><ul>';
				while( $my_query->have_posts() ) {
				$my_query->the_post();?>
				
				<li>
				
				<div class="item-pro">
				            
								<div class="thum_cat"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
								
								<div class="tit-inf"><h4><?php the_title(); ?></h4></div>
				
								
								
							</div>
				
				</li>
				<?
				}
				echo '</ul></div>';
				}
				}
				$post = $orig_post;
				wp_reset_query(); ?>
				
	</div><!-- #container -->
				
<?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>
