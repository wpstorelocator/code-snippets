add_filter( 'wpsl_cluster_marker_props', 'my_mapbox_cluster_colors' );

function my_mapbox_cluster_colors( $props ) {
    if ( isset( $props['circle'] ) ) {
        // Colour below 100, threshold, colour 100 - 750, threshold, colour above 750.
        $props['circle']['color'] = [ '#2b83ba', 100, '#fdae61', 750, '#d7191c' ];
    }

    return $props;
}
