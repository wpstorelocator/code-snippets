add_filter( 'wpsl_store_header_template', 'custom_store_header_template_change', 10, 2 );

function custom_store_header_template_change( $header_template, $location ) {
    // Change $header_template here. 
    // $location is 'listing', 'info_window' or 'wpsl_map'.

    return $header_template;
}
