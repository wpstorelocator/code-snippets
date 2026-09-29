add_filter( 'wpsl_post_type_args', 'custom_post_type_args' );

function custom_post_type_args( $args ) {

    // Show an archive page with all stores at /stores/ (the "Store slug" setting).
    $args['has_archive'] = true;

    return $args;
}
