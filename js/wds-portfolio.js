/**
 * Portoflio functions
 */
( function( $ ) {
	 $( window ).load( function() {

		// Portfolio filtering
		var $container = $( '.portfolio' );

		$container.isotope( {
			filter: '*',
			layoutMode: 'fitRows',
			resizable: true, 
			masonry: {
				columnWidth: 220
			},
			masonryHorizontal: {
				rowHeight: 220
		    }
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
} )( jQuery );