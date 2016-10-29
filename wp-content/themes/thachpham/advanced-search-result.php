<?php
// Get data from URL into variables
$_name = $_GET['name'] != '' ? $_GET['name'] : '';
$_tp = $_GET['tp'] != '' ? $_GET['tp'] : '';
$_qh = $_GET['qh'] != '' ? $_GET['qh'] : '';

// Start the Query
$v_args = array(
        'post_type'     =>  'post', // your CPT
        's'             =>  $_name, // looks into everything with the keyword from your 'name field'
        'meta_query'    =>  array(
                                array(
                                    'key'     => 'chon_thanh_pho', // assumed your meta_key is 'car_model'
                                    'value'   => $_tp,
                                    'compare' => '=', // finds models that matches 'model' from the select field
                                )
                            )
    );
$searchQuery = new WP_Query( $v_args );

// Open this line to Debug what's query WP has just run
// var_dump($searchQuery->request);
?>
<?php get_header(); ?>
	<div class="content">
		<div id="main-content">
			<?php if( $searchQuery->have_posts() ) : while( $searchQuery->have_posts() ) : $searchQuery->the_post(); ?>
					<?php get_template_part('search-result', get_post_format()); ?>
			<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part('search-result', 'none'); ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<div id="sidebar">  
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>