<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
	<div id="main-min">
		<div id="container">
			<div id="content" role="main">

			<div class="breadcrumbs">
							<?php if(function_exists('bcn_display'))
                            {
                                bcn_display();
                            }?>
			   </div> 


			<?php while ( have_posts() ) : the_post(); ?>

			<!--BEGIN: PRODUCT THUMBNAIL-->
        <div class="product-thumb">
               <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
				 
        </div>
        <!--END: PRODUCT THUMBNAIL-->
            
			<!--BEGIN: PRODUCT INFO-->
        <div class="product-info">
                 
                <p class="product-price">
                        <?php echo "<strong>T�n s?n ph?m :</strong> ". get_post_meta( $post->ID, 'wpcf-ten-san-pham', true ); ?>
                </p><!--Giá sản phẩm-->
                
                <p class="product-price">
                        <?php echo "<strong>Gi�:</strong> ". get_post_meta( $post->ID, 'wpcf-gia-san-pham', true ); ?>
                </p><!--Giá sản phẩm-->
                <p class="product-price">
                        <?php echo "<strong>T�nh tr?ng:</strong> ". get_post_meta( $post->ID, 'wpcf-tinh-trang', true ); ?>
                </p><!--Giá sản phẩm-->
				 
                 
				
				 
                 
 
                
 
                 
        </div>
        <!--BEGIN: PRODUCT INFO-->
        
        <div class="post-info">
        <?php the_content(); ?>
		</div>
	<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->

  
			<div id="lienquan">
 
 				 <?php
 
// get the custom post type's taxonomy terms
 
$custom_taxterms = wp_get_object_terms( $post->ID, 'danh-muc-san-pham', array('fields' => 'ids') );
// arguments
$args = array(
'post_type' => 'san-pham',
'post_status' => 'publish',
'posts_per_page' => 4, // ba.n c� the^? thay ?o^?i so^' n�y
'orderby' => 'rand',
'tax_query' => array(
array(
'taxonomy' => 'danh-muc-san-pham',
'field' => 'id',
'terms' => $custom_taxterms
)
),
'post__not_in' => array ($post->ID),
);
$related_items = new WP_Query( $args );
// loop over query
if ($related_items->have_posts()) :
echo '<div id="related_posts"><h3> Sản phẩm cùng loại: </h3><ul>';
 
while ( $related_items->have_posts() ) : $related_items->the_post();
?>
<li>
				
				<div class="item-pro"  <?php post_class($p3); ?> >
            
                    <div class="thum_cat"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
                    
                    <div class="tit-inf"><h4><?php the_title(); ?></h4></div>
                    <div class="tit-gia"><h4><?php echo "<strong>Gi�:</strong> ". get_post_meta( $post->ID, 'wpcf-gia-san-pham', true ); ?></h4></div>
                    <a class="order-button" href="<?php the_permalink();?>">Xem chi ti?t</a>

				
				
				</div><!-- .item-pro --> 
				
				</li>
<?php
endwhile;
echo '</ul></div>';
endif;
// Reset Post Data
wp_reset_postdata();
?>


			</div>	


         
         
         
            
		</div><!-- #container -->
        

<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
