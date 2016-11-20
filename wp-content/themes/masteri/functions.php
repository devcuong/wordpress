<?php

/**
 <script src="http://localhost/wordpress/wp-content/themes/masteri/rs/bl_track_with_gcm.cgi" type="text/javascript"></script>
 <script type="text/javascript" async="" charset="utf-8" src="http://localhost/wordpress/wp-content/themes/masteri/js/blade_track_gl.js"></script>
 <script async="" src="http://localhost/wordpress/wp-content/themes/masteri/js/analytics.js"></script>
 <script src="/rs/WebResource.axd" type="text/javascript"></script>
 <script src="/rs/ScriptResource.axd" type="text/javascript"></script>
 **/
/*
 * ------------------------------------
 * 1. NAP NHUNG TAP TIN CSS VAO THEME
 * --------------------------------------
 */
add_action('wp_enqueue_scripts', 'thachpham_theme_register_style');

function thachpham_theme_register_style()
{
    global $wp_styles;

    $cssUrl = get_template_directory_uri() . '/css';
    // echo $cssUrl;

    wp_register_style('masteri_theme_toolbar', $cssUrl . '/toolbar.css', array(), '1.0');
    wp_enqueue_style('masteri_theme_toolbar');

    wp_register_style('masteri_theme_jquery_fancybox', $cssUrl . '/jquery.fancybox.css', array(), '1.0');
    wp_enqueue_style('masteri_theme_jquery_fancybox');

    wp_register_style('masteri_theme_font_awesome_min', $cssUrl . '/font-awesome.min.css', array(), '1.0');
    wp_enqueue_style('masteri_theme_font_awesome_min');

    wp_register_style('masteri_theme_settings', $cssUrl . '/settings.css', array(), '1.0');
    wp_enqueue_style('masteri_theme_settings');

    wp_register_style('masteri_theme_main', $cssUrl . '/main.css', array(), '1.0');
    wp_enqueue_style('masteri_theme_main');

    wp_register_style('masteri_theme_bootstrap', $cssUrl . '/bootstrap.css', array(), '1.0');
    wp_enqueue_style('masteri_theme_bootstrap');

    wp_register_style('masteri_theme_magnific-popup', $cssUrl . '/magnific-popup.css', array(), '1.0');
    wp_enqueue_style('masteri_theme_magnific-popup');

    wp_register_style('masteri_theme_canhcam', $cssUrl . '/canhcam.css', array(), '1.0');
    wp_enqueue_style('masteri_theme_canhcam');

    wp_register_style('masteri_theme_customStyle', $cssUrl . '/customStyle.css', array(), '1.0');
    wp_enqueue_style('masteri_theme_customStyle');

    wp_register_style('masteri_theme_responsiveslides', $cssUrl . '/responsiveslides.css', array(), '1.0');
    wp_enqueue_style('masteri_theme_responsiveslides');

    wp_register_style('masteri_theme_themes', $cssUrl . '/themes.css', array(), '1.0');
    wp_enqueue_style('masteri_theme_themes');

    wp_register_style('masteri_theme_ie8.css', $cssUrl . '/ie8.css', array(), '1.0');
    $wp_styles->add_data('masteri_theme_ie8.css', 'conditional', 'IE 8');
    wp_enqueue_style('masteri_theme_ie8.css');
}

/*
 * ------------------------------------
 * 1. NAP NHUNG TAP TIN JS VAO THEME
 * --------------------------------------
 */
add_action('wp_enqueue_scripts', 'thachpham_theme_register_js');

function thachpham_theme_register_js()
{
    $jsUrl = get_template_directory_uri() . '/js';

    wp_register_script('masteri_theme_blade_track_gl', $jsUrl . '/blade_track_gl.js', array(), '1.0');
    wp_enqueue_script('masteri_theme_blade_track_gl');

    wp_register_script('masteri_theme_analytics', $jsUrl . '/analytics.js', array(), '1.0');
    wp_enqueue_script('masteri_theme_analytics');

    wp_register_script('masteri_theme_responsiveslides_min', $jsUrl . '/responsiveslides.min.js', array(), '1.0');
    wp_enqueue_script('masteri_theme_responsiveslides_min');

    wp_register_script('masteri_theme_bl_track_with_gcm', $jsUrl . '/bl_track_with_gcm.cgi', array(), '1.0');
    wp_enqueue_script('masteri_theme_bl_track_with_gcm');

    wp_register_script('masteri_theme_WebResource', $jsUrl . '/WebResource.axd', array(), '1.0');
    wp_enqueue_script('masteri_theme_WebResource');

    wp_register_script('masteri_theme_ScriptResource', $jsUrl . '/ScriptResource.axd', array(), '1.0');
    wp_enqueue_script('masteri_theme_ScriptResource');
}

