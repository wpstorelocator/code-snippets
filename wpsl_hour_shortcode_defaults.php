add_filter( 'wpsl_hour_shortcode_defaults', 'custom_hour_shortcode_defaults' );

function custom_hour_shortcode_defaults( $shortcode_defaults ) {

    // Always show the current open / closed status above the opening hours.
    $shortcode_defaults['current_status'] = true;

    // Keep the full list of opening hours visible below the status.
    $shortcode_defaults['expand_status'] = false;

    return $shortcode_defaults;
}
