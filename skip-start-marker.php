add_filter( 'wpsl_marker_props', 'custom_marker_props' );

function custom_marker_props( $marker_props ) {

    $marker_props['skipStart'] = true;

    return $marker_props;
}
