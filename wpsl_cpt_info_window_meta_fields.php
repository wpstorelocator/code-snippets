add_filter( 'wpsl_cpt_info_window_meta_fields', 'custom_cpt_info_window_meta_fields', 10, 2 );

function custom_cpt_info_window_meta_fields( $store_meta, $store_id ) {

    // Fields are saved with a 'wpsl_' prefix, so 'my_textinput' is stored as 'wpsl_my_textinput'.
    $store_meta['my_textinput'] = esc_html( get_post_meta( $store_id, 'wpsl_my_textinput', true ) );

    return $store_meta;
}
