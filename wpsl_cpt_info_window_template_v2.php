add_filter( 'wpsl_cpt_info_window_template', 'custom_cpt_info_window_template' );

function custom_cpt_info_window_template() {

    $cpt_info_window_template = '<div class="wpsl-info-window">' . "\r\n";
    $cpt_info_window_template .= "\t\t" . '<p class="wpsl-no-margin">' . "\r\n";
    $cpt_info_window_template .= "\t\t\t" . '<strong><%= store %></strong>' . "\r\n";
    $cpt_info_window_template .= "\t\t\t" . '<span><%= address %></span>' . "\r\n";
    $cpt_info_window_template .= "\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $cpt_info_window_template .= "\t\t\t" . '<span><%= address2 %></span>' . "\r\n";
    $cpt_info_window_template .= "\t\t\t" . '<% } %>' . "\r\n";
    $cpt_info_window_template .= "\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n";
    $cpt_info_window_template .= "\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
    $cpt_info_window_template .= "\t\t" . '</p>' . "\r\n";

    $cpt_info_window_template .= "\t\t" . '<% if ( my_textinput ) { %>' . "\r\n";
    $cpt_info_window_template .= "\t\t" . '<p><%= my_textinput %></p>' . "\r\n";
    $cpt_info_window_template .= "\t\t" . '<% } %>' . "\r\n";
    $cpt_info_window_template .= "\t" . '</div>' . "\r\n";

    return $cpt_info_window_template;
}
