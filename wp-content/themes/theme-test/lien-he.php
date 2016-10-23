<?php 
/*
 Template Name: Liên hệ
 */
?>
<?php get_header(); ?>
<?php if(is_page()){
echo "<style>
#pro-box-right{margin-top:-44px !important;}
</style>";
} ?>
	<section id="big-slider">
             
	</section>
	 
	<div class ="clear"></div>
	<section id="main">
		<div class=" container" >
			<div class="row">
							<div class="col-md-8">
						<h2 class="border-title"><span><i class="fa fa-user-plus"></i>Liên hệ với chúng tôi</span> </h2>
						 <div class="bs-example">
							<div class="panel-group" id="accordion">
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				                       <?php the_content(); ?>
				                <?php endwhile; ?>
				                <?php endif; ?>
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
