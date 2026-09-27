add_filter( 'wpsl_cpt_info_window_template', 'custom_cpt_info_window_template' );

function custom_cpt_info_window_template( $cpt_info_window_template ) {
    // Change $cpt_info_window_template here.

    return $cpt_info_window_template;
}
