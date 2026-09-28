add_filter( 'wpsl_listing_template', 'custom_listing_template_url' );

function custom_listing_template_url( $listing_template ) {

    $new_window = wpsl_get_service( 'template_sections' )->new_window();
    $link_text  = esc_html__( 'Visit Website', 'your-textdomain' );

    $website = '<% if ( typeof url !== "undefined" && url ) { %>' . "\r\n";
    $website .= '<p><a href="<%= url %>"' . $new_window . '>' . $link_text . '</a></p>' . "\r\n";
    $website .= '<% } %>' . "\r\n";

    // Add the link below the address, the first paragraph in the template.
    $listing_template = preg_replace( '#</p>#', "</p>\r\n" . $website, $listing_template, 1 );

    return $listing_template;
}
