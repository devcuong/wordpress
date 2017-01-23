	<?php if(!is_single()){ ?>
	<div class="main-top-content">
		<div class="search-content">
				<?php get_search_form(); ?>
		</div>
		
		<div class="main-top-slide">
		<?php echo do_shortcode('[metaslider id="1586"]');  ?>
		</div>
		
		<div class="extra-top-slide">
		<?php echo do_shortcode('[metaslider id="1587"]');  ?>
		</div>
	</div>
<?php } ?>