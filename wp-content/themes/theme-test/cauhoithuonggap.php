<?php 
/*
 Template Name: Câu hỏi thường gặp
 */
?>
<?php get_header(); ?>
<?php if(is_page()){
echo "<style>
#pro-box-right{margin-top:-44.9px !important;}
</style>";
} ?>
	<section id="big-slider">
             
	</section>
	 
	<div class ="clear"></div>
	<section id="main">
		<div class=" container" >
			<div class="row">
							<div class="col-md-8">
						<h2 class="border-title"><span><i class="fa fa-user-plus"></i>Lý do chọn chúng tôi</span> </h2>
						 <div class="bs-example">
							<div class="panel-group" id="accordion">
								<?php
								  $temp = $wp_query;
								  $wp_query = null;
								 $wp_query = new WP_Query('showposts=1&cat=6');
								 while ($wp_query->have_posts()) : $wp_query->the_post();
								?>
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php the_title(); ?></a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in">
										<div class="panel-body">
											<?php the_content(); ?>
										</div>
									</div>
								</div>
								<?php endwhile; ?>
								<?php
								  $wp_query = null;
								  $wp_query = $temp;  // Reset
								?>
								<?php
								  $temp = $wp_query;
								  $wp_query = null;
								 $wp_query = new WP_Query('showposts=5&cat=6&offset=1');
								 while ($wp_query->have_posts()) : $wp_query->the_post();
								 $postid = get_the_ID(); 
								?>
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $postid; ?>"><?php the_title(); ?></a>
										</h4>
									</div>
									<div id="collapse<?php echo $postid; ?>" class="panel-collapse collapse">
										<div class="panel-body">
											<?php the_content(); ?>
										</div>
									</div>
								</div>
								<?php endwhile; ?>
								<?php
								  $wp_query = null;
								  $wp_query = $temp;  // Reset
								?>
<!-- 								<div class="panel panel-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. Lý do chọn chúng tôi ?</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in">
										<div class="panel-body">
											<p>HTML stands for HyperText Markup Language. HTML is the main markup language for describing the structure of Web pages. 
											HTML is the main markup language for describing the structure of Web pages 
											HTML is the main markup language for describing the structure of Web pages 	
											</p>
											<p>HTML stands for HyperText Markup Language. HTML is the main markup language for describing the structure of Web pages. 
											 
											</p>
											<p>HTML stands for HyperText Markup Language. HTML is the main markup language for describing the structure of Web pages. 
											 	
											</p>
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
											<p>Bootstrap is a powerful front-end framework for faster and easier web development. It is a collection of CSS and HTML conventions. <a href="http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank">Learn more.</a></p>
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
											<p>CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc. <a href="http://www.tutorialrepublic.com/css-tutorial/" target="_blank">Learn more.</a></p>
										</div>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				<div class="col-md-4">
					 <?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
	 
 
		
	<?php get_footer(); ?>
