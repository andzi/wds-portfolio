/**
 * Portoflio functions
 */
jQuery( document ).ready( function( $ ) {

// Portfolio filtering
var $container = $( '.portfolio' );
// initialize isotope
$container.isotope( {
	filter: '*',
	layoutMode: 'fitRows',
} );

// filter items when filter link is clicked
$( '.portfolio-filter li' ).click( function(){
	var selector = $( this ).attr( 'data-filter' );
		$container.isotope( { 
			filter: selector,
		} );
  return false;
} );

// change is-checked class on buttons
$( '.portfolio-filter ul' ).each( function( i, filterItem ) {
	var $filterItem = $( filterItem );
	$filterItem.on( 'click', 'filter', function() {
		$filterItem.find( '.active' ).removeClass( 'active' );
		$( this ).addClass(' active' );
	});
});

} );