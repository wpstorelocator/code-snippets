add_filter( 'wpsl_address_shortcode_defaults', 'custom_address_shortcode_defaults' );

function custom_address_shortcode_defaults( $shortcode_defaults ) {

    // Show the phone, fax, email and url, and a link to the directions.
    $shortcode_defaults['contact_details'] = true;
    $shortcode_defaults['directions']      = true;

    return $shortcode_defaults;
}
