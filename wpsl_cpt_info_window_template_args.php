add_filter( 'wpsl_cpt_info_window_template', 'custom_cpt_info_window_template_change' );

function custom_cpt_info_window_template_change( $cpt_info_window_template ) {
    // Change $cpt_info_window_template here.

    return $cpt_info_window_template;
}
