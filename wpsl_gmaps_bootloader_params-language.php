add_filter( 'wpsl_gmaps_bootloader_params', 'custom_gmaps_map_language' );

function custom_gmaps_map_language( $params ) {

    // Remove the language line the plugin added, if there is one.
    $params = preg_replace( "/^\tlanguage: '[^']*',\n/m", '', $params );

    // Add the language as the first line. It ends with a comma because more lines follow.
    $params = "\tlanguage: 'de',\n" . $params;

    return $params;
}
