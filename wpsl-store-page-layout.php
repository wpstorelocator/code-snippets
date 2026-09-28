// Turn off the default store page output, the code below adds its own.
add_filter( 'wpsl_skip_cpt_template', '__return_true' );

add_filter( 'the_content', 'custom_store_page_content' );

function custom_store_page_content( $content ) {

    // Only change the content of a single store page.
    if ( ! is_singular( 'wpsl_stores' ) || ! in_the_loop() || ! is_main_query() ) {
        return $content;
    }

    $output  = do_shortcode( '[wpsl_map]' );
    $output .= $content;
    $output .= do_shortcode( '[wpsl_address directions="true"]' );
    $output .= do_shortcode( '[wpsl_hours]' );

    return $output;
}
