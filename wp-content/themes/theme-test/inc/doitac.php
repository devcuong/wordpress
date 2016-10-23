 
	 <div id="lista1" class="als-container">
		
		<span class="als-prev"><img src="<?php echo bloginfo('template_directory'); ?>/images/thin_left_arrow_333.png" alt="prev" title="previous" /></span>
			<div class="als-viewport">
				<ul class="als-wrapper">
							 <?php
					  $temp = $wp_query;
					  $wp_query = null;
					   
					 $wp_query = new WP_Query('cat=29');
								
					  while ($wp_query->have_posts()) : $wp_query->the_post(); 
					?>
					 
						 
												<li class="als-item"><a href="<?php the_permalink(); ?>" target="_blank"><?php the_content(); ?></a></li>
												 
											
					 
					<?php endwhile; ?>
					<?php
					  $wp_query = null;
					  $wp_query = $temp;  // Reset
					?>
					</ul>
				</div>
			<span class="als-next"><img src="<?php echo bloginfo('template_directory'); ?>/images/thin_right_arrow_333.png" alt="next" title="next" /></span>
						
	</div>			
					
 