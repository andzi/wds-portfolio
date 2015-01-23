/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var container, button, menu;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );

	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};
} )();

!function(){var container,button,menu;if(container=document.getElementById("site-navigation"),container&&(button=container.getElementsByTagName("button")[0],"undefined"!=typeof button)){if(menu=container.getElementsByTagName("ul")[0],"undefined"==typeof menu)return void(button.style.display="none");menu.setAttribute("aria-expanded","false"),-1===menu.className.indexOf("nav-menu")&&(menu.className+=" nav-menu"),button.onclick=function(){-1!==container.className.indexOf("toggled")?(container.className=container.className.replace(" toggled",""),button.setAttribute("aria-expanded","false"),menu.setAttribute("aria-expanded","false")):(container.className+=" toggled",button.setAttribute("aria-expanded","true"),menu.setAttribute("aria-expanded","true"))}}}();
( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();

!function(){var is_webkit=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,is_opera=navigator.userAgent.toLowerCase().indexOf("opera")>-1,is_ie=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(is_webkit||is_opera||is_ie)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var element=document.getElementById(location.hash.substring(1));element&&(/^(?:a|select|input|button|textarea)$/i.test(element.tagName)||(element.tabIndex=-1),element.focus())},!1)}();