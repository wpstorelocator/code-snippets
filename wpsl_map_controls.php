add_filter( 'wpsl_map_controls', 'custom_map_controls' );

function custom_map_controls( $map_controls ) {

    // Show the house icon on the reset button instead of the circular arrows.
    $map_controls = str_replace( '&#xe807;', '&#xe801;', $map_controls );

    // Add a class to the reset button, so you can style it with CSS.
    $map_controls = str_replace( 'class="wpsl-icon-reset"', 'class="wpsl-icon-reset my-reset-button"', $map_controls );

    return $map_controls;
}
