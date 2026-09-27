add_filter( 'wpsl_more_info_template', 'custom_more_info_template_change' );

function custom_more_info_template_change( $more_info_template ) {
    // Change $more_info_template here.

    return $more_info_template;
}
