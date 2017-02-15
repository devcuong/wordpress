<?php get_header(); ?>
<div class="content">
<div class="col-left">
	<div id="main-content">
				<h2>Search Result</h2>
			<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<?php get_template_part('search-result', get_post_format()); ?>
			
			<?php endwhile ?>
			<?php else: ?>
				<?php get_template_part('search-result', 'none'); ?>
			<?php endif ?>
	</div>
</div>
    <div id="sidebar">
        <?php get_sidebar('search'); ?>
    <div class="clear"></div>
    </div>
    <div id="sidebar-second">
        <?php get_sidebar('extra'); ?>
    </div>
</div>
<?php get_footer(); ?>