<?php get_header(); ?>
<div class="content">
			<h2>Search Result</h2>
    <div id="main-content">
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <?php get_template_part('search-result', get_post_format()); ?>
        
        <?php endwhile ?>
        <?php else: ?>
            <?php get_template_part('search-result', 'none'); ?>
        <?php endif ?>
    </div>
    <div id="sidebar">  
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>