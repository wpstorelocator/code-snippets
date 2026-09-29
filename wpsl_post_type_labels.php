add_filter( 'wpsl_post_type_labels', 'custom_post_type_labels' );

function custom_post_type_labels( $labels ) {

    $labels['name_admin_bar'] = __( 'Store Location', 'your-textdomain' );

    return $labels;
}
