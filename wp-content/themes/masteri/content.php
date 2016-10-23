<div class="container">
	<div class="col-md-12 title">
		<h1>
			<div class="entry_header">
        <?php thachpham_entry_header(); ?>
    </div>
		</h1>
	</div>
	<div class="col-md-7 col-sm-6 col-xs-12">
		<div class="entry_content">
        <?php thachpham_entry_content(); ?>
        <?php ( is_single() ? thachpham_entry_tag() : '' )?>
    </div>
	</div>
	<div class="info-icon button-group col-md-3 col-sm-6 col-xs-12">
		<div class="entry_thumbnail">
        <?php thachpham_thumbnail('large'); ?>
    </div>
	</div>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>></article>