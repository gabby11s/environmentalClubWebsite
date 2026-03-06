( function( $ ) {
	// Keyboard accessibility for main menu.
	$( window ).on( 'load.natureBliss resize.natureBliss', function() {
		$('#mob-menu').on('focusout', function () {
			var $elem = $(this);

			// let the browser set focus on the newly clicked elem before check
			setTimeout(function () {
				if ( ! $elem.find(':focus').length ) {
					$( '#mobile-trigger' ).trigger('focus');
				}
			}, 0);
		});
		
		$('.search-box-wrap').on('focusout', function () {
			var $elem = $(this);

			// let the browser set focus on the newly clicked elem before check
			setTimeout(function () {
				if ( ! $elem.find(':focus').length ) {
					$( '.search-icon' ).trigger('focus');
				}
			}, 0);
		});
	});

	$(document).ready(function($){
		// Search in Header.
		$(".search-icon").on('click',function(e){
			e.preventDefault();
			$(".search-box-wrap").show();

		});

		$(".search-close").on('click',function(e){
			e.preventDefault();
			$(".search-box-wrap").hide();
		});

		// Mobile Menu Start.
		siteNavigation   = $( '#site-navigation' );
		// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
		( function() {
			if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
				return;
			}

			// Toggle `focus` class to allow submenu access on tablets.
			function toggleFocusClassTouchScreen() {
				if ( window.innerWidth >= 910 ) {
					$( document.body ).on( 'touchstart.natureBliss', function( e ) {
						if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
							$( '.main-navigation li' ).removeClass( 'focus' );
						}
					} );
					siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).on( 'touchstart.natureBliss', function( e ) {
						var el = $( this ).parent( 'li' );

						if ( ! el.hasClass( 'focus' ) ) {
							e.preventDefault();
							el.toggleClass( 'focus' );
							el.siblings( '.focus' ).removeClass( 'focus' );
						}
					} );
				} else {
					siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).unbind( 'touchstart.natureBliss' );
				}
			}

			if ( 'ontouchstart' in window ) {
				$( window ).on( 'resize.natureBliss', toggleFocusClassTouchScreen );
				toggleFocusClassTouchScreen();
			}

			siteNavigation.find( 'a' ).on( 'focus.natureBliss blur.natureBliss', function() {
				$( this ).parents( '.menu-item' ).toggleClass( 'focus' );
			} );
		})();

		$('#mobile-trigger').on('click', function(){
			$(this).parents('.site-header-menu').toggleClass('is-open');
			$(this).toggleClass('selected');
			$( this ).attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		});

		 // Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', {
			'class': 'dropdown-toggle',
			'aria-expanded': false
		} ).append( $( '<span />', {
			'class': 'screen-reader-text',
		} ) );

		var container = $( '#mob-menu' );

		container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownToggle );
		container.find( '.current_page_ancestor > button' ).addClass( 'toggled-on' );
		container.find( '.current_page_ancestor > .sub-menu' ).addClass( 'toggled-on' );

		container.find( '.dropdown-toggle' ).on( 'click', function( e ) {
			e.preventDefault();
			var _this = $( this ),
			screenReaderSpan = _this.find( '.screen-reader-text' );

			_this.toggleClass( 'toggled-on' );
			_this.next( '.sub-menu' ).toggleClass( 'toggled-on' );

			// jscs:disable
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
			screenReaderSpan.text( screenReaderSpan.text() === natureBlissCustomOptions.screenReaderText.expand ? natureBlissCustomOptions.screenReaderText.collapse : natureBlissCustomOptions.screenReaderText.expand );
		});
		// Mobile Menu End.

		// Implement go to top.
		var $scroll_obj = $( '#btn-scrollup' );
		$( window ).on( 'scroll',function(){
			if ( $( this ).scrollTop() > 100 ) {
				$scroll_obj.fadeIn();
			} else {
				$scroll_obj.fadeOut();
			}
		});

		$scroll_obj.on( 'click',function(){
			$( 'html, body' ).animate( { scrollTop: 0 }, 600 );
			return false;
		});

	});

	/*Fixed Nav on Scroll*/
	var  mainNav = $(".site-header-menu");
	scrolledNav = "nav-scrolled";
	navOffset = $('.site-header-menu').offset().top;

	$(window).on( 'scroll',function() {
		if( $(this).scrollTop() > navOffset ) {
			mainNav.addClass(scrolledNav);
		} else {
			mainNav.removeClass(scrolledNav);
		}
	});

} )( jQuery );
