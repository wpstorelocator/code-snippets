add_filter( 'wpsl_meta_box_fields', 'custom_meta_box_appointment_field' );

function custom_meta_box_appointment_field( $meta_fields ) {

    // Add the field to the bottom of the "Additional Information" tab.
    $tab = esc_html__( 'Additional Information', 'wp-store-locator' );

    $meta_fields[ $tab ]['appointment_url'] = [
        'label' => esc_html__( 'Appointment', 'your-textdomain' ),
        'type'  => 'url',
    ];

    return $meta_fields;
}
