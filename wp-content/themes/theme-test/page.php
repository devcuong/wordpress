<?php get_header(); ?>
<?php if(is_page()){
echo "<style>#pro-box-right{margin-top:-25px;}</style>";
} ?>
	<section id="big-slider">
             
	</section>
	 
	<div class ="clear"></div>
	<section id="main">
		<div class=" container" >
			<div class="row">
				<div class="col-md-8">
					<div id="pro-box-left">
					 
						<?php
					/* Run the loop to output the post.
					 * If you want to overload this in a child theme then include a file
					 * called loop-single.php and that will be used instead.
					 */
					get_template_part( 'loop', 'page' );
					?>	
						 
					</div>
				</div>
				<div class="col-md-4">
					 <?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
	 
 
		
	<?php get_footer(); ?>
	

