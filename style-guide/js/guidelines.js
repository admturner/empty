/*
 * Testing eslint with eslint-config-wordpress by trying to
 * break all of the WP JavaScript coding standards.
 * Run eslint to see all errors.
 * For reference see:
 * https://make.wordpress.org/core/handbook/best-practices/coding-standards/javascript/#iteration
 */

// jQuery should be accessed through $ by passing the jQuery object into an anonymous function.
// Any , and ; must not have preceding space.
( function( $,window ) {

	// No whitespace at the end of line or on blank lines.

	// Indentation with tabs.
  console.log( 'Lines should usually be no longer than 80 characters, and should not exceed 100 (counting tabs as 4 spaces).' );

	// if/else/for/while/try blocks should always use braces, and always go on multiple lines.
	// Any , and ; must not have preceding space.
	if (false)
		return;

	function thing() {

		// No mixed tabs and spaces.
	  return 'this is a test';

	  	// All 'var' declarations must be at the top of the scope.
		var $i = 0;

		// Unary operators (e.g., ++, --) must not have space.
		i ++;

		// Any , and ; must not have preceding space.
		console.log( $i ) ;
	}

	for (
		var i = 0
		// Any ; used as a statement terminator must be at the end of the line.
		; i < 10
		; ++i
	) {
		// Do not omit closing semicolon.
		console.log( '' )
	}

	// The ? and : in a ternary must have space on both sides.
	( true === 1 )?'yes':'no';

	// Always include extra spaces around elements and arguments.
	array = ['fish', 'fin'];

	// For consistency with our PHP standards, do not include a space around
	// string literals or integers used as key values in array notation.
	prop = object['default'];
	firstArrayElement = arr[0];

	// No filler spaces in empty constructs (e.g., {}, [], fn()).
	function fillerSpace(  ) {

		// Any ! negation operator should have a following space.
		if ( !true ) {
			console.log( '' );
		}
	}
	fillerSpace();

	/*
	 * Each function should begin with a single comma-delimited var statement
	 * that declares any local variables necessary. If a function does not
	 * declare a variable using var, that variable can leak into an outer scope
	 * (which is frequently the global scope, a worst-case scenario), and can
	 * unwittingly refer to and modify that data.
	 * Assignments within the var statement should be listed on individual
	 * lines, while declarations can be grouped on a single line.
	 */
	// Good
 	var k, m, length,
		// Indent subsequent lines by one tab
     	value = 'WordPress';

	// Bad
	var foo = true;
	var bar = false;
	var a;
	var b;

	// Strict equality checks (===) must be used in favor of abstract equality checks (==).
	if ( 1 == 'true' ) {
		var str = "Strings should use single quotes."
	}

	function foo(n) {
		// Use "Yoda" conditions (variable on the right and constant on the left).
		if (n <= 0)
			return;
		arguments.callee(n - 1);
	}

	// One variable declaration per line.
	var obj = {a: 1, b: 2, c: 3}, myKeys = [];
	for ( var prop in obj ) {
		// Guard for-in statements.
		myKeys.push(prop);
	}

	function test() {
		var myVar = 'Hello, World';
		// No undefined variables.
		console.log( myvar );
	}

} ( jQuery, window ) );

// There should be a single new line at the end of each file.
