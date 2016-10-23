<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="entry_header">
        <?php thachpham_entry_header(); ?>
    </div>
    <div class="entry_content">
        <?php the_content(); ?>
        <?php ( is_single() ? thachpham_entry_tag() : '' ) ?>
    </div>
</article>