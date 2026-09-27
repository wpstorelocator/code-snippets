add_filter( 'wpsl_listing_template', 'custom_listing_template_change' );

function custom_listing_template_change( $listing_template ) {
    // Change $listing_template here.

    return $listing_template;
}
