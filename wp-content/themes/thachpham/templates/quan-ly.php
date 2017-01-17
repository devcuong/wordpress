<?php
/*
 * Template Name: Trang quan-ly
 */
?>
<?php get_header(); ?>
<div class="content">
	<div class="action-content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>
                <?php else : ?>
                        <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
	</div>
	<div id="sidebar-second">  
        <?php get_sidebar("manage-right")?>
    </div>
</div>
<?php get_footer(); ?>