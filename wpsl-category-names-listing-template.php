add_filter( 'wpsl_listing_template', 'custom_listing_template_category_names' );

function custom_listing_template_category_names( $listing_template ) {

    $label = esc_html__( 'Categories:', 'your-textdomain' );

    $categories = '<% if ( typeof terms !== "undefined" && terms ) { %>' . "\r\n";
    $categories .= '<p>' . $label . ' <%= terms %></p>' . "\r\n";
    $categories .= '<% } %>' . "\r\n";

    // Add the category names below the address, the first paragraph in the template.
    $listing_template = preg_replace( '#</p>#', "</p>\r\n" . $categories, $listing_template, 1 );

    return $listing_template;
}
