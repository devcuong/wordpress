<?php 
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

class TP_Weather_API{
	// Lay chuoi json
	public static function get_JSON($json){
		return json_decode($json, true);
	}
	
	// Gui request toi website
	public static function request($city = 'Ho+Chi+Minh', $like = true, $mode = 'json'){
		$type = ($like) ? 'like' : 'accurate';
		$city = urlencode(trim($city));
		$url = 'http://api.openweathermap.org/data/2.5/find?q=' . $city . '&type=' . $type . '&mode=' . $mode . '&appid=b9c9e519cd125108afafbd629e64dc2c';
		@$fget = file_get_contents($url);
		if($fget){
			return  self::get_JSON($fget);
		}
		return false;
	}
	// Lay du lieu weather
	public static function get_weather($data = [], $mode = 'json'){
		$old_data = get_transient('tp_weather_data');
		if( !$old_data && $data){
			$return = [];
			foreach($data as $city_name){
				$url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city_name . '&units=metric&mode=' . $mode . '&appid=b9c9e519cd125108afafbd629e64dc2c';
				@$fget = file_get_contents($url);
				if($fget){
					$return[] = self::get_JSON($fget);
				}
			}
			if($return){
				set_transient('tp_weather_data', $return, 10800);
				return $return;
			}
		} else {
			foreach ($old_data as $key => $value){
				if(empty($value)){
					unset($old_data[$key]);
				}
			}
			if($old_data){
				$old_data = array_values($old_data);
				return $old_data;
			}
			
		}
		return false;
	}
	// Lay nhiet do
	public static function get_temperature($temp = 0, $option = 'celsius'){
		switch($option){
			case 'celsius':
				return $temp . 'C';
				break;
			
			case 'fahrenheit':
				return ($temp * 9/5 + 32) . 'F';
				break;
		}
	}
	
	public static function get_weather_icon($code = '01d'){
		return "http://openweathermap.org/img/w/{$code}.png";
	}
}