<?php get_header(); ?>
<div class="content">
<div class="col-left">
	<?php get_sidebar('top-news')?>
    <div id="main-content">
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
        
        <?php get_template_part('content', get_post_format()) ?>
        
        <?php endwhile ?>
        <?php thachpham_pagination(); ?>
        <?php else: ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif ?>
    </div>
</div>
    <div id="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>