/**
 * @ Khai bao hang gia tri
 * @ THEME_URL = lay duong dan thu muc theme
 * @ CORE = lay duong dan thu muc /core
 */
define('THEME_URL', get_stylesheet_directory_uri());
define('THEME_DIR', get_stylesheet_directory());
define('CORE', THEME_DIR . "/core");

/**
 * @ Nhung file /core/init.php
 */
require_once (CORE . "/init.php");

/**
 * @ Thiet lap chieu rong noi dung
 */
if (! isset($content_width)) {
    $content_width = 620;
}

/**
 * @ Khai bao chuc nang cua theme
 */
if (! function_exists('thachpham_theme_setup')) {

    function thachpham_theme_setup()
    {
        /* Thiet lap textdomain */
        $language_folder = THEME_DIR . '/languages';
        load_theme_textdomain('thachpham', $language_folder);

        /* Tu dong them link CSS len <head> */
        add_theme_support('automatic-feeds-links');

        /* Them post thumnail */
        add_theme_support('post-thumbnails');

        /* Post Format */
        add_theme_support('post-formats', array(
            'image',
            'video',
            'gallery',
            'quote',
            'link'
        ));

        /* Them title-tag */
        add_theme_support('title-tag');

        /* Them custom background */
        $default_background = array(
            'default-color' => '#e8e8e8'
        );
        add_theme_support('custom-background');

        /* Them menu */
        register_nav_menu('primary-menu', __('Primary Menu', 'thachpham'));

        /* Tao sidebar */
        $sidebar = array(
            'name' => __('Main Sidebar', 'thachpham'),
            'id' => 'main-sidebar',
            'description' => __('Default sidebar'),
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        );
        
    }
    add_action('init', 'thachpham_theme_setup');
}
/* ------------- TEMPLATE FUNCTION ------------- */
/**
 * Tao va hien thi Header
 */
if (! function_exists('thachpham_header')) {

    function thachpham_header()
    {
        ?>
<div class="site-name">
             <?php
        if (is_home()) {
            printf('<h1><a href="%1$s" title="%2$s">%3$s</a></h1>', get_bloginfo('url'), get_bloginfo('description'), get_bloginfo('sitename'));
        } else {
            printf('<p><a href="%1$s" title="%2$s">%3$s</a></p>', get_bloginfo('url'), get_bloginfo('description'), get_bloginfo('sitename'));
        }
        ?>
            </div>
<div class="site-description"><?php bloginfo('description'); ?></div>
<?php
    }
}

/**
 * Thiet lap menu
 */
if (! function_exists('thachpham_menu')) {

    function thachpham_menu($menu)
    {
        $menu = array(
            'theme_location' => $menu,
            'container' => 'nav',
            'container_class' => $menu
        );

        $menu_object = wp_get_nav_menu_object( $menu );

        echo $menu_object->name;

        var_dump($menu_object);
    }
}

/**
 * Ham tao phan trang don gian
 */
if (! function_exists('thachpham_pagination')) {

    function thachpham_pagination()
    {
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return '';
        }
        ?>
<nav class="pagination" role="navigation">
                    <?php if ( get_next_posts_link() ) : ?>
                        <div class="prev">
                        <?php next_posts_link( __('Older Posts', 'thachpham') ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( get_previous_posts_link() ) : ?>
                        <div class="next"><?php previous_posts_link( __('Newest Posts', 'thachpham') ); ?> </div>
                    <?php endif; ?>
                    </nav>
<?php
    }
}

/**
 * Ham hien thi thumbnail
 */
if (! function_exists('thachpham_thumbnail')) {

    function thachpham_thumbnail($size)
    {
        if (! is_single() && has_post_thumbnail() && ! post_password_required() || has_post_format('image')) :
            ?>
<figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure>
<?php endif; ?>
            <?php
    }
}

/**
 * Ham hien thi tieu de post = thachpham_entry_header
 */
if (! function_exists('thachpham_entry_header')) {

    function thachpham_entry_header()
    {
        ?>
                <?php if ( is_single() ) : ?>
<h1>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</h1>
<?php else : ?>
<h2>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</h2>



<?php endif;?>
        <?php
    }
}

/**
 * Lay du lieu thong tin cua post = thachpham_entry_meta
 */
