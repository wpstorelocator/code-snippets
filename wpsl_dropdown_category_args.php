add_filter( 'wpsl_dropdown_category_args', 'custom_dropdown_category_args' );

function custom_dropdown_category_args( $args ) {

    // Show the number of locations after each category name.
    $args['show_count'] = 1;

    return $args;
}
