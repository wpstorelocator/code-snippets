add_filter( 'wpsl_geolocation_timeout', 'custom_geolocation_timeout' );

function custom_geolocation_timeout( $timeout ) {

    // The time in milliseconds. The default is 7500.
    return 10000;
}
