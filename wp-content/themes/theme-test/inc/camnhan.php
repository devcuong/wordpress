	<div id="pro-box-right  ">
	<h3 class="border-title"><span> <i class="fa fa-windows"></i> Cảm Nhận Khách Hàng</span> </h3>
	<div class="block-right">
			 
				  <br>
				  <div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators 
					<ol class="carousel-indicators">
					   
					  <li data-target="#myCarousel" data-slide-to="2"></li>
					  <li data-target="#myCarousel" data-slide-to="3"></li>
					</ol>
					-->	
					<!-- Wrapper for slides -->
					<div class="carousel-inner yk" role="listbox">
						<?php
					 $temp = $wp_query;
					 $wp_query = null;					   
					 $wp_query = new WP_Query('showposts=1&cat=7');
					 
					  while ($wp_query->have_posts()) : $wp_query->the_post();
					  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					?>
						<div class="item active">
						 <p><?php the_content(); ?></p>
					  	<div class="yk_khachhang">
					  	<img class="img_av" src="<?php echo $url; ?>" style="width:40px;height:40px;" />&nbsp;<label><?php the_title(); ?></label>
					  	</div>
					  </div> 
						<?php endwhile; ?>
						<?php
						  $wp_query = null;
						  $wp_query = $temp;
					?>
								<?php
					 $temp = $wp_query;
					 $wp_query = null;					   
					 $wp_query = new WP_Query('showposts=3&cat=7&offset=1');
					 
					  while ($wp_query->have_posts()) : $wp_query->the_post();
					  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					?>
						<div class="item">
						 <p><?php the_content(); ?></p>
					  	<div class="yk_khachhang">
					  	<img class="img_av" src="<?php echo $url; ?>" style="width:40px;height:40px;" />&nbsp;<label><?php the_title(); ?></label>
					  	</div>
					  </div> 
						<?php endwhile; ?>
						<?php
						  $wp_query = null;
						  $wp_query = $temp;
					?>
					 <!--  <div class="item active">
						<p>Tôi đánh giá cao tình thần làm việc của bạn vì rất có trách nhiệm với khách hàng
						và hỗ trợ kỹ thuật rất tốt, những lúc tôi cần bạn đều hỗ trợ rất nhiệt tình, rất cảm ơn bạn. bạn vì rất có trách nhiệm với khách hàng
						và hỗ trợ kỹ thuật rất tốt, những lúc tôi cần bạn đều hỗ trợ rất nhiệt tình,<p>
						<div class="yk_khachhang">
							<img class="img_av" src="http://ngoisaonet.info/wp-content/uploads/2014/11/bo-anh-dep-lam-hinh-nen-may-tinh-cuc-hot-2014-4.jpg" style="width:40px;height:40px;" />&nbsp;<label>Bùi vĩnh phúc</label>
						</div>
					  </div>

					  <div class="item">
						 <p>Tôi đánh giá cao tình thần làm việc của bạn vì rất có trách nhiệm
						 với khách hàng và hỗ trợ kỹ thuật rất tốt, những lúc tôi cần bạn đều hỗ trợ rất nhiệt tình, rất cảm ơn bạn, với khách hàng và hỗ trợ kỹ thuật rất tốt,
						 những lúc tôi cần bạn đều hỗ trợ rất nhiệt tình, rất cảm ơn bạn</p>
					  	<div class="yk_khachhang">
					  	<img class="img_av" src="http://ngoisaonet.info/wp-content/uploads/2014/11/bo-anh-dep-lam-hinh-nen-may-tinh-cuc-hot-2014-4.jpg" style="width:40px;height:40px;" />&nbsp;<label>Lâm chí khanh</label>
					  	</div>
					  </div>  -->
					 
					</div>

					<!-- Left and right controls -->
					<a class="right next-r " href="#myCarousel" role="button" data-slide="next">
					  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					  <span class="sr-only">Next</span>
					</a>
					<a class="right pre-r" href="#myCarousel" role="button" data-slide="prev">
					  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					  <span class="sr-only">Previous</span>
					</a>
					<i class="icon-r1 fa fa-quote-left"></i>
					<i class="icon-r2 fa fa-quote-right"></i>
					
				  </div>
				 
		</div>
	</div>
	 
