add_filter( 'wpsl_script_versions', 'custom_gmaps_script_version' );

function custom_gmaps_script_version( $versions ) {

    // Load the weekly channel of the Maps JavaScript API when the map waits for GDPR consent.
    $versions['gmaps'] = 'weekly';

    return $versions;
}
