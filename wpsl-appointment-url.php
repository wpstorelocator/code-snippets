$appointment_url = get_post_meta( $queried_object->ID, 'wpsl_appointment_url', true );

if ( $appointment_url ) {
    echo '<p><a href="' . esc_url( $appointment_url ) . '">' . esc_html__( 'Make Appointment', 'wp-store-locator' ) . '</a></p>';
}
