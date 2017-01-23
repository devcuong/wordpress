<?php get_header(); ?>
<?php get_sidebar('top-content') ?>
<div class="content">
<div class="col-left">
	<?php /* get_sidebar('top-news') */?>
    <div id="main-content">
	<div id="most_view_title" class="title_n">
          <h3>Tin rao dành cho bạn</h3>
    </div>
	<div style="clear: both;"></div>
	<div class="line_gr"></div>
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
    <div class="clear"></div>
    </div>
    <div id="sidebar-second">
        <?php get_sidebar('extra'); ?>
    </div>
</div>
<?php get_footer(); ?>