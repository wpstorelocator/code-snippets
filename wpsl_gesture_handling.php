add_filter( 'wpsl_gesture_handling', 'custom_gesture_handling' );

function custom_gesture_handling( $handling ) {

    // Move the map with one finger on touch screens, and zoom with the scroll wheel without Ctrl.
    $handling = 'greedy';

    return $handling;
}
