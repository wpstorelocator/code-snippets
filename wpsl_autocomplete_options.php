add_filter( 'wpsl_autocomplete_options', 'custom_autocomplete_options' );

function custom_autocomplete_options( $settings ) {

    $map_service = wpsl_get_active_map_service();

    if ( $map_service === 'gmaps' ) {

        // The option names depend on the "Autocomplete source" setting.
        if ( $settings['api']['autoComplete']['version'] === 'latest' ) {
            $settings['api']['autoComplete']['options']['includedPrimaryTypes'] = [ '(cities)' ];
        } else {
            $settings['api']['autoComplete']['options']['types'] = [ '(cities)' ];
        }
    } elseif ( $map_service === 'mapbox' ) {

        // A comma separated list of Mapbox feature types. 'place' is cities and towns.
        $settings['api']['types'] = 'place';
    }

    return $settings;
}
