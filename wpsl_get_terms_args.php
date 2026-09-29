add_filter( 'wpsl_get_terms_args', 'custom_category_terms_args' );
add_filter( 'wpsl_dropdown_category_args', 'custom_category_terms_args' );

function custom_category_terms_args( $args ) {

    // Also show the categories that don't have any locations yet.
    $args['hide_empty'] = false;

    return $args;
}
