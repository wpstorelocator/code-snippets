add_filter( 'wpsl_listing_template', 'custom_page_listing_template' );

function custom_page_listing_template( $listing_template ) {

    // Change the template on 'your-page' only.
    if ( is_page( 'your-page' ) ) {
        $listing_template = str_replace( '<li data-store-id="<%= id %>">', '<li class="wpsl-my-page" data-store-id="<%= id %>">', $listing_template );
    }

    // All other pages keep the default template.
    return $listing_template;
}
