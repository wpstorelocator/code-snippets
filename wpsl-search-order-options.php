add_filter( 'wpsl_search_order_options', 'custom_search_order_options' );

function custom_search_order_options( $options ) {

    // The key is the field name in the location data, the value the label in the "Sort by" dropdown.
    $options['priority'] = esc_html__( 'Priority', 'your-textdomain' );

    return $options;
}
