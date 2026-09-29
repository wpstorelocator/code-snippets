add_filter( 'wpsl_dropdown_category_args', 'custom_category_order' );
add_filter( 'wpsl_get_terms_args', 'custom_category_order' );

function custom_category_order( $args ) {

    // Show the oldest category first, and the newest one last.
    $args['orderby'] = 'term_id';
    $args['order']   = 'ASC';

    return $args;
}
