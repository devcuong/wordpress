<?php
	if( is_active_sidebar('search-sidebar') ) :
		dynamic_sidebar('search-sidebar');
	else :
		_e('This is sidebar. You have to add some widgets', 'thachpham');
	endif;
?>