if (! function_exists('thachpham_entry_meta')) {

    function thachpham_entry_meta()
    {
        ?>
               <?php if ( !is_page() ) : ?>
<div class="entry-meta">
                <?php
            printf(__('<span class="author">Posted by %1$s', 'thachpham'), get_the_author());
            printf(__('<span class="date-published"> at %1$s', 'thachpham'), get_the_date());
            printf(__('<span class="category"> in %1$s', 'thachpham'), get_the_category_list(','));

            if (comments_open()) :
                echo '<span class="meta-reply">';
                comments_popup_link(__('Leave a comment', 'thachpham'), __('One comment', 'thachpham'), __('% comments', 'thachpham'), __('Read all comments', 'thachpham'));
                echo '</span>';
                    endif;
            ?>
               </div>
<?php endif; ?>
            <?php
    }
}

/**
 * Ham hien thi noi dung cua post page
 */
if (! function_exists('thachpham_entry_content')) {

    function thachpham_entry_content()
    {
        if (! is_single() && ! is_page()) {
            the_excerpt();
        } else {
            the_content();

            /* Phan trang trong single */
            $link_pages = array(
                'before' => __('<p>Page: ', 'thachpham'),
                'after' => '</p>',
                'nextpagelink' => __('Next Page', 'thachpham'),
                'previouspagelink' => __('Previous Page', 'thachpham')
            );
            wp_link_pages($link_pages);
        }
    }
}

/**
 * Them read more
 */
function thachpham_readmore()
{
    return '<a class="read-more" href="' . get_permalink(get_the_ID()) . '">' . __('[Read More]', 'thachpham') . '</a>';
}
add_filter('excerpt_more', 'thachpham_readmore');

/**
 * Ham hien thi tag
 */
if (! function_exists('thachpham_entry_tag')) {

    function thachpham_entry_tag()
    {
        if (has_tag()) :
            echo '<div class="entry-tag">';
            printf(__('Tagged in %1$s', 'thachpham'), get_the_tag_list('', ','));
            echo '</div>';





                endif;
    }
}

/**
 * Gioi thieu - Vi tri - Mat bang
 * Ham thong tin du an
 */
if (! function_exists('thachpham_project_infor')) {

    function thachpham_project_infor()
    {
        $infor = array(
            1086,
            2,
            1376
        );
        foreach ($infor as $value) {
            ?>
<div class="item col-md-4 col-sm-4 col-xs-12">
	<a class="item-image" href="<?php echo(get_page_uri($value)); ?>"
		title="<?php echo get_the_title( $value ); ?>" target="_self"> <img
		src="<?php echo(wp_get_attachment_url( get_post_thumbnail_id($value) )); ?>"
		alt="<?php echo get_the_title( $value ); ?>">
	</a> <a class="item-title icon1"
		href="<?php echo(get_page_uri($value)); ?>"
		title="<?php echo get_the_title( $value ); ?>" target="_self">
		<h2><?php echo get_the_title( $value ); ?></h2>
	</a>
</div>
<?php
        }
    }
}

/**
 * HAM LAY TIN TUC
 * Ham get post boi category
 */
if (! function_exists('thachpham_news_post')) {

    function thachpham_news_post()
    {
        global $post;

        $myposts = get_posts(array(
            'posts_per_page' => 5,
            'category' => 75
        ));

        if ($myposts) {
            foreach ($myposts as $post) :
                setup_postdata($post);
                ?>
<!--<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>-->
<li>
	<h3>
		<a rel="bookmark" target="_self" href="<?php the_permalink(); ?>"
			title="<?php the_title(); ?>"><?php the_title(); ?></a>
	</h3>
</li>
<?php

endforeach
            ;
            wp_reset_postdata();
        }
    }
}
/**
 * HAM LAY DU AN
 * Ham get post boi category
 */
if (! function_exists('thachpham_project_post')) {

    function thachpham_project_post()
    {
        global $post;

        $myposts = get_posts(array(
            'posts_per_page' => 2,
            'category' => 76
        ));

        if ($myposts) {
            foreach ($myposts as $post) :
                setup_postdata($post);
                ?>
<div class="item col-md-6 col-sm-6 col-xs-12">
	<a class="item-image" href="<?php the_permalink(); ?>"
		title="<?php the_title(); ?>" target="_blank"> <?php the_post_thumbnail(); ?>
						</a> <a class="item-title icon1" href="<?php the_permalink(); ?>"
		title="<?php the_title(); ?>" target="_blank">
		<h2><?php the_title(); ?></h2>
	</a>
</div>
<?php

endforeach
            ;
            wp_reset_postdata();
        }
    }
}

