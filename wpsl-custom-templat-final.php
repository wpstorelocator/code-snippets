// Add the address shortcode, including a directions link.
echo do_shortcode( '[wpsl_address directions="true"]' );

// Show the appointment url
$appointment_url = get_post_meta( $queried_object->ID, 'wpsl_appointment_url', true );

if ( $appointment_url ) {
  echo '<p><a href="' . esc_url( $appointment_url ) . '">' . esc_html__( 'Make Appointment', 'wp-store-locator' ) . '</a></p>';
}

// Include the comments template
comments_template( 'comments.php' );
