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

if (isset($_GET['px']) && !empty($_GET['px'])){
    $_px = $_GET['px'];
    array_push($queryMetaArray, array(
    'key'     => 'phuong_xa', // assumed your meta_key is 'phuong_xa'
    'value'   => $_px,
    'compare' => '=',
    ));
}

if (isset($_GET['dp']) && !empty($_GET['dp'])){
    $_dp = $_GET['dp'];
    array_push($queryMetaArray, array(
    'key'     => 'duong_pho', // assumed your meta_key is 'duong_pho'
    'value'   => $_dp,
    'compare' => '=',
    ));
}

if (isset($_GET['sp']) && !empty($_GET['sp'])){
    $_sp = $_GET['sp'];
    array_push($queryMetaArray, array(
    'key'     => 'so_phong', // assumed your meta_key is 'so_phong'
    'value'   => $_sp,
    'compare' => '=',
    ));
}

if (isset($_GET['hn']) && !empty($_GET['hn'])){
    $_hn = $_GET['hn'];
    array_push($queryMetaArray, array(
    'key'     => 'huong_bds', // assumed your meta_key is 'huong_bds'
    'value'   => $_hn,
    'compare' => '=',
    ));
}
/*  var_dump($queryMetaArray); */
/* $paged = get_query_var('paged', 1); */
if (isset($_GET['paged']) && !empty($_GET['paged'])){
	$paged = $_GET['paged'];
}else{
	$paged = 1;
}

// Chay search
$v_args = array(
        'post_type'     =>  'post',
        's'             =>  $keyword,
        'meta_query'    =>  $queryMetaArray,
		'posts_per_page' => 1,
		'paged' => $paged
);
$searchQuery = new WP_Query( $v_args );
?>
<?php get_header(); ?>
<div class="content">
<div class="col-left">
	<div id="main-content">
			<div id="most_view_title" class="title_n"><h3 class="widget-title">Tin nhà đất</h3></div>
			<span>Có</span>
			<?php
            $count = count($searchQuery->post_count);
            echo  $count . " Tin đăng nhà đất được tìm thấy";
            ?>
			<?php 
			if ($searchQuery->have_posts() ) :
			while($searchQuery->have_posts() ) :
			$searchQuery->the_post(); ?>
			<?php get_template_part('search-result', get_post_format()); ?>
			<?php endwhile ?>
			<?php endif ?>
			<?php /* if ( $searchQuery->max_num_pages > 1 ) : ?>
					<div class="clearboth"></div>
					<?php
					$pages_total = $searchQuery->max_num_pages;
					 echo "<ul class='pagination'>";
							for ($i = 1; $i <= $pages_total; $i ++) {
								if ($i == (int) $paged ) {
									echo "<li><a href='".get_pagenum_link($i)."' class='active'>" . $i . "</a></li>";
								} else {
									echo "<li><a href='".get_pagenum_link($i)."' >" . $i . "</a></li>";
								}
							}
							echo "</ul>"; */
					$paging_args = array(
						'base'         => '%_%',
						'format'       => '?paged=%#%',
						'total'        => $searchQuery->max_num_pages,
						'current'      => $paged,
						'end_size'     => 2,
						'mid_size'     => 1,
						'prev_next'    => True,
						'prev_text'    => __('« Previous'),
						'next_text'    => __('Next »'),
						'type'		   => 'list'
					);
					echo paginate_links($paging_args);
					?>
			<?php /* endif */ ?>
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