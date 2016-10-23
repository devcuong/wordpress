		  
 <?php
					  $temp = $wp_query;
					  $wp_query = null;
					  
					   
					 $wp_query = new WP_Query('showposts=4&cat=16&orderby=rand');
				  
					  while ($wp_query->have_posts()) : $wp_query->the_post();
?>
								 
											 <div class="item-cn">
												<div class="img-cn"><?php the_post_thumbnail(); ?></div>
												<div class="tit-cn"><h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> </div>
												
											</div>
												
											 
								 
								<?php endwhile; ?>
						
								<?php
								  $wp_query = null;
								  $wp_query = $temp;  // Reset
								?>