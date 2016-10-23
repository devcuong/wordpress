<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="entry_thumbnail">
        <?php thachpham_thumbnail('large'); ?>
    </div>
    <div class="entry_header">
        <?php thachpham_entry_header(); ?>
        <?php
            $attachment = get_children( array( 'post_parent' => $post->ID ) );
            $attachment_number = count( $attachment );
            printf( __('This image post content %1$s', 'thachpham'), $attachment_number);
        ?>
    </div>
    <div class="entry_content">
        <?php thachpham_entry_content(); ?>
        <?php ( is_single() ? thachpham_entry_tag() : '' ) ?>
    </div>
</article>