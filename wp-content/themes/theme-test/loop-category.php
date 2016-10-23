 
    	 <?php if (have_posts()) : ?>
            <?php  while(have_posts()) : the_post(); ?> 
               
                <article class="main-block">
													<div class="block-content">
														<a href="<?php the_permalink(); ?>" class="float-left"><?php the_post_thumbnail(); ?> </a>
														
														<p><span class="title1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span><br> <span class="date float-left"> <?php the_time('d/m/Y'); ?></span><br> 
															<?php the_excerpt(); ?>
														</p>
														 
													</div>	
											</article>   
<div style="height:1px;width:100%;border:1px dotted #ddd;"></div>        
        <?php endwhile; else : ?>
			<h3>Nothing found!</h3>
		<?php endif; ?>
<div style="clear:both;width:100%;height:10px;"></div>
<?php wp_pagenavi(); ?>
<div style="clear:both;width:100%;height:10px;"></div>
 


    
  