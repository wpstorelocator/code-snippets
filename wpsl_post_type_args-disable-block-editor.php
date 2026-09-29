add_filter( 'wpsl_post_type_args', 'custom_post_type_args' );

function custom_post_type_args( $args ) {

    // Edit stores in the classic editor instead of the block editor.
    $args['show_in_rest'] = false;

    return $args;
}
