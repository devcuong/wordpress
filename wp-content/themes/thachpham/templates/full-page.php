<?php 
	/*
	Template Name: Full Page
	*/
?>
<?php get_header(); ?>
<div class="content">
    <div id="full-content" class="full-width">
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?>
        <?php endwhile ?>
        <?php else: ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif ?>
    </div>
</div>
<?php get_footer(); ?>