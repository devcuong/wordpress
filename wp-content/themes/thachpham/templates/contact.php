<?php 
	/*
	Template Name: Contact
	*/
?>
<?php get_header(); ?>
<div class="content">
	<div id="main-content">
		<div class="contact-info">
			<h4>Dia chi lien he</h4>
			<p>abc def</p>
			<p>0902.754.030</p>
		</div>
		<div class="contact-info">
		<?php echo do_shortcode('[contact-form-7 id="1457" title="Contact form 1"]'); ?>
		</div>
	</div>
</div>