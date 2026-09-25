add_filter( 'wpsl_cpt_info_window_template', 'custom_cpt_info_window_template' );

function custom_cpt_info_window_template( $cpt_info_window_template ) {

    $sections = wpsl_get_service( 'template_sections' );
    $settings = wpsl_get_service( 'wpsl_settings' );

    $cpt_info_window_template = '<div class="wpsl-info-window">' . "\r\n";
    $cpt_info_window_template .= "\t" . '<p class="wpsl-no-margin">' . "\r\n";
    $cpt_info_window_template .= "\t\t" . $sections->store_header( 'wpsl_map' ) . "\r\n";
    $cpt_info_window_template .= "\t\t" . '<span><%= address %></span>' . "\r\n";
    $cpt_info_window_template .= "\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $cpt_info_window_template .= "\t\t" . '<span><%= address2 %></span>' . "\r\n";
    $cpt_info_window_template .= "\t\t" . '<% } %>' . "\r\n";
    $cpt_info_window_template .= "\t\t" . '<span>' . $sections->format_address() . '</span>' . "\r\n";

    if ( ! $settings->get( 'ux', 'hide_country' ) ) {
        $cpt_info_window_template .= "\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
    }

    $cpt_info_window_template .= "\t" . '</p>' . "\r\n";

    // Add 'my_textinput' to the data with the wpsl_cpt_info_window_meta_fields filter first.
    $cpt_info_window_template .= "\t" . '<% if ( typeof my_textinput !== "undefined" && my_textinput ) { %>' . "\r\n";
    $cpt_info_window_template .= "\t" . '<p><%= my_textinput %></p>' . "\r\n";
    $cpt_info_window_template .= "\t" . '<% } %>' . "\r\n";
    $cpt_info_window_template .= '</div>';

    return $cpt_info_window_template;
}
