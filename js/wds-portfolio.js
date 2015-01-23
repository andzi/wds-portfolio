/**
 * Portoflio functions
 */
jQuery( document ).ready( function( $ ) {

// Portfolio filtering
var $container = $( '.portfolio' );
// initialize isotope
$container.isotope( {
	filter: '*',
} );

// filter items when filter link is clicked
$( '.portfolio-filter li' ).click( function(){
	var selector = $( this ).attr( 'data-filter' );
		$container.isotope( { 
			filter: selector,
		} );
  return false;
} );

} );