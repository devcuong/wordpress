<article class="main-block-rf">
									
									<?php
									  $temp = $wp_query;
									  $wp_query = null;
									  
									   
									 $wp_query = new WP_Query('showposts=1&cat=2');
								  
									  while ($wp_query->have_posts()) : $wp_query->the_post();
									?>
											
											 <a href="<?php the_permalink(); ?>" class="float-left"><?php the_post_thumbnail(); ?></a>
														
											 <h5> <?php the_title(); ?> </h5>
											<span class="date-r "><i class="fa fa-calendar"></i>Đăng ngày: <?php the_time('d/m/Y'); ?></span>	
												
										<?php endwhile; ?>
								
										<?php
										  $wp_query = null;
										  $wp_query = $temp;  // Reset
										?>
										 	
</article>	
<article class="main-block-r">
									
									<?php
									  $temp = $wp_query;
									  $wp_query = null;
									  
									   
									 $wp_query = new WP_Query('showposts=7&cat=2&offset=1');
								  
									  while ($wp_query->have_posts()) : $wp_query->the_post();
									?>
											
											 
												<div class="block-content-r">
													 
													
													<a href="<?php the_permalink(); ?>"  ><p> <?php the_title(); ?> </p></a>
													 
												</div>	
											 
											
										<?php endwhile; ?>
								
										<?php
										  $wp_query = null;
										  $wp_query = $temp;  // Reset
										?>
									 
</article>