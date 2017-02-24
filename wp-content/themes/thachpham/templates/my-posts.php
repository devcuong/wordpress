<?php
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    set_query_var('postId1', $_POST['postid']); /* set the "postid" value from the delete button of the post we choose to delete into "postid1" */
    wp_delete_post(get_query_var('postId1'), true); /* delete the post we choosed */
}
;
/*
 * Template Name: Trang my post
 */
?>
<?php get_header(); ?>
<div class="content">
	<div id="main-content">
		<div class="page-title"><?php the_title(); ?></div>
		<div class="page-content">
                <?php /* query_posts of approved post of the logged in user */ ?>
                <?php
                $postPerPage = 2;
                $paged = get_query_var('paged', 1);
                ?>
                <?php $queryArray = array( 'author' => $current_user->ID,'post_status' => 'publish' , 'post_type' => array( 'post' ), 'posts_per_page' => $postPerPage, 'paged' => $paged  ) ;?>
                <?php query_posts( $queryArray ); ?>
                <table class="tbl" border="1">
				<tbody>
					<tr class="tit-tbl bg_tit">
						<th style="width: 40px">STT</th>
						<th style="width: 70px">Mã tin</th>
						<th style="width: 330px">Tiêu đề</th>
						<th style="width: 30px">Xem</th>
						<th style="width: 90px">Ngày bắt đầu</th>
						<th style="width: 90px">Ngày hết hạn</th>
						<th style="width: 40px"></th>
					</tr>
                <?php if ( have_posts() ) $postId = 0; while ( have_posts() ) : the_post(); ?> <?php /* start the posts loop */ ?>
                <tr>
                    <?php $postId++; ?>
                    <td><?php echo $postId; ?></td>
						<td><?php the_ID(); ?></td>
						<td><?php the_title() ; ?></td>
						<td>
                    <?php
                    
$count_key = 'wpb_post_views_count';
                    $count = get_post_meta(get_the_ID(), $count_key, true);
                    echo $count;
                    ?>
                    </td>
						<td>
                        <?php
                    
$date_key = 'ngay_dang_tin';
                    $datePost = get_post_meta(get_the_ID(), $date_key, true);
                    $date = date_create($datePost);
                    echo date_format($date, "d/m/Y");
                    ?>
                    </td>
						<td>
                        <?php
                    
$date_key = 'ngay_het_han';
                    $dateOff = get_post_meta(get_the_ID(), $date_key, true);
                    $date = date_create($dateOff);
                    echo date_format($date, "d/m/Y");
                    ?>
                    </td>
						<td>
							<form class="delete-coupon" action="" method="post" id="input-delete-post">
								<input type="hidden" name="postid" value="<?php the_ID(); ?>" /> <?php /* get the post ID into "postid" and later delete the post */ ?>
                                        <input type="submit" value="Del"/>
							</form>
						</td>
					</tr>					

                <?php endwhile; ?>
                </tbody>
			</table>
		</div>
                <?php wp_reset_query(); ?>
                 <?php
                $uri = get_page_uri();
                $path = "http://dothi24h.abc/" . $uri . "/page/";
                $countPost = wp_count_posts('post');
                $publishPost = $countPost->publish;
                $pagedPost = ceil($publishPost / $postPerPage);
                echo previous_posts_link( __('&lt;&lt;', 'thachpham') );
                echo "<ul class='pagination'>";
                for ($i = 1; $i <= $pagedPost; $i ++) {
                    if ($i == (int) $paged ) {
                        echo "<li><a href=$path" . $i . " class='active'>" . $i . "</a></li>";
                    } else {
                        echo "<li><a href=$path" . $i . ">" . $i . "</a></li>";
                    }
                }
                echo "</ul>";
                echo next_posts_link( __('&gt;&gt;', 'thachpham') );
                ?>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<div id="sidebar">  
            <?php get_sidebar("manage-right")?>
    </div>
</div>
<?php get_footer(); ?>