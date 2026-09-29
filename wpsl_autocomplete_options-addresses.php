add_filter( 'wpsl_autocomplete_options', 'custom_autocomplete_options' );

function custom_autocomplete_options( $settings ) {

    // Only Google Maps uses the autocomplete options.
    if ( ! isset( $settings['api']['autoComplete']['options'] ) ) {
        return $settings;
    }

    // Remove the type restriction, so addresses and businesses are suggested as well.
    unset(
        $settings['api']['autoComplete']['options']['includedPrimaryTypes'], // Autocomplete Data API (new)
        $settings['api']['autoComplete']['options']['types']                 // Places Autocomplete Service (legacy)
    );

    return $settings;
}
