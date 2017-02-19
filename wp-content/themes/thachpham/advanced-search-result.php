<?php
$keyword = "";
if (isset($_GET['keyword']) && !empty($_GET['keyword'])){
    $keyword = $_GET['keyword']; 
}

// Get data from URL into variables
$queryMetaArray = array('relation' => 'AND');

if (isset($_GET['tp']) && !empty($_GET['tp'])){
    $_tp = $_GET['tp'];
    array_push($queryMetaArray, array(
                                    'key'     => 'thanh_pho', // assumed your meta_key is 'thanh_pho'
                                    'value'   => $_tp,
                                    'compare' => '=',
                                ));
}

if (isset($_GET['lt']) && !empty($_GET['lt'])){
    $_lt = $_GET['lt'];
    array_push($queryMetaArray, array(
    'key'     => 'loai_tin', // assumed your meta_key is 'loai_tin'
    'value'   => $_lt,
    'compare' => '=',
    ));
}

if (isset($_GET['ld']) && !empty($_GET['ld'])){
    $_ld = $_GET['ld'];
    array_push($queryMetaArray, array(
    'key'     => 'loai_nha_dat', // assumed your meta_key is 'loai_nha_dat'
    'value'   => $_ld,
    'compare' => '=',
    ));
}

if (isset($_GET['qh']) && !empty($_GET['qh'])){
    $_qh = $_GET['qh'];
    array_push($queryMetaArray, array(
    'key'     => 'quan_huyen', // assumed your meta_key is 'loai_nha_dat'
    'value'   => $_qh,
    'compare' => '=',
    ));
}

if (isset($_GET['dt']) && !empty($_GET['dt'])){
    $_dt = $_GET['dt'];
    array_push($queryMetaArray, array(
    'key'     => 'dien_tich', // assumed your meta_key is 'dien_tich'
    'value'   => $_dt,
    'compare' => '=',
    ));
}

if (isset($_GET['gd']) && !empty($_GET['gd'])){
    $_gd = $_GET['gd'];
    array_push($queryMetaArray, array(
    'key'     => 'muc_gia', // assumed your meta_key is 'muc_gia'
    'value'   => $_gd,
    'compare' => '=',
    ));
}
/* var_dump($queryMetaArray); */
// Start the Query
$v_args = array(
        'post_type'     =>  'post', // your CPT
        's'             =>  $keyword, // looks into everything with the keyword from your 'name field'
        'meta_query'    =>  $queryMetaArray
);
var_dump($v_args);
$searchQuery = new WP_Query( $v_args );
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