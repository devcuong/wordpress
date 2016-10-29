<?php
	// Query get top 6 news
	$v_args = array(
        'post_type'     =>  'News', // your CPT
        'posts_per_page' => 6
    );
	$newsQuery = new WP_Query( $v_args );
?>
<div class="news-default fl">
    <div class="news-default-left">
        <a href="/tin-thi-truong/sai-lam-khi-mua-nha-sai-mot-ly-di-mot-dam-ar29961.htm" title="Sai lầm khi mua nhà: “Sai một ly, đi một dặm”">
            <img src="http://img.dothi.net/2016/10/26/OaG6iEAm/1-5d08.jpg" alt="Sai lầm khi mua nhà: “Sai một ly, đi một dặm”">
        </a>
        <h2>
            <a href="/tin-thi-truong/sai-lam-khi-mua-nha-sai-mot-ly-di-mot-dam-ar29961.htm" title="Sai lầm khi mua nhà: “Sai một ly, đi một dặm”">Sai lầm khi mua nhà: “Sai một ly, đi một dặm”</a>
        </h2>
        
    </div>
    
            <div class="news-default-right">
            <ul>
			<?php if( $newsQuery->have_posts() ) : while( $newsQuery->have_posts() ) : $newsQuery->the_post(); 
				   if($newsQuery->current_post == 0)
				   {
					   echo '<li class="first-li">';
				   }
				   else
				   {
					   echo '<li>';
				   }
				   
			?>
					
						<h3>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
					</li>
				<?php endwhile; ?>
				<?php endif; ?>
        
            </ul>
                </div>
        
    <div class="clear"></div>
</div>