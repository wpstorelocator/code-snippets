add_filter( 'wpsl_js_settings', 'custom_js_map_type' );

function custom_js_map_type( $settings ) {

    // Google Maps only. The map type is roadmap, satellite, hybrid or terrain.
    if ( is_page( 'contact-us' ) ) {
        $settings['map']['type']        = 'satellite';
        $settings['map']['typeControl'] = 0;
    }

    return $settings;
}
