<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
	<div id="main-min">
		<div id="container">
			<div id="content" role="main">

<?php if ( have_posts() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php  while(have_posts()) : the_post(); ?> 
               
                <div class="item-news">
                     
                
                    <div class="thum_news"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
                    
                    <div class="exc-news">
						<div class="title-tt"><h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> </div>
						<span>Date:<?php the_time('d/ j/ Y'); ?></span>
						<?php the_excerpt(); ?>
					
					
					</div>
				</div><!-- .item-news --> 
        <?php endwhile;  ?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'twentyten' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
