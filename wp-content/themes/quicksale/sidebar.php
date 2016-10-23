<?php
/**
 * The Sidebar containing the main widget areas.
 */

if (in_array(get_custom_option('show_sidebar_main'), array('left', 'right'))) { ?>
<div id="sidebar_main" class="widget_area sidebar_main sidebar sidebarStyleDark" role="complementary">
	<?php
	do_action( 'before_sidebar' );
	global $THEMEREX_CURRENT_SIDEBAR;
	$THEMEREX_CURRENT_SIDEBAR = 'main';
	if ( ! dynamic_sidebar( get_custom_option('sidebar_main') ) ) {
	// Put here html if user no set widgets in sidebar
	}
	?>
</div>
<?php } ?>