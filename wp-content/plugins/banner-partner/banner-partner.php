<?php
/*
Plugin Name: Banner Partner
Plugin URI: http://dothi24h.abc
Description: tao widget hien thi du an nha dat
Author: Manh Cuong
Version: 1.0
Author URI: http://google.com
*/
/*
 * Kh?i t?o widget item
 */
add_action( 'widgets_init', 'create_banner_parter_widget' );
function create_banner_parter_widget() {
        register_widget('Banner_Partner_Widget');
}

/*
* Tao Widget
*
*/
class Banner_Partner_Widget extends WP_Widget {
 
        /**
         * Thit lp widget:
         */
        function __construct() {
			parent::__construct(
			'banner_partner_widget',
			'Banner Partner Widget',
			
			array(
			'description' => 'Hiển thị các banner của đối tác' // mo ta
			)
			
			);
        }
 
        /**
         * To form option cho widget
         */
        function form( $instance ) {
			//Biến tạo các giá trị mặc định trong form
			$default = array(
					'title' => 'Bạn hãy nhập tên'
			);
			$instance = wp_parse_args( (array) $instance, $default);
			$title = esc_attr( $instance['title'] );
			echo "Nhập tiêu đề <input class='widefat' type='text' name='".$this->get_field_name('title')."' value='".$title."' />";
        }
 
        /**
         * save widget form
         */
 
        function update( $new_instance, $old_instance ) {
			parent::update( $new_instance, $old_instance );
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
        }
 
        /**
         * Show widget
         */
 
        function widget( $args, $instance ) {
			extract( $args );
			$title = apply_filters( 'widget_title', $instance['title'] );
	 
			echo $args['before_widget'];
	 
			//In tiêu đề widget
			// var_dump($args['before_title']);
			echo "<div id='most_view_title' class='title_n'>".$args['before_title'].$title.$args['after_title']."</div>";
	 
			// Nội dung trong widget
			echo "<div class='banner-right'>";
			echo "<ul>";
	 
			// Nội dung trong widget
			$projectPost = new WP_Query( array( 'post_type' => 'banner') );
			while ( $projectPost->have_posts() ) : $projectPost->the_post();
			echo "<a href='";
			$urlWebsite = get_post_meta(get_the_ID(),'url_website', true);
			echo $urlWebsite;
			echo "' title='";
			the_title();
			echo "'>";
			the_post_thumbnail();
			echo "</a>"; 
            echo "</h3></li>";
			endwhile;
			// Kết thúc nội dung trong widget
			echo "</ul>";
	        echo "</div>";
			echo $args['after_widget'];
        }
 
}