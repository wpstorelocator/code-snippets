add_filter( 'wpsl_geolocation_filter_pattern', 'custom_geolocation_filter_pattern' );

function custom_geolocation_filter_pattern() {

    $filter_pattern = array( 'formatted_address' );

    return $filter_pattern;
}
