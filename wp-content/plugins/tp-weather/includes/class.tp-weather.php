<?php 
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

class TP_Weather{
	public function __construct(){
		$tp_weather_widget = new TP_Weather_Widget();
		$tp_weather_setting = new TP_Weather_Setting();
	}
	
	public function activation_hook(){
		
	}
	
	public function deactivation_hook(){
		
	}
}