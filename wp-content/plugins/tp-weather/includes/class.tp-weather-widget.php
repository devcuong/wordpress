<?php 
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
class TP_Weather_Widget extends WP_Widget{
	public function __construct(){
		parent::__construct('tp-weather-widget',__('TP Weather Widget', 'tp_weather'), array('description' => __('Simple Weather Widget', 'tp_weather')));
		add_action('widgets_init', function(){
			register_widget('TP_Weather_Widget');
		});
		
		add_action('wp_enqueue_scripts', function(){
			wp_register_style('tp-css', TP_WEATHER_PLUGIN_URL . 'scripts/css/style.css');
			wp_enqueue_style('tp-css');
			
			
			wp_register_script('tp-js', TP_WEATHER_PLUGIN_URL . 'scripts/js/functions.js', ['jquery']);
			wp_localize_script('tp-js', 'tp', [
				'url' => admin_url('admin-ajax.php')
			] );
			wp_enqueue_script('tp-js');
		});
	}
	
	public function form($instance){
		$title = (isset($instance['title']) && !empty($instance['title'])) ? apply_filters('widget_title', $instance['title']) : __('TP Weather Widget', 'tp_weather') ;
		$unit = (isset($instance['unit']) && !empty($instance['unit'])) ? $instance['unit'] : 'celcius' ;
		require(TP_WEATHER_PLUGIN_DIR . 'views/tp-weather-widget-form.php');
	}
	
	public function update($new_instance, $old_instance){
		$instance = [];
		$instance['title'] = (isset($new_instance['title']) && !empty($new_instance['title'])) ? apply_filters('widget_title', $new_instance['title']) : __('TP Weather Widget', 'tp_weather');
		$instance['unit'] = (isset($new_instance['unit']) && !empty($new_instance['unit'])) ? $new_instance['unit'] : 'celcius' ;
		return $instance;
	}
	
	public function widget($arg, $instance){
		$title = (isset($instance['title']) && !empty($instance['title'])) ? apply_filters('widget_title', $instance['title']) : __('TP Weather Widget', 'tp_weather') ;
		if (get_option('tp_weather_setting')){
			$city_name = get_option('tp_weather_setting')['city_name'];
		} else {
			$city_name = 'Ho+Chi+Minh';
		}
		$widget_option = $instance;
		$data = TP_Weather_API::get_weather($city_name);
		require(TP_WEATHER_PLUGIN_DIR . 'views/tp-weather-widget-view.php');
	}
}

