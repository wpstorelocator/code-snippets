add_filter( 'wpsl_address_formats', 'custom_address_formats' );

function custom_address_formats( $address_formats ) {

    // "region" is the name of a field created in the Fields Manager.
    $address_formats['zip_city_comma_region'] = __( '(zip code) (city), (region)', 'your-textdomain' );

    return $address_formats;
}

// The [wpsl_map] shortcode doesn't load custom fields for its marker pop-up, so add the field here.
add_filter( 'wpsl_cpt_info_window_meta_fields', 'custom_cpt_info_window_meta_fields', 10, 2 );

function custom_cpt_info_window_meta_fields( $store_fields, $store_id ) {

    $store_fields['region'] = sanitize_text_field( get_post_meta( $store_id, 'wpsl_region', true ) );

    return $store_fields;
}

// The [wpsl_address] shortcode only shows address parts that are also shortcode attributes.
add_filter( 'wpsl_address_shortcode_defaults', 'custom_address_shortcode_defaults' );

function custom_address_shortcode_defaults( $shortcode_defaults ) {

    $shortcode_defaults['region'] = true;

    return $shortcode_defaults;
}
