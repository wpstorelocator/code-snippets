add_filter( 'wpsl_info_window_template', 'custom_info_window_template_category_names' );

function custom_info_window_template_category_names( $info_window_template ) {

    $label = esc_html__( 'Categories:', 'your-textdomain' );

    $categories = '<% if ( typeof terms !== "undefined" && terms ) { %>' . "\r\n";
    $categories .= '<p>' . $label . ' <%= terms %></p>' . "\r\n";
    $categories .= '<% } %>' . "\r\n";

    // Add the category names below the address, the first paragraph in the template.
    $info_window_template = preg_replace( '#</p>#', "</p>\r\n" . $categories, $info_window_template, 1 );

    return $info_window_template;
}
