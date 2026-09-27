add_filter( 'wpsl_info_window_template', 'custom_info_window_template_change' );

function custom_info_window_template_change( $info_window_template ) {
    // Change $info_window_template here.

    return $info_window_template;
}
