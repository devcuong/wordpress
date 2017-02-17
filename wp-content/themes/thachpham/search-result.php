<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-thumbnail">
        <?php thachpham_thumbnail(get_the_ID()); ?>
    </div>
	<div class="entry-header">
        <?php thachpham_entry_header(); ?>
    </div>
	<div class="entry-content">
        <?php thachpham_entry_content(get_the_ID()); 	 ?>
    </div>
	<div class="entry-viewed">
        <?php  thachpham_entry_count_viewed(get_the_ID()); 	 ?>
    </div>
</article>