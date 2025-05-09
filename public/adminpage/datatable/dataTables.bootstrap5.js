(function( factory ){
	if ( typeof define === 'function' && define.amd ) {
		// AMD
		define( ['jquery', 'datatables.net'], function ( $ ) {
			return factory( $, window, document );
		} );
	}
	else if ( typeof exports === 'object' ) {
		// CommonJS
		var jq = require('jquery');
		var cjsRequires = function (root, $) {
			if ( ! $.fn.dataTable ) {
				require('datatables.net')(root, $);
			}
		};

		if (typeof window === 'undefined') {
			module.exports = function (root, $) {
				if ( ! root ) {
					root = window;
				}

				if ( ! $ ) {
					$ = jq( root );
				}

				cjsRequires( root, $ );
				return factory( $, root, root.document );
			};
		}
		else {
			cjsRequires( window, jq );
			module.exports = factory( jq, window, window.document );
		}
	}
	else {
		factory( jQuery, window, document );
	}
}(function( $, window, document ) {
'use strict';
var DataTable = $.fn.dataTable;

/* Set the defaults for DataTables initialisation */
$.extend( true, DataTable.defaults, {
	renderer: 'tailwind'
});

/* Default class modification */
$.extend( true, DataTable.ext.classes, {
	container: "dt-container dt-tailwind",
	search: {
		input: "form-input form-input-sm p-2 border border-gray-300 rounded-md"
	},
	length: {
		select: "form-select form-select-sm p-2 border border-gray-300 rounded-md"
	},
	processing: {
		container: "dt-processing p-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700"
	},
	layout: {
		row: 'flex justify-between w-full items-center space-y-2',
	}
});

/* Tailwind CSS paging button renderer */
DataTable.ext.renderer.pagingButton.tailwind = function (settings, buttonType, content, active, disabled) {
	var btnClasses = ['dt-paging-button', 'page-item'];

	if (active) {
		btnClasses.push('bg-blue-600 text-xs shadow-md rounded-sm');
	}

	if (disabled) {
		btnClasses.push('opacity-50 cursor-not-allowed rounded-sm');
	}

	var li = $('<li>').addClass(btnClasses.join(' '));
	var a = $('<button>', {
		'class': 'page-link w-6 h-6 border border-gray-300 rounded-sm flex items-center justify-center hover:bg-blue-100 hover:text-blue-600 transition-all duration-200 ease-in-out',
		role: 'link',
		type: 'button'
	})
		.html(content)
		.appendTo(li);

	return {
		display: li,
		clicker: a
	};
};

DataTable.ext.renderer.pagingContainer.tailwind = function (settings, buttonEls) {
	return $('<ul/>').addClass('pagination flex space-x-2 items-center').append(buttonEls);
};

return DataTable;
}));
