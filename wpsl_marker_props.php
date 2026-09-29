add_filter( 'wpsl_marker_props', 'custom_marker_size' );

function custom_marker_size( $marker_props ) {

    // Show the bundled markers at 30 x 44 pixels instead of 24 x 35.
    $marker_props['scaledSize'] = [ 30, 44 ];

    // Google Maps with JSON styling: put the point of the marker at the bottom centre.
    $marker_props['anchor'] = [ 15, 44 ];

    // OpenStreetMap and Stadia Maps: the same point, and the popup just above the marker.
    if ( isset( $marker_props['iconAnchor'] ) ) {
        $marker_props['iconAnchor']  = [ 15, 44 ];
        $marker_props['popupAnchor'] = [ 0, -47 ];
    }

    return $marker_props;
}