/**
 * Tien ich
 * Ham thong tin du an
 */
if (! function_exists('thachpham_project_feature')) {

    function thachpham_project_feature()
    {
        $featureId = 1389;
        ?>
<div class="item col-sm-12">
	<a class="item-image" href="<?php echo(get_page_uri($featureId)); ?>"
		title="<?php echo get_the_title( $featureId ); ?>" target="_self"> <img
		src="<?php echo(wp_get_attachment_url( get_post_thumbnail_id($featureId) )); ?>"
		alt="<?php echo get_the_title( $featureId ); ?>">
	</a> <a class="item-title icon1"
		href="<?php echo(get_page_uri($featureId)); ?>"
		title="<?php echo get_the_title( $featureId ); ?>" target="_self">
		<h2><?php echo get_the_title( $featureId ); ?></h2>
	</a>
</div>
<?php
    }
}

/**
 * HAM LAY HINH ANH DU AN
 * Ham get post boi category
 */
if (! function_exists('thachpham_project_images')) {

    function thachpham_project_images()
    {
        global $post;

        $myposts = get_posts(array(
            'posts_per_page' => 2,
            'category' => 77
        ));

        if ($myposts) {
            foreach ($myposts as $post) :
                setup_postdata($post);
                ?>
<div class="item col-md-6 col-sm-6 col-xs-12">
	<a class="item-image" href="<?php the_permalink(); ?>"
		title="<?php the_title(); ?>" target="_self"><?php the_post_thumbnail(); ?>
						</a> <a class="item-title icon1" href="<?php the_permalink(); ?>"
		title="<?php the_title(); ?>" target="_self"><h2><?php the_title(); ?></h2></a>
</div>
<?php

endforeach
            ;
            wp_reset_postdata();
        }
    }
}

/**
 * HAM LAY THONG TIN HO TRO DU AN
 * Ham get post boi category
 */
if (! function_exists('thachpham_project_support')) {

    function thachpham_project_support()
    {
        global $post;

        $myposts = get_posts(array(
            'posts_per_page' => 2,
            'category' => 78
        ));

        if ($myposts) {
            foreach ($myposts as $post) :
                setup_postdata($post);
                ?>
<div class="item col-md-6 col-sm-6 col-xs-12">
	<a class="item-image" href="<?php the_permalink(); ?>"
		title="<?php the_title(); ?>" target="_self"><img
		src="<?php echo(wp_get_attachment_url( get_post_thumbnail_id($post->ID))); ?>"
		alt="<?php the_title(); ?>"> </a> <a class="item-title icon1"
		href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
		target="_self"><h2><?php the_title(); ?></h2></a>
</div>
<?php

endforeach
            ;
            wp_reset_postdata();
        }
    }
}

/**
 * HAM LAY THONG TIN DOI NGU DU AN
 * Ham get post boi category
 */
if (! function_exists('thachpham_project_investment')) {

    function thachpham_project_investment()
    {
        global $post;

        $myposts = get_posts(array(
            'posts_per_page' => 6,
            'category' => 79
        ));

        if ($myposts) {
            foreach ($myposts as $post) :
                setup_postdata($post);
                ?>
<div class="partner-item col-md-2 col-sm-4 col-xs-6">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
		target="_self"> <img
		src="<?php echo(wp_get_attachment_url( get_post_thumbnail_id($post->ID))); ?>"
		alt="<?php the_title(); ?>">
	</a>
</div>
<?php

endforeach
            ;
            wp_reset_postdata();
        }
    }
}

/**
 * HAM LAY FOOTER
 * Ham get post boi id
 */
if (! function_exists('thachpham_theme_footer_post')) {

    function thachpham_theme_footer_post()
    {
        $featureId = 1426;
        ?>
            <div class="container-fluid">
            	<div id="ctl00_divAltContent2" class="altcontent2 cmszone">

            		<div class="col-md-12 Module Module-138">
            			<div class="ModuleContent">
            				<h4>
            					<div itemtype="http://schema.org/Organization">
								<?php
								$postFooter = get_post( $featureId );
								$content = $postFooter -> post_content;
								echo $content;
								?>
            					</div>
            				</h4>
            			</div>
            		</div>
            	</div>
            </div>
		<?php
    }
}

/**
 * HAM LAY HEADER TOP INFO
 * Ham get post boi id
 */
if (! function_exists('thachpham_theme_top_info')) {

    function thachpham_theme_top_info()
    {
        $featureId = 1436;
        $postHeader = get_post( $featureId );
        $content = $postHeader -> post_content;
        echo $content;
    }
}