jQuery(document).ready(function($){
	jQuery('nav.primary-menu ul.sf-menu').superfish();
	
	$("#input-delete-post").submit(function( event ) {
		  alert( "Handler for .submit() called." );
		  event.preventDefault();
		});
});

