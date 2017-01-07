<?php
	if( is_active_sidebar('extra-sidebar') ) :
		dynamic_sidebar('extra-sidebar');
	else :
		_e('This is sidebar. You have to add some widgets', 'thachpham');
	endif;
?>