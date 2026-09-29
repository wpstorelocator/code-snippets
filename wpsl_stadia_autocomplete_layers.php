add_filter( 'wpsl_stadia_autocomplete_layers', 'custom_stadia_autocomplete_layers' );

function custom_stadia_autocomplete_layers( $layers ) {

    // Suggest street addresses as well as the default towns and cities.
    $layers[] = 'address';

    return $layers;
}
