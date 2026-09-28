add_filter( 'wpsl_store_header_template', 'custom_store_header_heading' );

function custom_store_header_heading( $header_template ) {

    // Mark the store name as a level 3 heading for screen readers.
    $header_template = str_replace(
        '<strong',
        '<strong role="heading" aria-level="3"',
        $header_template
    );

    return $header_template;
}
