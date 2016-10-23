  <?php
					  $temp = $wp_query;
					  $wp_query = null;
					   
					 $wp_query = new WP_Query('showposts=4&cat=15,8&orderby=rand');
				  
					  while ($wp_query->have_posts()) : $wp_query->the_post(); 
					?>
					 
								<div class="item-left"  <?php post_class($p3); ?> >
            
                    <div class="thum_left"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
                    
                    <div class="tit-left"><h4><?php the_title(); ?></h4></div>
                     

				
				
				</div><!-- .item-pro --> 
					 
					<?php endwhile; ?>
			
					<?php
					  $wp_query = null;
					  $wp_query = $temp;  // Reset
					?>


	 