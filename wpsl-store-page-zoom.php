add_filter( 'wpsl_map_shortcode_defaults', 'custom_store_page_zoom' );

function custom_store_page_zoom( $defaults ) {

    // Only change the zoom level of the map on the store pages.
    if ( is_singular( 'wpsl_stores' ) ) {
        $defaults['zoom'] = 16;
    }

    return $defaults;
}
