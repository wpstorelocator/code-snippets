add_filter( 'wpsl_frontend_meta_fields', 'custom_frontend_meta_appointment' );

function custom_frontend_meta_appointment( $store_fields ) {

    // Include the 'wpsl_appointment_url' meta field under the 'appointment_url' key.
    $store_fields['wpsl_appointment_url'] = [
        'name' => 'appointment_url',
        'type' => 'url',
    ];

    return $store_fields;
}
