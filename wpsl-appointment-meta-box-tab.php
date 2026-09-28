add_filter( 'wpsl_meta_box_fields', 'custom_meta_box_appointment_tab' );

function custom_meta_box_appointment_tab( $meta_fields ) {

    // Add the field to a new "Appointment" tab.
    $meta_fields[ esc_html__( 'Appointment', 'your-textdomain' ) ] = [
        'appointment_url' => [
            'label' => esc_html__( 'Appointment', 'your-textdomain' ),
            'type'  => 'url',
        ],
    ];

    return $meta_fields;
}
