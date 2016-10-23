<ul class="usermenu_list">


	<?php

	if (get_custom_option('show_call_back')=='yes') {
		// todo: Login form
		themerex_enqueue_script( 'form-login', themerex_get_file_url('/js/_form_login.js'), array(), null, true );
		// todo: magnific & pretty
		// magnific & pretty
		themerex_enqueue_style( 'magnific-style', themerex_get_file_url('/js/magnific-popup/magnific-popup.css'), array(), null );
		themerex_enqueue_script('magnific', themerex_get_file_url('/js/magnific-popup/jquery.magnific-popup.min.js'), array('jquery'), null, true);
		// Load PrettyPhoto if it selected in Theme Options
		if (get_theme_option('popup_engine') == 'pretty') {
			themerex_enqueue_style('prettyphoto-style', themerex_get_file_url('/js/prettyphoto/css/prettyPhoto.css'), array(), null);
			themerex_enqueue_script('prettyphoto', themerex_get_file_url('/js/prettyphoto/jquery.prettyPhoto.min.js'), array('jquery'), 'no-compose', true);
		}
	?>

		<li class="usermenu_call_back">
			<a class="user-popup-link" href="#form_popup_top">
				<span><?php echo __('request call back', 'themerex'); ?></span>
			</a>

			<?php
			echo do_shortcode('
			[trx_popup id="form_popup_top"]
			[trx_contact_form style="call" title="'.__('Request call back', 'themerex').'" description="'.__('Enter your details below request a call back.', 'themerex').'"][/trx_contact_form]
			[/trx_popup]
			');
			?>

		</li>
<?php } ?>







<?php
if (get_custom_option('show_login')=='yes') {
	// todo: Login form
	themerex_enqueue_script( 'form-login', themerex_get_file_url('/js/_form_login.js'), array(), null, true );
	// todo: magnific & pretty
	// magnific & pretty
	themerex_enqueue_style( 'magnific-style', themerex_get_file_url('/js/magnific-popup/magnific-popup.css'), array(), null );
	themerex_enqueue_script('magnific', themerex_get_file_url('/js/magnific-popup/jquery.magnific-popup.min.js'), array('jquery'), null, true);
	// Load PrettyPhoto if it selected in Theme Options
	if (get_theme_option('popup_engine') == 'pretty') {
		themerex_enqueue_style('prettyphoto-style', themerex_get_file_url('/js/prettyphoto/css/prettyPhoto.css'), array(), null);
		themerex_enqueue_script('prettyphoto', themerex_get_file_url('/js/prettyphoto/jquery.prettyPhoto.min.js'), array('jquery'), 'no-compose', true);
	}

	if ( !is_user_logged_in() ) {
		?>
		<li class="usermenu_login"><a href="#user-popUp" class="user-popup-link"><?php _e('Login', 'themerex'); ?></a></li>
	<?php
	} else {
		$current_user = wp_get_current_user();
		?>
		<li class="usermenu_controlPanel">
			<a href="#"><span><?php echo balanceTags($current_user->display_name); ?></span></a>
			<ul>
				<?php if (current_user_can('publish_posts')) { ?>
					<li><a href="<?php echo esc_url(home_url()); ?>/wp-admin/post-new.php?post_type=post" class="icon"><?php _e('New post', 'themerex'); ?></a></li>
				<?php } ?>
				<li><a href="<?php echo esc_url(get_edit_user_link()); ?>" class="icon"><?php _e('Settings', 'themerex'); ?></a></li>
				<li><a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="icon"><?php _e('Log out', 'themerex'); ?></a></li>
			</ul>
		</li>
	<?php
	}
}




if (get_custom_option('show_search')=='yes') { ?>
	<li class="usermenu_search">
		<div class="search" title="<?php _e('Open/close search form', 'themerex'); ?>">
			<div class="searchForm">
				<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" class="searchField" placeholder="<?php _e('Search', 'themerex'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php _e('Search for:', 'themerex'); ?>" />
					<button type="submit" class="searchSubmit" title="<?php _e('Start search', 'themerex'); ?>"><span class="icoSearch"></span></button>
				</form>
			</div>
			<div class="ajaxSearchResults"></div>
		</div>
	</li>
<?php } ?>




</ul>