<div class="block-right">
	<div class="video-demo">
									<?php
									  $temp = $wp_query;
									  $wp_query = null;
									  
									   
									 $wp_query = new WP_Query('showposts=1&cat=3');
								  
									  while ($wp_query->have_posts()) : $wp_query->the_post();
									?>
											 <?php the_content();?>
												
										<?php endwhile; ?>
								
										<?php
										  $wp_query = null;
										  $wp_query = $temp;  // Reset
										?>
	</div>									 
</div>