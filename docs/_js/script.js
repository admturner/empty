( function() {
	'use strict';

	let navbtn = document.querySelector( '.section-nav-toggle' ),
		navmenu = document.querySelector( '#section-nav-menu' ),
		navtitles;
	const taskCheckboxes = Array.from( document.querySelectorAll( '.task-list-item-checkbox' ) );

	

	function toggleSectionNavMenu() {
		navmenu.classList.toggle( 'visible' );
		navbtn.classList.toggle( 'nav-visible' );
		navbtn.setAttribute(
			'aria-expanded',
			'false' === navbtn.getAttribute( 'aria-expanded' ) ? 'true' : 'false'
		);
	}

	function maybeHideSectionNavMenu( e ) {
		if ( ! navbtn.contains( e.target ) && ! navmenu.contains( e.target ) ) {
			hideSectionNavMenu();
		}
	}

	function hideSectionNavMenu() {
		if ( navmenu.classList.contains( 'visible' ) ) {
			navmenu.classList.remove( 'visible' );
			navbtn.classList.remove( 'nav-visible' );
			navbtn.setAttribute( 'aria-expanded', false );
		}
	}

	function toggleSubMenu() {
		this.classList.toggle( 'show-menu' );
	}

	// Add navigation menu event listeners only when nav menu is present.
	if ( null !== navmenu ) {
		navtitles = navmenu.getElementsByClassName( 'nav-section-title' );

		navbtn.addEventListener( 'click', toggleSectionNavMenu, false );

		Array.from( navtitles ).forEach( function( navtitle ) {
			navtitle.addEventListener( 'click', toggleSubMenu, false );
			navtitle.addEventListener( 'keyup', function( e ) {
				if ( 'Enter' === e.key ) {
					navtitle.click();
				}
			}, false );
		} );

		document.addEventListener( 'click', maybeHideSectionNavMenu, false );
		document.addEventListener( 'keyup', function( e ) {
			if ( 'Escape' === e.key || 'Esc' === e.key ) {
				hideSectionNavMenu();
			}
		}, false );
	}

}() );
