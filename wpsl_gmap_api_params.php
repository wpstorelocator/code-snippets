add_filter( 'wpsl_gmap_api_params', 'custom_gmap_api_params' );

function custom_gmap_api_params( $api_params ) {

    // Turn "&languageCode=en&regionCode=US&key=..." into an array.
    parse_str( ltrim( $api_params, '&' ), $params );

    // Get the Geocoding API results in German.
    $params['languageCode'] = 'de';

    return '&' . http_build_query( $params, '', '&', PHP_QUERY_RFC3986 );
}
