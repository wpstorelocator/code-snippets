add_filter( 'wpsl_gmaps_bootloader_params', 'custom_gmaps_bootloader_params' );

function custom_gmaps_bootloader_params( $params ) {

    // Load the weekly channel of the Maps JavaScript API instead of the quarterly one.
    $params = str_replace( "v: 'quarterly'", "v: 'weekly'", $params );

    return $params;
}
