add_filter( 'wpsl_js_settings', 'custom_js_settings' );

function custom_js_settings( $settings ) {

    // Use integers, the map scripts compare the zoom levels as numbers.
    if ( is_page( 'car-dealers' ) ) {
        $settings['map']['zoomLevel']     = 12;
        $settings['map']['autoZoomLevel'] = 15;
    } else if ( is_page( 'mechanics' ) ) {
        $settings['map']['zoomLevel']     = 6;
        $settings['map']['autoZoomLevel'] = 12;
    }

    return $settings;
}
