add_filter( 'wpsl_cpt_info_window_meta_fields', 'custom_cpt_info_window_marker_url', 10, 2 );

function custom_cpt_info_window_marker_url( $store_meta, $store_id ) {

    $marker_url = esc_url_raw( get_post_meta( $store_id, 'wpsl_alternate_marker_url', true ) );

    // Use the same marker for the normal and the active ( selected ) state.
    if ( $marker_url ) {
        $store_meta['alternateMarkerUrl']      = $marker_url;
        $store_meta['locationMarkerUrlActive'] = $marker_url;
    }

    return $store_meta;
}
