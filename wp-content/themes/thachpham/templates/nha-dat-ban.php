<?php /*
 * Template Name: Trang nha dat ban
 */
?>
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
	        'meta_key' => 'loai_tin',
	        'meta_value' => 'bds_ban'
        );
	    $postQuery = new WP_Query( $v_args );
	    ?>
        <?php if ($postQuery->have_posts() ) : while($postQuery->have_posts() ) : $postQuery->the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
            <div class="entry-thumbnail">
            <?php thachpham_thumbnail(get_the_ID()); ?>
            </div>
            <div class="entry-header">
                 <h2>
                	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h2>
            </div>
            <div class="entry-content">
            <?php 
                  echo "<div class='other'>";
                  echo "<div class='price'>";
                  echo "<label>Giá<span>:</span></label>".get_post_meta(get_the_ID(),"gia_nha_dat",true)." ".get_post_meta(get_the_ID(),"gia",true)."</div>";
                  echo "<div class='area'>";
                  echo "<label>Diện tích<span>:</span></label>64&nbsp;m²</div>";
                  echo "<div class='location'>";
                  echo "<label>Vị trí<span>:</span></label>";
                  echo "Quận 9 - Hồ Chí Minh";
                  echo "</div>";
                  echo "</div>";
                  echo "<div class='date'>";
                  echo "14/11/2016</div>";
            ?>
            </div>
        </article>
        <?php endwhile ?>
        <?php else: ?>
            <?php get_template_part('content', 'none'); ?>
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