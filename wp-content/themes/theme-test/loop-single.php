<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>
<?php
if(!is_home()){
 echo "<style>#pro-box-left {
  margin-top: -6px !important;
}
#pro-box-right{margin-top:-30px;}
</style>";
}
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<h1><span class="tieude_baiviet"><?php the_title(); ?></span></h1>
	<span class="date-r "><i class="fa fa-calendar"></i>Đăng ngày: <?php the_time('d/m/Y'); ?></span>
	<div class="clear"></div>
	<div class="block-content">
		 <?php the_content(); ?> 
	</div>	
<?php endwhile; // end of the loop. ?>
<div class="rows">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=677458295629586";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-width="600" data-numposts="10"></div>
</div>
<?php $orig_post = $post;
				global $post;
				$categories = get_the_category($post->ID);
				if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
				
				$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page'=> 4, // Number of related posts that will be shown.
				'caller_get_posts'=>1,
				'orderby' => 'rand'
				);
				
				$my_query = new wp_query( $args );
				if( $my_query->have_posts() ) {
				echo '<div id="related_posts"><h3 style="font-size:13px;">Bài viết liên quan :</h3><ul>';
				while( $my_query->have_posts() ) {
				$my_query->the_post();
				  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				?>
				<div class="rows" style="width:100%;">
							<div style="width:140px;float:left;margin-left:15px;">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<img class="img-responsive" style="height:111px !important;" src="<?php echo $url; ?>" alt="<?php the_title(); ?>"/> 
								</a> 					
								<span style="margin-top:5px;font-size:13px;font-weight:normal !important;text-align:justify; text-transform: lowercase !important;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
							</div> 
				</div>
				<?
				}
				 echo "</div><br/><br/>";
				 echo "<div style='clear:both;width:100%;height:10px;'></div>";
				}
				}
				$post = $orig_post;
				wp_reset_query(); ?>
<div class="row">
<div style="height:1px;width:100%;border:1px dotted #ddd;"></div>
<br/>
</div>
<div class="row">
  <div class="col-md-6">
	<?php
					  $temp = $wp_query;
					  $wp_query = null;
					 $wp_query = new WP_Query('showposts=5&cat=1&offset=1');
					 while ($wp_query->have_posts()) : $wp_query->the_post();
					?>
								<p><span style="font-size:12px;margin-left:15px;"><img src="http://st.f3.vnecdn.net/responsive/c/v12/images/graphics/bg_dot_gray_3x3.gif" /><a style="color:#000;text-transform: lowercase !important;margin-left:10px;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
								</p> 
					<?php endwhile; ?>
					<?php
					  $wp_query = null;
					  $wp_query = $temp;  // Reset
					?>
  </div>
  <div class="col-md-6">
	<?php
					  $temp = $wp_query;
					  $wp_query = null;
					 $wp_query = new WP_Query('showposts=5&cat=2&offset=1');
					 while ($wp_query->have_posts()) : $wp_query->the_post();
					?>
								<p><span style="font-size:12px;margin-left:15px;"><img src="http://st.f3.vnecdn.net/responsive/c/v12/images/graphics/bg_dot_gray_3x3.gif" /><a style="color:#000;text-transform: lowercase !important;margin-left:10px;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
								</p> 
					<?php endwhile; ?>
					<?php
					  $wp_query = null;
					  $wp_query = $temp;  // Reset
					?>
  </div>
</div>
<div style='clear:both;width:100%;height:30px;'></div>

