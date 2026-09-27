add_filter( 'wpsl_frontend_meta_fields', 'custom_frontend_meta_fields' );

function custom_frontend_meta_fields( $store_fields ) {

    // Include the 'wpsl_my_textinput' meta field under the 'my_textinput' key.
    $store_fields['wpsl_my_textinput'] = [
        'name' => 'my_textinput',
        'type' => 'text',
    ];

    return $store_fields;
}
