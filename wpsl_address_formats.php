add_filter( 'wpsl_address_formats', 'custom_address_formats' );

function custom_address_formats( $address_formats ) {

    $address_formats['zip_state_city']       = __( '(zip code) (state) (city)', 'your-textdomain' );
    $address_formats['zip_state_comma_city'] = __( '(zip code) (state), (city)', 'your-textdomain' );

    return $address_formats;
}
