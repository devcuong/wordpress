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
            <nav class="pagination" role="navigation" >
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
                    <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a></h1>
                <?php else : ?>
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a></h2>
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


function wpse_load_custom_search_template(){
    if( isset($_REQUEST['search']) == 'advanced' ) {
        require('advanced-search-result.php');
        die();
    }
}
add_action('init','wpse_load_custom_search_template');