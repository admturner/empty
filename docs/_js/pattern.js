( function() {
	'use strict';

	/**
	 * Checks feature support and lazy loads polyfill if needed.
	 */
	if ( ! ( window.customElements && document.body.attachShadow ) ) {
		console.log( 'Custom elements not supported in this browser.' );
		return;
	}

	/**
	 * Creates the Pattern Demo Custom Element.
	 *
	 * Defines the Pattern Demo custom element as a Shadow DOM element.
	 * Populates the interior content by cloning the content defined by the
	 * `tmpl` template. Also provides the controllers for the pattern demo
	 * width adjustment.
	 */
	let tmpl = document.querySelector( '#pattern-demo' );
	customElements.define( 'pattern-demo', class extends HTMLElement {

		constructor() {

			// Must be first to establish correct prototype chain and this val.
			super();
			let shadowRoot = this.attachShadow( { mode: 'open' } );
			shadowRoot.appendChild( tmpl.content.cloneNode( true ) );
		}

		get allButtons() {
			return Array.from( document.querySelectorAll( '.set-pattern-width' ) );
		}

		get widthControllerValue() {
			return this.clientWidth;
		}

		set widthControllerValue( n ) {
			let demoInput = document.getElementById( 'pattern-demo-width' );
			demoInput.value = n;
		}

		connectedCallback() {

			// Set by starting value for the pattern demo width controller.
			this.widthControllerValue = this.widthControllerValue;

			const demoInput = document.getElementById( 'pattern-demo-width' );
			const resetButton = document.getElementById( 'reset-width' );
			const buttons = this.allButtons;

			// Binds listener callbacks so we can remove them later.
			this._boundOnResizeWin = this._updateInputValue.bind( this );
			this._boundOnInputOut = this._resizeDemoContainer.bind( this, 'resize' );
			this._boundOnResetOut = this._resizeDemoContainer.bind( this, 'reset' );
			this._boundOnKeyUp = this._onKeyUp.bind( this );

			// Updates the input value to match if the user resizes the window.
			window.addEventListener(
				'resize',
				this._boundOnResizeWin,
				false
			);

			/*
			 * The demoInput listeners handle the input field.
			 */
			demoInput.addEventListener(
				'mouseup',
				this._boundOnInputOut,
				false
			);

			demoInput.addEventListener(
				'blur',
				this._boundOnInputOut,
				false
			);

			demoInput.addEventListener(
				'keyup',
				this._boundOnKeyUp,
				false
			);

			/*
			 * Handles the reset button to set the window size to current view.
			 */
			resetButton.addEventListener(
				'mouseup',
				this._boundOnResetOut,
				false
			);

			resetButton.addEventListener(
				'keyup',
				this._boundOnKeyUp,
				false
			);

			/**
			 * Handles the quick-size buttons.
			 */
			buttons.forEach( button => {
				button.addEventListener(
					'mouseup',
					this._resizeDemoContainer.bind( this, button.value ),
					false
				);
			} );

			buttons.forEach( button => {
				button.addEventListener(
					'keyup',
					e => {
						if ( 'Enter' === e.key ) {
							this._resizeDemoContainer( button.value );
						}
					},
					false
				);
			} );
		}

		disconnectedCallback() {
			const demoInput = document.getElementById( 'pattern-demo-width' );
			const resetButton = document.getElementById( 'reset-width' );

			window.removeEventListener( 'resize', this._boundOnResizeWin );
			demoInput.removeEventListener( 'mouseup', this._boundOnInputOut );
			demoInput.removeEventListener( 'blur', this._boundOnInputOut );
			demoInput.removeEventListener( 'keyup', this._boundOnKeyUp );
			resetButton.removeEventListener( 'mouseup', this._boundOnResetOut );
			resetButton.removeEventListener( 'keyup', this._boundOnKeyUp );
		}

		_updateInputValue() {
			this.widthControllerValue = this.widthControllerValue;
		}

		_onKeyUp( e ) {
			const resetButton = document.getElementById( 'reset-width' );
			const demoInput = document.getElementById( 'pattern-demo-width' );

			if ( demoInput === e.target ) {
				switch ( e.key ) {
				case 'Enter':
					this._resizeDemoContainer( 'resize' );
					break;
				case 'Escape':
				case 'Esc':
					this.widthControllerValue = this.widthControllerValue;
					break;
				default:
					break;
				}
			} else if ( resetButton === e.target ) {
				if ( 'Enter' === e.key ) {
					this._resizeDemoContainer( 'reset' );
				}
			} else {
				return;
			}
		}

		_resizeDemoContainer( resizeMethod = null ) {
			let demoInput = document.getElementById( 'pattern-demo-width' );
			let demoContainer = document.querySelector( 'pattern-demo' );

			if ( 'resize' === resizeMethod ) {
				demoContainer.style.width = demoInput.value + 'px';
			} else if ( 'reset' === resizeMethod ) {
				demoContainer.removeAttribute( 'style' );
				setTimeout(
					() => {
						this.widthControllerValue = this.widthControllerValue;
					},
					500
				);
			} else {
				let width = parseInt( resizeMethod, 10 );
				if ( isNaN( width ) ) {
					return 0;
				}
				demoContainer.style.width = width + 'px';
				setTimeout(
					() => {
						this.widthControllerValue = this.widthControllerValue;
					},
					500
				);
			}
		}

	} );

}() );
