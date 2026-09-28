add_filter( 'wpsl_listing_template', 'custom_listing_template_appointment' );

function custom_listing_template_appointment( $listing_template ) {

    $link_text = esc_html__( 'Make an Appointment', 'your-textdomain' );

    $appointment = '<% if ( typeof appointment_url !== "undefined" && appointment_url ) { %>' . "\r\n";
    $appointment .= '<p><a href="<%= appointment_url %>">' . $link_text . '</a></p>' . "\r\n";
    $appointment .= '<% } %>' . "\r\n";

    // Add the link below the address, the first paragraph in the template.
    $listing_template = preg_replace( '#</p>#', "</p>\r\n" . $appointment, $listing_template, 1 );

    return $listing_template;
}
