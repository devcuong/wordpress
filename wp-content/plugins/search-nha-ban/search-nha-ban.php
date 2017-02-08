<?php
/*
Plugin Name: Search Nha Ban
Plugin URI: http://thachpham.com
Description: tao widget tao search form tim nha dat ban
Author: Manh Cuong
Version: 1.0
Author URI: http://google.com
*/
/*
 * Kh?i t?o widget item
 */
add_action( 'widgets_init', 'create_search_nha_ban_widget' );
function create_search_nha_ban_widget() {
        register_widget('Search_Nha_Ban_Widget');
}

/*
* Tao Widget
*
*/
class Search_Nha_Ban_Widget extends WP_Widget {
 
        /**
         * Thit lp widget:
         */
        function __construct() {
			parent::__construct(
			'search_widget',
			'Search Widget',
			
			array(
			'description' => 'Search form tìm nhà bán trên thị trường' // mo ta
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
			echo "<div id='most_view_title' class='title_n'>".$args['before_title'].$title.$args['after_title']."</div>";
	 
			// Nội dung trong widget
			echo "<div class='news-default-right'>";
			echo "<ul>";
	 
			// Nội dung trong widget
			$projectPost = new WP_Query( array( 'post_type' => 'project','posts_per_page' => $number ) );
			while ( $projectPost->have_posts() ) : $projectPost->the_post();
			 if($projectPost->current_post == 0):
			{
			    echo "<li class='first-li'><h3>";
			}
			else:
			{
			    echo "<li><h3>";
			}
			endif;
			echo "<a href='";
			the_permalink();
			echo "' title='";
			the_title();
			echo "'>";
			the_title();
			echo "</a>"; 
            echo "</h3></li>";
			endwhile;
			// Kết thúc nội dung trong widget
			echo "</ul>";
	        echo "</div>";
			echo $args['after_widget'];
        }
 
}