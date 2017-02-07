<?php get_header(); ?>
<?php get_sidebar('top-content') ?>
<div class="content">
<div class="col-left">
	<?php /* get_sidebar('top-news') */?>
    <div id="main-content">
	<div id="most_view_title" class="title_n">
          <h3>Nhà đất bán</h3>
    </div>
	<div style="clear: both;"></div>
	<div class="line_gr"></div>
	    <?php         
	    $v_args = array(
            'post_type'     =>  'Post', // your CPT
            'numberposts' => 5,
	        'meta_key' => 'loai_tin',
	        'meta_value' => 'bds_ban'
        );
	    $postQuery = new WP_Query( $v_args );
	    ?>
        <?php if ($postQuery->have_posts() ) : while($postQuery->have_posts() ) : $postQuery->the_post(); ?>
        
        <?php get_template_part('content', get_post_format()) ?>
        
        <?php endwhile ?>
        <?php else: ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif ?>
        <div class="extra">
            <a title="Xem thêm các tin rao nhà đất tương tự" href="">&gt;&gt; Xem thêm các tin rao nhà đất tương tự</a>
        </div>
     <div id="most_view_title" class="title_n title_thue">
          <h3>Nhà đất cho thuê</h3>
    </div>
	<div style="clear: both;"></div>
	<div class="line_gr"></div>
	  <?php         
	    $v_args = array(
            'post_type'     =>  'Post', // your CPT
            'numberposts' => 5,
	        'meta_key' => 'loai_tin',
	        'meta_value' => 'bds_cho_thue'
        );
	    $postQuery = new WP_Query( $v_args );
	    ?>
        <?php if ($postQuery->have_posts() ) : while($postQuery->have_posts() ) : $postQuery->the_post(); ?>
        
        <?php get_template_part('content', get_post_format()) ?>
        
        <?php endwhile ?>
        <?php else: ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif ?>
        <div class="extra">
            <a title="Xem thêm các tin rao nhà đất tương tự" href="">&gt;&gt; Xem thêm các tin rao nhà đất tương tự</a>
        </div>
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