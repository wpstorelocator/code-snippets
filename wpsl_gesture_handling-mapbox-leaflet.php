add_action( 'wp_enqueue_scripts', 'custom_wpsl_map_gestures' );

function custom_wpsl_map_gestures() {

    // Runs through the wpslMapOptions hook, just before the map is created.
    $script = "
        wp.hooks.addFilter( 'wpslMapOptions', 'custom/map-gestures', function( mapOptions ) {
            var provider = window.wpslSettings ? wpslSettings.api.provider : '';

            if ( provider === 'mapbox' ) {
                // Zoom with Ctrl / Cmd + scroll, and move the map with two fingers on touch screens.
                mapOptions.options.cooperativeGestures = true;
            } else if ( provider === 'osm' || provider === 'stadia' ) {
                // Leaflet has no cooperative mode, so turn off one-finger dragging on phones and tablets.
                mapOptions.options.dragging = ! L.Browser.mobile;
            }

            return mapOptions;
        } );
    ";

    // wp-hooks is loaded before the WP Store Locator script, so the filter is in place in time.
    wp_add_inline_script( 'wp-hooks', $script );
}
