<?php get_header(); ?>
<?php
if(is_home()){
echo "<style>
#pro-box-left{margin-top:-10px !important;}
#pro-box-right{margin-top:-35px !important;}
</style>";
}
?>
	<section id="big-slider">
            <div class="slider  " >
				<div class=" container" >
					<div class="row">
						<div class="col-md-12  ">
							<div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
									<?php echo do_shortcode("[image-carousel]"); ?>
							</div>
						</div> 
					</div>
				</div>
			</div> 
	</section>
	 
	<div class ="clear"></div>
	<section id="main">
		<div class=" container" >
			<div class="row">
				<div class="col-md-8">
					<div id="pro-box-left">
						<h2 class="border-title"><span> <i class="fa fa-windows"></i> Dự án chung cư mini</span> </h2>	
						<article class="main-block">									  
						 <?php
						  $temp = $wp_query;
						  $wp_query = null;  
						 $wp_query = new WP_Query('showposts=1&cat=1');
					  
						  while ($wp_query->have_posts()) : $wp_query->the_post();
						?>	  
						<div class="block-content-big">
							<a href="#" class="float-left big" title="<?php the_title(); ?>"> <?php the_post_thumbnail(); ?> </a>
		
							<p><span class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span><br> 
								 <?php the_excerpt(); ?>
							</p>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read float-right" >Chi Tiết...</a>
						</div>
						<?php endwhile; ?>
				
						<?php
						  $wp_query = null;
						  $wp_query = $temp;  // Reset
						?>
						</article>
					</div>
				</div>
				<div class="col-md-4">
					<div id="pro-box-right">
					<?php include (TEMPLATEPATH . '/inc/camnhan.php'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="main1">
		<div class=" container" >
			<div class="row">
				<div class="col-md-8">
					<div id="pro-box-left">	 
					<?php
					  $temp = $wp_query;
					  $wp_query = null;
					 $wp_query = new WP_Query('showposts=5&cat=1&offset=1');
					 while ($wp_query->have_posts()) : $wp_query->the_post();
					?>
					<article class="main-block">
							<div class="block-content">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="float-left"><?php the_post_thumbnail(); ?></a>
								<p><span class="title1"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span><br><span class="date float-left"> <?php the_time('d/m/Y'); ?></span><br> 
									<?php the_excerpt(); ?>
								</p> 
							</div>	
					</article>
					<div style="height:1px;width:100%;border:1px dotted #ddd;"></div>
					<?php endwhile; ?>
					<?php
					  $wp_query = null;
					  $wp_query = $temp;  // Reset
					?>
					</div>
				</div>
				<div class="col-md-4">
					<div id="pro-box-right">
						<h3 class="border-title"><span><i class="fa fa-bars"></i>Tin tức </span> </h3>
							<?php	include (TEMPLATEPATH . '/inc/tintuc.php'); ?>
						<h3 class="border-title"><span><i class="fa fa-laptop"></i>Video Chung cư</span> </h3>
							<?php	include (TEMPLATEPATH . '/inc/video.php'); ?> 			
					</div> 
				</div>
					
			</div>
		<div>
	</section>
	
	<section id="main2" >
		<div  class="container">
				<div class="row">
					<div class="col-md-8">
						<h2 class="border-title"><span><i class="fa fa-user-plus"></i>Lý do chọn chúng tôi</span> </h2>
						 <div class="bs-example">
							<div class="panel-group" id="accordion">
							<div class="panel panel-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. Lý do chọn chúng tôi ?</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in">
										<div class="panel-body">
										<?php
								  $temp = $wp_query;
								  $wp_query = null;
								 $wp_query = new WP_Query('showposts=1&cat=8');
								 while ($wp_query->have_posts()) : $wp_query->the_post();
								?>
											<?php the_content(); ?>
								<?php endwhile; ?>
								<?php
								  $wp_query = null;
								  $wp_query = $temp;  // Reset
								?>
										</div>
									</div>
								</div>
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. What is Bootstrap?</a>
										</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse">
										<div class="panel-body">
													<?php
								  $temp = $wp_query;
								  $wp_query = null;
								 $wp_query = new WP_Query('showposts=1&cat=8&offset=1');
								 while ($wp_query->have_posts()) : $wp_query->the_post();
								 $postid = get_the_ID(); 
								?>
									<?php the_content(); ?>
								<?php endwhile; ?>
								<?php
								  $wp_query = null;
								  $wp_query = $temp;  // Reset
								?>
										</div>
									</div>
								</div>
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3. What is CSS?</a>
										</h4>
									</div>
									<div id="collapseThree" class="panel-collapse collapse">
										<div class="panel-body">
													<?php
								  $temp = $wp_query;
								  $wp_query = null;
								 $wp_query = new WP_Query('showposts=1&cat=8&offset=2');
								 while ($wp_query->have_posts()) : $wp_query->the_post();
								 $postid = get_the_ID(); 
								?>
									<?php the_content(); ?>
								<?php endwhile; ?>
								<?php
								  $wp_query = null;
								  $wp_query = $temp;  // Reset
								?>
										</div>
									</div>
								</div> 
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<h2 class="border-title"><span><i class="fa fa-user-plus"></i>Bạn nên chọn chúng tôi</span> </h2>
							<div class="block-right">
								<div class="progress">
								  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" style="width: 99%">
									<span class="sr-only">99% Complete (success)</span>Phong cách làm việc chuyên nghiệp 99%
								  </div>
								</div>	
								<div class="progress">
									  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%">
										<span class="sr-only">98% Complete</span>Hoàn thành đúng tiến độ 98%
									  </div>
									</div>
									<div class="progress">
									  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" style="width: 99%">
										<span class="sr-only">99% Complete (warning)</span>Vị trí tiện lợi, trung tâm 99%
									  </div>
									</div>
									<div class="progress">
									  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow=" 98" aria-valuemin="0" aria-valuemax="100" style="width:  98%">
										<span class="sr-only"> 98% Complete (danger)</span>Bảo hành dài hạn 98%
									  </div>
									</div>
									<div class="progress">
									  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow=" 98" aria-valuemin="0" aria-valuemax="100" style="width:  98%">
										<span class="sr-only"> 98% Complete (danger)</span>Gía thành hợp lý, cạnh tranh 99%
									  </div>
									</div>
									<div class="progress">
									  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow=" 98" aria-valuemin="0" aria-valuemax="100" style="width:  98%">
										<span class="sr-only"> 98% Complete (danger)</span>Pháp lý đầy đủ, rõ ràng 99%
									  </div>
									</div>
							</div>
					</div>
				</div>
		</div>
	 </section>
	<section id="main2">
		<div class="container" >
			<div  class="title-tieubieu container">
				<div class="row">
					<div class="col-md-12">
						<div id="pro-box-left">
							<h2 class="border-title"><span><i class="fa fa-windows"></i> Bài viết cho chung cư mini</span></h2> 
						</div>
					</div>
				</div>
			</div>
		</div>	
			<div  class="container">
				<div class="row">
					<?php
					 $temp = $wp_query;
					 $wp_query = null;					   
					 $wp_query = new WP_Query('showposts=6&cat=5');
					 
					  while ($wp_query->have_posts()) : $wp_query->the_post();
					  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					?>
						<div class="col-md-2">
							<div class="box-pro-view">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<img class="img-responsive" style="min-height:111px !important;width:100%;" src="<?php echo $url; ?>" alt="<?php the_title(); ?>"/> 
								</a> 					
								<h3 style="font-weight:normal !important;"><a style="color:#337ab7;" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
							</div> 
						</div>
						<?php endwhile; ?>
						<?php
						  $wp_query = null;
						  $wp_query = $temp;
					?>
				</div>
		</div>
	</section>
	<?php get_footer(); ?>
	