<?php
/**
  @ Khai bao hang gia tri
  @ THEME_URL = lay duong dan thu muc theme
  @ CORE = lay duong dan thu muc /core
 **/
 define( 'THEME_URL', get_stylesheet_directory_uri() );
 define( 'THEME_DIR', get_stylesheet_directory() );
 define('CORE', THEME_DIR . "/core");
 
 /**
  @ Nhung file /core/init.php
  **/
  require_once(CORE . "/init.php");
  
  /**
   @ Thiet lap chieu rong noi dung
   **/
   if ( !isset($content_width) ){
    $content_width = 620;
   }
   
   /**
    @ Khai bao chuc nang cua theme
    **/
    if( !function_exists('thachpham_theme_setup')){
        function thachpham_theme_setup(){
            /* Thiet lap textdomain */
            $language_folder = THEME_DIR . '/languages';
            load_theme_textdomain('thachpham', $language_folder);
            
            /* Tu dong them link CSS len <head> */
            add_theme_support( 'automatic-feeds-links' );
            
            /* Them post thumnail */
            add_theme_support( 'post-thumbnails' );
            
            /* Post Format */
            add_theme_support('post-formats', array(
            'image',
            'video',
            'gallery',
            'quote',
            'link'
            ));
            
            /* Them title-tag */
            add_theme_support( 'title-tag' );
            
            /* Them custom background */
            $default_background = array(
                'default-color' => '#e8e8e8'
            );
            add_theme_support( 'custom-background' );
            
            /* Them menu */
            register_nav_menu( 'primary-menu', __('Primary Menu', 'thachpham') );
            
            /* Tao sidebar */
            $sidebar = array(
                'name' => __('Main Sidebar', 'thachpham'),
                'id' => 'main-sidebar',
                'description' => __('Default sidebar'),
                'class' => 'main-sidebar',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>'
            );
            register_sidebar( $sidebar );
        }
        add_action('init', 'thachpham_theme_setup');
    }
    /*------------- TEMPLATE FUNCTION ------------- */
    /**
     * Tao va hien thi Header
     * */
    if(!function_exists('thachpham_header')){
        function thachpham_header(){ ?>
<div class="site-name">
             <?php
                if( is_home() ){
                    printf( '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
                    get_bloginfo('url'),
                    get_bloginfo('description'),
                    get_bloginfo('sitename') 
                );
                }else{
                    printf( '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
                    get_bloginfo('url'),
                    get_bloginfo('description'),
                    get_bloginfo('sitename') 
                );
                }
            ?>
            </div>
<div class="site-description"><?php bloginfo('description'); ?></div>
<?php 
        }
    }
    
    /**
     * Thiet lap menu
     * */
     if(!function_exists('thachpham_menu')){
        function thachpham_menu($menu){
            $menu = array(
            'theme_location' => $menu,
            'container' => 'nav',
            'container_class' => $menu,
			'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>'
            );
            wp_nav_menu( $menu );
        }
     }
     
     /**
      * Ham tao phan trang don gian
      * */
      if(!function_exists('thachpham_pagination')){
        function thachpham_pagination(){
            if($GLOBALS['wp_query']->max_num_pages < 2){
                return '';
            } ?>
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
<?php }
      }
      
      /**
       * Ham hien thi thumbnail
       * */
       if ( !function_exists('thachpham_thumbnail') ){
            function thachpham_thumbnail($size){
                if( !is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')) : ?>
                <?php the_post_thumbnail( $size ); ?>
            <?php endif; ?>
            <?php }
       }
       
       /**
        * Ham hien thi tieu de post = thachpham_entry_header
        * */
        if (!function_exists('thachpham_entry_header')) {
            function thachpham_entry_header(){ ?>
                <?php if ( is_single() ) : ?>
<h1>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</h1>
<?php else : ?>
<h2>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</h2>
<?php endif ?>
            <?php }
        }
        
        /**
         * Lay du lieu thong tin cua post = thachpham_entry_meta
         * 
         * */
         if (!function_exists('thachpham_entry_meta')) {
            function thachpham_entry_meta(){ ?>
               <?php if ( !is_page() && has_post_thumbnail() ) : ?>
<div class="entry-meta">
                <?php
                    printf( __('<span class="author">Posted by %1$s', 'thachpham'), get_the_author() );
                    printf( __('<span class="date-published"> at %1$s', 'thachpham'), get_the_date() );
                    printf( __('<span class="category"> in %1$s', 'thachpham'), get_the_category_list(',') );
                    
                    if ( comments_open() ) :
                        echo '<span class="meta-reply">';
                            comments_popup_link(
                                __('Leave a comment', 'thachpham'),
                                __('One comment', 'thachpham'),
                                __('% comments', 'thachpham'),
                                __('Read all comments', 'thachpham')
                            );
                        echo '</span>';
                    endif;
                ?>
               </div>
<?php else: 
					echo 'Không có kết quả tìm kiếm phù hợp';
				 ?>
					
               <?php endif; ?>
            <?php }
        }
        
        /**
         * Ham hien thi noi dung cua post page
         * */
          if (!function_exists('thachpham_entry_content')) {
            function thachpham_entry_content(){
              if ( !is_single() && !is_page() ) {
                // the_excerpt();
              } else {
                the_content();
                
                /* Phan trang trong single */
                $link_pages = array(
                'before' => __('<p>Page: ', 'thachpham'),
                'after' => '</p>',
                'nextpagelink' => __('Next Page', 'thachpham'),
                'previouspagelink' => __('Previous Page', 'thachpham')
                );
                wp_link_pages( $link_pages );
                
              }
            }
        }
        
        /**
         * Them read more
         * */
         function thachpham_readmore(){
            return '<a class="read-more" href="'. get_permalink( get_the_ID() ).'">'.__('[Read More]', 'thachpham').'</a>';
         }
         add_filter('excerpt_more','thachpham_readmore');
         
         /**
          * Ham hien thi tag
          * */
           if (!function_exists('thachpham_entry_tag')) {
            function thachpham_entry_tag(){
                if( has_tag() ) :
                    echo '<div class="entry-tag">';
                    printf( __('Tagged in %1$s','thachpham'), get_the_tag_list( '', ','));
                    echo '</div>';
                endif;
            }
        }
    /*------------- TEMPLATE CSS ------------- */
function thachpham_style() {
	
	wp_register_style('main-style', THEME_URL. "/style.css", 'all');
	wp_enqueue_style('main-style');
	
	wp_register_style('reset-style', THEME_URL. "/reset.css", 'all');
	wp_enqueue_style('reset-style');
	
	wp_register_style('superfish-style', THEME_URL. "/superfish.css", 'all');
	wp_enqueue_style('superfish-style');
}
add_action('wp_enqueue_scripts', 'thachpham_style');

	/*------------- TEMPLATE CSS ------------- */
function thachpham_script() {
	wp_register_script('superfish-script', THEME_URL. "/superfish.js", array('jquery'));
	wp_enqueue_script('superfish-script');
	
	wp_register_script('custom-script', THEME_URL. "/custom.js", array('jquery'));
	wp_enqueue_script('custom-script');
}
add_action('wp_enqueue_scripts', 'thachpham_script');

	/*------------- CREATE SEARCH BOX WHEN LOAD WEBSITE ------------- */
function wpse_load_custom_search_template(){
    if( isset($_REQUEST['search']) == 'advanced' ) {
        require('advanced-search-result.php');
        die();
    }
}
add_action('init','wpse_load_custom_search_template');

	/*------------- CREATE CUSTOMBOX TYPE WHEN LOAD WEBSITE ------------- */
/*Custom post type*/
  add_action('init', 'create_news_post_type');
  function create_news_post_type(){
    register_post_type('News',
      array(
        'labels'  =>  array(
          'name'  =>  __('News'),
          'singular_name' =>  __('News'),
          'add_new' =>  __('Add New'),
          'add_new_item'  =>  __('Add New News'),
          'edit'  =>  __('Edit'),
          'edit_item' =>  __('Edit News'),
          'new_item'  =>  __('New News'),
          'view'  =>  __('View News'),
          'view_item' =>  __('View News'),
          'search_items' =>  __('Search News'),
          'not_found' =>  __('No News found'),
          'not_found_in_trash'  =>  __('No News found in Trash')
        ),
        'public'  =>  true,
        'show_ui' =>  true,
        'publicy_queryable' =>  true,
        'exclude_from_search' =>  false,
        'menu_position' => 20,
        'menu_icon' =>  get_stylesheet_directory_uri(). '/images/news.png',
        'hierarchical'  => false,
        'query_var' =>  true,
        'supports'  =>  array(
          'title', 'editor', 'comments', 'author', 'excerpt', 'thumbnail',
          'custom-fields'
        ),
        'rewrite' =>  array('slug'  =>  'news', 'with_front' =>  false),
        //'taxonomies' =>  array('post_tag', 'category'),
        'can_export'  =>  true,
        //'register_meta_box_cb'  =>  'call_to_function_do_something',
        'description' =>  __('News description here.')
      )
    );
  }
  
  add_action('init', 'create_news_taxonomies');
  function  create_news_taxonomies(){
    register_taxonomy('newscategory', 'news', array(
      'hierarchical'  =>  true,
      'labels'  =>  array(
          'name'  =>  __('News Category'),
          'singular_name' =>  __('News Category'),
          'add_new' =>  __('Add New'),
          'add_new_item'  =>  __('Add New News Category'),
          'new_item'  =>  __('New News Category'),
          'search_items' =>  __('Search News Category'),
        ),
    ));
    register_taxonomy('newstag', 'news', array(
      'hierarchical'  =>  false,
      'labels'  =>  array(
          'name'  =>  __('News Tag'),
          'singular_name' =>  __('News Tag'),
          'add_new' =>  __('Add New'),
          'add_new_item'  =>  __('Add New News Tag'),
          'new_item'  =>  __('New News Tag'),
          'search_items' =>  __('Search News Tag'),
        ),
    ));

  }

/*------------- GET CUSTOM POST FOR INIT LOAD ------------- */
	// add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

	// function add_my_post_types_to_query( $query ) {
		// if ( is_home() && $query->is_main_query() )
			// $query->set( 'post_type', array( 'post', 'news' ) );
		// return $query;
	// }
	function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/*------------- SET DEFAULT CUSTOM FIELD FOR POST ------------- */
add_action('wp_insert_post', 'set_default_custom_fields');
function set_default_custom_fields($post_id){
    if ( $_GET['post_type'] == 'project' ) {

        add_post_meta($post_id, 'dia_chi', '', true);
        add_post_meta($post_id, 'dien_thoai', '', true);
    }
    return true;
}

/*------------- GET TOP NEWS ------------- */
if (!function_exists('dothi_get_top_news')) {
    function dothi_get_top_news(){
        
        // Query get top 6 news
        $v_args = array(
            'post_type'     =>  'News', // your CPT
            'posts_per_page' => 6
        );
        $newsQuery = new WP_Query( $v_args );
    ?>
       		<?php 	if( $newsQuery->have_posts() ) : 
       			while( $newsQuery->have_posts() ) : 
       			$newsQuery->the_post(); ?>
       			<?php
				   if($newsQuery->current_post == 0)
				   { ?>
<div class='news-default-left'>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?>
	</a>
	<h2>
		<a href="<?php the_title(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	</h2>
</div>
<div class="news-default-right">
	<ul>
		<li class="first-li"><?php } ?>
		
		<li>
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
							</a>
			</h3>
		</li>
				<?php endwhile ; ?>
				<?php endif; ?>
        
            </ul>
            <?php
    }
}