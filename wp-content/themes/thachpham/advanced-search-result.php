<?php
// Get data from URL into variables
$_keyword = $_GET['keyword'] != '' ? $_GET['keyword'] : '';
$_tp = $_GET['tp'] != '' ? $_GET['tp'] : '';
$_lt = $_GET['lt'] != '' ? $_GET['lt'] : '';
$_ld = $_GET['ld'] != '' ? $_GET['ld'] : '';
$_qh = $_GET['qh'] != '' ? $_GET['qh'] : '';
$_dt = $_GET['dt'] != '' ? $_GET['dt'] : '';
$_gd = $_GET['gd'] != '' ? $_GET['gd'] : '';
// Start the Query
$v_args = array(
        'post_type'     =>  'post', // your CPT
        's'             =>  $_keyword, // looks into everything with the keyword from your 'name field'
        'meta_query'    =>  array(
                                array(
                                    'key'     => 'thanh_pho', // assumed your meta_key is 'thanh_pho'
                                    'value'   => $_tp,
                                    'compare' => '=', // finds models that matches 'model' from the select field
                                ),
                            array(
                                'key'     => 'loai_tin', // assumed your meta_key is 'thanh_pho'
                                'value'   => $_lt,
                                'compare' => '=', // finds models that matches 'model' from the select field
                            ),
                            array(
                                'key'     => 'loai_tin', // assumed your meta_key is 'thanh_pho'
                                'value'   => $_tp,
                                'compare' => '=', // finds models that matches 'model' from the select field
                            ),
                            array(
                                'key'     => 'loai_tin', // assumed your meta_key is 'thanh_pho'
                                'value'   => $_tp,
                                'compare' => '=', // finds models that matches 'model' from the select field
                            ),
                            array(
                                'key'     => 'loai_tin', // assumed your meta_key is 'thanh_pho'
                                'value'   => $_tp,
                                'compare' => '=', // finds models that matches 'model' from the select field
                            ),
                            array(
                                'key'     => 'loai_tin', // assumed your meta_key is 'thanh_pho'
                                'value'   => $_tp,
                                'compare' => '=', // finds models that matches 'model' from the select field
                            ),
                            array(
                                'key'     => 'loai_tin', // assumed your meta_key is 'thanh_pho'
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
<div class="col-left">
	<div id="main-content">
				<h2>Search Result</h2>
			<?php if ($searchQuery->have_posts() ) : while($searchQuery->have_posts() ) : $searchQuery->the_post(); ?>
			<?php get_template_part('search-result', get_post_format()); ?>
			
			<?php endwhile ?>
			<?php else: ?>
				<?php get_template_part('search-result', 'none'); ?>
			<?php endif ?>
	</div>
</div>
    <div id="sidebar">
        <?php get_sidebar('search'); ?>
    <div class="clear"></div>
    </div>
    <div id="sidebar-second">
        <?php get_sidebar('extra'); ?>
    </div>
</div>
<?php get_footer(); ?>