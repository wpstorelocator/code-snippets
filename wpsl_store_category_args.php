add_filter( 'wpsl_store_category_args', 'custom_store_category_args' );

function custom_store_category_args( $args ) {

    // Hide the category column on the All Stores page.
    $args['show_admin_column'] = false;

    return $args;
}
