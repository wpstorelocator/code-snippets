add_filter( 'wpsl_map_controls', 'custom_map_controls_no_location_button' );

function custom_map_controls_no_location_button( $map_controls ) {

    // Remove the "Use my current location" button. Auto-locate on page load keeps working.
    $map_controls = preg_replace( '#<button class="wpsl-icon-direction".*?</button>#s', '', $map_controls );

    // Don't output an empty container when no buttons are left.
    if ( false === strpos( $map_controls, '<button' ) ) {
        $map_controls = '';
    }

    return $map_controls;
}
