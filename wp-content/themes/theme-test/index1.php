<?php get_header(); ?>
	
	 
	<div class ="clear"></div>
	<section id="main">
		<div class=" main-min container">
			<div class="row">
				<div class="main-left col-lg-8">
					<div class="main-left-title">
						<div class="row">
							<div class="text-title col-lg-11">
								<h3>Welcome to Abby’s Contracting llc.</h3>
							</div>
							<div class="A-title col-lg-1">
								<h3>A</h3>
							</div>
						</div>
					</div>
					<div class="main-left-about">
						<p>Abby’s Contracting llc. is a family owned and operated company, established in 1977 serving southeast CT. We are fully licensed (0628858) and insured and ready to work in any environment that comes are way.
						</p>
					</div>
					
					<div class="main-left-content">
						<h4>In the News</h4>
						
						<?php
						  $temp = $wp_query;
						  $wp_query = null;
						  
						 $wp_query = new WP_Query('showposts=4&cat=10');
					  
						  while ($wp_query->have_posts()) : $wp_query->the_post(); 
						  
						?>
							<article class="main-block">
								
								<div class="block-content">
									<a href="<?php the_permalink(); ?>" class="float-left"><?php the_post_thumbnail(); ?></a>
									
									<p><span class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span><br> <?php the_excerpt(); ?></p>
								</div>	
							</article>
									 
								<?php endwhile; ?>
					
								<?php
								  $wp_query = null;
								  $wp_query = $temp;  // Reset
								?>
						
					
					</div>
				</div>
				<div class="main-right col-xs-4">
					<?php get_sidebar(); ?>
				
				</div>
			</div>
		</div>
	</section>
		
		
		
	 
	
<?php get_footer(); ?>
