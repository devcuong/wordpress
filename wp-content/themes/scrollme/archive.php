<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package scrollme
 */

get_header(); ?>

	<div class="container clearfix">
		<div id="primary" class="content-area">

			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php while ( have_posts() ) : the_post(); ?>
					<?php
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content' );
					?>
				<?php endwhile; ?>

				<?php
                    the_posts_pagination();
				?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</div><!-- #primary -->

		<?php get_sidebar( 'right' ); ?>
	</div>

<?php get_footer(); ?>
