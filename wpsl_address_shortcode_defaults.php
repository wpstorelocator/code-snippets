add_filter( 'wpsl_address_shortcode_defaults', 'custom_address_shortcode_defaults' );

function custom_address_shortcode_defaults( $shortcode_defaults ) {

    $shortcode_defaults['country'] = false;

    return $shortcode_defaults;
}
