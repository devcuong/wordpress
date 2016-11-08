<?php
/*
Plugin Name: Most View Post
Plugin URI: http://thachpham.com
Description: tao widget myself
Author: Thach Pham
Version: 1.0
Author URI: http://google.com
*/
/*
 * Kh?i t?o widget item
 */
add_action( 'widgets_init', 'create_thachpham_widget' );
function create_thachpham_widget() {
        register_widget('Thachpham_Widget');
}

/*
* Tao Widget
*
*/
class Thachpham_Widget extends WP_Widget {
 
        /**
         * Thit lp widget:
         */
        function __construct() {
			parent::__construct(
			'thachpham_widget',
			'ThachPham Widget',
			
			array(
			'description' => 'Mo ta cua widget' // mo ta
			)
			
			);
        }
 
        /**
         * To form option cho widget
         */
        function form( $instance ) {
			//Biến tạo các giá trị mặc định trong form
			$default = array(
					'title' => 'Ten cua ban'
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
			echo "<div id='most_view_title'>".$args['before_title'].$title.$args['after_title']."</div>";
	 
			// Nội dung trong widget
			$popularpost = new WP_Query( array( 'post_type'     =>  'News','posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
			while ( $popularpost->have_posts() ) : $popularpost->the_post();
			echo "<br>";
			the_title(); 

			endwhile;
			// Kết thúc nội dung trong widget
	 
			echo $args['after_widget'];
        }
 
}