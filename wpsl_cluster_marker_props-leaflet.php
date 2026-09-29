add_filter( 'wpsl_cluster_marker_props', 'my_leaflet_cluster_options' );

function my_leaflet_cluster_options( $props ) {

    // Only OpenStreetMap and Stadia Maps use this key.
    if ( isset( $props['spiderfyOnMaxZoom'] ) ) {

        // Show the area that a cluster covers when you hover over it.
        $props['showCoverageOnHover'] = true;
        $props['polygonOptions']      = [ 'color' => '#2b83ba', 'weight' => 2 ];

        // Place the markers further apart when a cluster opens at the highest zoom level.
        $props['spiderfyDistanceMultiplier'] = 2;
    }

    return $props;
}
