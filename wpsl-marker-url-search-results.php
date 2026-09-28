add_filter( 'wpsl_store_meta', 'custom_store_meta_marker_url', 10, 2 );

function custom_store_meta_marker_url( $store_meta, $store_id ) {

    $marker_url = esc_url_raw( get_post_meta( $store_id, 'wpsl_alternate_marker_url', true ) );

    // Use the same marker for the normal and the active ( selected ) state.
    if ( $marker_url ) {
        $store_meta['alternateMarkerUrl']      = $marker_url;
        $store_meta['locationMarkerUrlActive'] = $marker_url;
    }

    return $store_meta;
}
