wp.hooks.addFilter( 'wpslMapOptions', 'my-plugin', function( options ) {
	console.log( 'wpslMapOptions ran:', options );
	options.maxZoom = 14;
	return options;
} );

wp.hooks.addAction( 'wpslMarkerClicked', 'my-plugin', function( marker, markerData, map ) {
	console.log( markerData );
} );
