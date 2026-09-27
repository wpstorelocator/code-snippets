add_filter( 'wpsl_listing_template', 'custom_listing_template' );

function custom_listing_template() {

    global $wpsl, $wpsl_settings;
    
    if ( is_page( 'your-page' ) ) {
        // The template code for 'your-page' goes here 
    }  else {
        // The template code for all other pages goes here
    }
}
