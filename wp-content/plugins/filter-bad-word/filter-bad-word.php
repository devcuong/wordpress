<?php
/*
 * Plugin Name: Filter Bad Word
 * Plugin URI: http://masteri.com
 * Description: Simple Filter Bad Word Plugin
 * Version: 1.0
 * Author: Doan Cuong
 * Author URI:
 */ 

 global $wp_version;
 if(version_compare($wp_version, '4.0', '<')){
	 exit('This plugin requires WordPress version 5.0 or higher. Please upgrade now');
 }
 
 function mc_bad_words_filter($content){
	 $bad_words = array('shoot', 'damn', 'fork'); 
	 return str_ireplace($bad_words, '[censored]', $content);
 }
 
 add_filter('the_content', 'mc_bad_words_filter');