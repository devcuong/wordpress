<?php
/*
 * Plugin Name: Email Commenter
 * Plugin URI: http://masteri.com
 * Description: Simple Email Commenter Plugin
 * Version: 3.0
 * Author: Doan Cuong
 * Author URI:
 */ 

 global $wp_version;
 if(version_compare($wp_version, '4.0', '<')){
	 exit('This plugin requires WordPress version 5.0 or higher. Please upgrade now');
 }
 
 function mc_email_commenter(){
	 var_dump($wp_version);
	// $email = $_POST['email'];
	// var_dump($email);
	// $name = $_POST['author'];
	// var_dump($author);
	// $message = "Hello {$name}, thank you for leaving a comment";
	// var_dump(wp_mail($email, 'Thank you for leaving a comment', $message));
 }
 
add_action('comment_post', 'mc_email_commenter');
 
 ?>