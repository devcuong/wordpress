<?php
/*
Plugin Name: Top Project
Plugin URI: http://thachpham.com
Description: tao widget hien thi du an nha dat
Author: Manh Cuong
Version: 1.0
Author URI: http://google.com
*/
/*
 * Kh?i t?o widget item
 */
add_action( 'widgets_init', 'create_top_project_widget' );
function create_top_project_widget() {
        register_widget('Top_Project_Widget');
}

/*
* Tao Widget
*
*/
class Top_Project_Widget extends WP_Widget {
 
        /**
         * Thit lp widget:
         */
        function __construct() {
			parent::__construct(
			'project_widget',
			'Project Widget',
			
			array(
			'description' => 'Hiển thị các dự án bất động sản trên thị trường' // mo ta
			)
			
			);
        }
 
        /**
         * To form option cho widget
         */
        function form( $instance ) {
			//Biến tạo các giá trị mặc định trong form
			$default = array(
					'title' => 'Bạn hãy nhập tên',
			        'number' => 'Bạn hãy nhập số dự án muốn hiển thị'
			);
			$instance = wp_parse_args( (array) $instance, $default);
			$title = esc_attr( $instance['title'] );
			$number = esc_attr($instance['number']);
			echo "Nhập tiêu đề <input class='widefat' type='text' name='".$this->get_field_name('title')."' value='".$title."' />";
			echo "Nhập tiêu đề <input class='widefat' type='text' name='".$this->get_field_name('number')."' value='".$number."' />";
        }
 
        /**
         * save widget form
         */
 
        function update( $new_instance, $old_instance ) {
			parent::update( $new_instance, $old_instance );
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['number'] = strip_tags($new_instance['number']);
			return $instance;
        }
 
        /**
         * Show widget
         */
 
        function widget( $args, $instance ) {
			extract( $args );
			$title = apply_filters( 'widget_title', $instance['title'] );
			$number = $instance['number'];
	 
			echo $args['before_widget'];
	 
			//In tiêu đề widget
			// var_dump($args['before_title']);
			echo "<div>".$args['before_title'].$title.$args['after_title']."</div>";
	 
			// Nội dung trong widget
			$projectpost = new WP_Query( array( 'post_type'     =>  'project','posts_per_page' => $number ) );
			while ( $projectpost->have_posts() ) : $projectpost->the_post();
			echo "<br>";
			the_title(); 

			endwhile;
			// Kết thúc nội dung trong widget
	 
			echo $args['after_widget'];
        }
 
}